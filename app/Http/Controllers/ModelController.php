<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Like;
use App\Models\Modelx;
use App\Models\Download;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModelController extends Controller
{
    public function fetchUploadModels ( Request $request )
    {
        $perPage = 8;
        $page    = $request->input ( 'page', 1 );

        $models = Modelx::with ( 'user' )
            ->where ( 'user_id', Auth::id () ) // Eager load the user() relationship
            ->skip ( ( $page - 1 ) * $perPage )
            ->take ( $perPage + 1 ) // Fetch one extra model to check if there are more models to fetch
            ->get ();

        $nextExists = false;
        if ( $models->count () > $perPage )
        {
            $nextExists = true;
            $models     = $models->slice ( 0, $perPage ); // If there are more models, remove the extra one from the current page
        }

        return response ()->json ( [ 'models' => $models, 'nextExists' => $nextExists ] );
    }

    public function fetchDownloadModels ( Request $request )
    {
        $perPage = 8;
        $page    = $request->input ( 'page', 1 );

        // Get the downloads for the authenticated user
        $downloads = Download::with ( [ 'modelx', 'modelx.user' ] ) // Eager load the modelx and user relationships
            ->where ( 'user_id', Auth::id () )
            ->skip ( ( $page - 1 ) * $perPage )
            ->take ( $perPage + 1 ) // Fetch one extra download to check if there are more downloads to fetch
            ->get ();

        $nextExists = false;
        if ( $downloads->count () > $perPage )
        {
            $nextExists = true;
            $downloads  = $downloads->slice ( 0, $perPage ); // If there are more downloads, remove the extra one from the current page
        }

        // Extract the models from the downloads
        $models = $downloads->map ( function ($download)
        {
            return $download->modelx;
        } );

        return response ()->json ( [ 'models' => $models, 'nextExists' => $nextExists ] );
    }

    public function fetchFavoriteModels ( Request $request )
    {
        $perPage = 8;
        $page    = $request->input ( 'page', 1 );

        // Get all models that have been favorited by the authenticated user
        $favorites = Auth::user ()->favorites ()->with ( 'modelx.user' )->get ()->pluck ( 'modelx' )
            ->skip ( ( $page - 1 ) * $perPage )
            ->take ( $perPage + 1 ); // Fetch one extra model to check if there are more models to fetch

        $nextExists = false;
        if ( $favorites->count () > $perPage )
        {
            $nextExists = true;
            $favorites  = $favorites->slice ( 0, $perPage ); // If there are more favorites, remove the extra one from the current page
        }

        return response ()->json ( [ 'models' => $favorites, 'nextExists' => $nextExists ] );
    }

    public function addFavorite ( $id )
    {
        $model = Modelx::find ( $id );

        if ( ! $model )
        {
            return redirect ()->back ()->with ( 'error', 'Model not found.' );
        }

        $user = auth ()->user (); // Assuming you are using Laravel's built-in authentication

        // Check if the user has already favorited this model
        if ( $user->favorites->contains ( 'model_id', $model->id ) )
        {
            return redirect ()->back ()->with ( 'error', 'Model is already in favorites.' );
        }

        // Create a new favorite entry for the user and the model
        $favorite           = new Favorite ();
        $favorite->model_id = $model->id;
        $user->favorites ()->save ( $favorite );

        return redirect ()->back ()->with ( 'success', 'Model added to favorites.' );
    }

    public function removeFavorite ( $id )
    {
        $model = Modelx::find ( $id );

        if ( ! $model )
        {
            return redirect ()->back ()->with ( 'error', 'Model not found.' );
        }

        $user = auth ()->user (); // Assuming you are using Laravel's built-in authentication

        // Check if the user has already favorited this model
        if ( ! $user->favorites->contains ( 'model_id', $model->id ) )
        {
            return redirect ()->back ()->with ( 'error', 'Model is not in favorites.' );
        }

        // Find the favorite entry for the user and the model
        $favorite = $user->favorites ()->where ( 'model_id', $model->id )->first ();

        // Delete the favorite entry directly from the database
        $user->favorites ()->where ( 'model_id', $model->id )->delete ();

        return redirect ()->back ()->with ( 'success', 'Model removed from favorites.' );
    }

    public function toggleLike ( $id )
    {
        $modelx = Modelx::find ( $id );
        $like   = Like::where ( 'user_id', Auth::id () )->where ( 'model_id', $modelx->id )->first ();

        if ( $like )
        {
            $like->delete ();
            return response ()->json ( [ 'liked' => false, 'like_count' => $modelx->likes ()->count () ] );
        }
        else
        {
            Like::create ( [ 'user_id' => Auth::id (), 'model_id' => $modelx->id ] );
            return response ()->json ( [ 'liked' => true, 'like_count' => $modelx->likes ()->count () ] );
        }
    }

    public function downloadModel ( Request $request )
    {
        // Get the user from the request
        $user = $request->user ();

        // Get the model_id from the request
        $model_id = $request->input ( 'model_id' );

        // Fetch the modelx
        $modelx = Modelx::find ( $model_id );

        // Check if the last download time is more than 12 hours ago
        if (
            ! Download::where ( 'model_id', $modelx->id )
                ->where ( 'user_id', $user->id )
                ->where ( 'created_at', '>=', Carbon::now ()->subHours ( 12 ) )
                ->exists ()
        )
        {
            // Create a new download record
            $download           = new Download;
            $download->user_id  = $user->id;
            $download->model_id = $model_id;
            $download->save ();
        }

        // Fetch the file path
        $file_path = "Storage/" . $modelx->file_path;

        // Return the file for download
        return response ()->download ( $file_path );
    }

    public function fetchExploreModel ( Request $request )
    {
        $perPage  = 12;
        $page     = $request->input ( 'page', 1 );
        $category = $request->input ( 'category' );
        $filters  = $request->input ( 'filters' );
        $sort     = $request->input ( 'sort' );

        // return $category;

        // Start a query builder 
        $query = Modelx::with ( [ 'user', 'likes', 'downloads' ] ) // Eager load the user() relationship
            ->where ( [ 'private' => false, 'category_id' => $category ] )->whereIn ( 'filter_id', $filters );

        // Sort by the selected sort option
        if ( $sort == 'Terbaru' )
        {
            $query->orderBy ( 'created_at', 'asc' );
        }
        else if ( $sort == 'Terlama' )
        {
            $query->orderBy ( 'created_at', 'desc' );
        }

        // Get the models for the current page
        $models = $query->skip ( ( $page - 1 ) * $perPage )
            ->take ( $perPage )
            ->get ();

        $nextModels = $query->skip ( ( $page - 0 ) * $perPage )
            ->take ( $perPage )
            ->get ();

        return response ()->json ( [ 'models' => $models, 'nextModels' => $nextModels ] );
    }

    public function searchModelsExplore ( Request $request )
    {
        $searchTerm = $request->input ( 'searchTerm', '' );
        $category   = $request->input ( 'category', '' );
        $filters    = $request->input ( 'filters', [] );
        $sort       = $request->input ( 'sort', '' );
        $perPage    = 12;
        $page       = $request->input ( 'page', 1 );

        // set to asc if $sort is 0 and desc if $sort is 1
        $sort = $sort == "Terbaru" ? 'desc' : 'asc';

        // $models = Modelx::with ( [ 'user', 'likes', 'downloads' ] )
        //     ->whereHas ( 'user', function ($query) use ($searchTerm)
        //     {
        //         $query->where ( 'username', 'LIKE', '%' . $searchTerm . '%' );
        //     } )
        //     ->orWhere ( function ($query) use ($searchTerm)
        //     {
        //         $query->where ( 'name', 'LIKE', '%' . $searchTerm . '%' );
        //     } )
        //     ->whereIn ( 'filter_id', $filters ) // replace filter_column with the actual column name
        //     ->orderBy ( 'created_at', $sort ) // replace sort_column with the actual column name
        //     ->where ( 'private', false )
        //     ->where ( 'category_id', $category )
        //     ->skip ( ( $page - 1 ) * $perPage )
        //     ->take ( $perPage + 1 )
        //     ->get ();

        $searchTerm1 = '%' . $searchTerm . '%';
        $searchTerm2 = '%' . $searchTerm . '%';

        $models1 = Modelx::with ( [ 'user', 'likes', 'downloads' ] )
            ->whereHas ( 'user', function ($query) use ($searchTerm1)
            {
                $query->where ( 'username', 'LIKE', $searchTerm1 );
            } )
            ->whereIn ( 'filter_id', $filters )
            ->orderBy ( 'created_at', $sort )
            ->where ( 'private', false )
            ->where ( 'category_id', $category )
            ->skip ( ( $page - 1 ) * $perPage )
            ->take ( $perPage + 1 )
            ->get ();

        $models2 = Modelx::with ( [ 'user', 'likes', 'downloads' ] )
            ->orWhere ( function ($query) use ($searchTerm2)
            {
                $query->where ( 'name', 'LIKE', $searchTerm2 );
            } )
            ->whereIn ( 'filter_id', $filters )
            ->orderBy ( 'created_at', $sort )
            ->where ( 'private', false )
            ->where ( 'category_id', $category )
            ->skip ( ( $page - 1 ) * $perPage )
            ->take ( $perPage + 1 )
            ->get ();

        $models = $models1->concat ( $models2 );

        $nextExists = false;
        if ( $models->count () > $perPage )
        {
            $nextExists = true;
            $models     = $models->slice ( 0, $perPage );
        }

        return response ()->json ( [ 'models' => $models, 'nextExists' => $nextExists ] );
    }

}