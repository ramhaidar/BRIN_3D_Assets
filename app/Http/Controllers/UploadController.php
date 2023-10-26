<?php

namespace App\Http\Controllers;

use App\Models\Modelx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store ( Request $request )
    {
        // Validate the request
        $request->validate ( [ 
            'Name'                  => [ 
                'required',
                'min:6'
            ],
            'Kategori'              => [ 'required', 'in:1,2,3,4,5' ],
            'Filter'                => [ 'required', 'in:1,2,3,4,5' ],
            'RealTeksDeskripsiNAME' => [ 'max:780' ],
            'file'                  => [ 
                'max:51200',
                'required',
                'file',
                function ($attribute, $value, $fail)
                {
                    $allowedExtensions = [ 'obj' ];
                    $extension         = $value->getClientOriginalExtension ();

                    if ( ! in_array ( $extension, $allowedExtensions ) )
                    {
                        $fail ( "The $attribute must be an 'obj' file." );
                    }
                },
            ],
        ] );

        if ( empty( $request->RealTeksDeskripsiNAME ) )
        {
            $Description = '<No Description>';
        }
        else
        {
            $Description = $request->RealTeksDeskripsiNAME;
        }


        // Get the uploaded file
        $file = $request->file ( 'file' );

        // Get the original filename
        $filename = $file->getClientOriginalName ();

        // Get the username of the uploader
        $username = auth ()->user ()->username;

        // Generate an MD5 hash of the file's contents
        // $hash = md5_file ( $file->getRealPath () );

        // Generate a SHA3-512 hash of the file
        $hash = hash_file ( 'sha3-512', $file->getRealPath () );

        // Check if a model with the same SHA3 hash already exists in the database
        $existingModel = Modelx::where ( 'sha3_hash', $hash )->first ();

        if ( $existingModel )
        {
            // A model with the same hash already exists, so you can return an error or perform some action.
            return redirect ()->route ( 'upload_file' )->with ( 'customError', 'File with the same hash already exists in the database.' );
        }

        // Create a directory with the username and hash and store the file with the original filename in it
        $path = $file->storeAs ( 'Models/' . $username . '/' . $hash, $filename, 'public' );

        // Get the user ID
        $UserID = auth ()->user ()->id;

        // Check Private checkbox
        if ( $request->Private == "on" )
        {
            $Private = 1;
        }
        else
        {
            $Private = 0;
        }

        // Create a new record in the models table
        $model              = new Modelx;
        $model->name        = $request->input ( 'Name' );
        $model->file_path   = $path;
        $model->description = $Description;
        $model->user_id     = $UserID;
        $model->category_id = $request->Kategori;
        $model->filter_id   = $request->Filter;
        $model->private     = $Private;
        $model->sha3_hash   = $hash;
        $model->created_at  = now ();
        $model->updated_at  = now ();
        $model->save ();

        $oldPath = 'public/Models/' . $username . "/TempThumbnail.png";
        $newPath = 'public/Models/' . $username . "/" . $hash . "/Thumbnail.png";

        Storage::move ( $oldPath, $newPath );

        // return redirect ()->route ( 'upload_file' )->with ( 'success', 'Succesfully Uploaded your model!' );

        return redirect ( 'model/' . $model->sha3_hash )->with ( 'success', 'Succesfully Uploaded your model!' );
    }

    public function thumbnailUpload ( Request $request )
    {
        $imgData = $request->input ( 'imgData' );

        // The image data will have a prefix like "data:image/png;base64,", so remove it
        $imgData = str_replace ( 'data:image/png;base64,', '', $imgData );

        // Decode the base64 image data
        $imgData = base64_decode ( $imgData );

        // Generate a SHA3-512 hash of the file content
        // $fileName = hash ( 'sha3-512', $imgData ) . '.png';
        $fileName = 'TempThumbnail.png';

        // Now you can save the image data to a file, database, etc.
        $path = 'public/Models/' . $request->username . "/" . $fileName;

        // Use the Storage facade to store the file
        Storage::put ( $path, $imgData );
    }
}