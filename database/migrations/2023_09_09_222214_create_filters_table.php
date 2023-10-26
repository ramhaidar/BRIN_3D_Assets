<?php

use App\Models\Filter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up ()
    {
        Schema::create ( 'filters', function (Blueprint $table)
        {
            $table->id ();
            $table->string ( 'name' );
            $table->timestamps ();
        } );

        // Insert the filters data
        Filter::insert ( [ 
            [ 'name' => 'Avatar' ],
            [ 'name' => 'Bangunan' ],
            [ 'name' => 'Laboratorium' ],
            [ 'name' => 'Peralatan Riset' ],
            [ 'name' => 'Prototipe' ]
        ] );

        Schema::table ( 'modelxs', function (Blueprint $table)
        {
            $table->unsignedBigInteger ( 'filter_id' );
            $table->foreign ( 'filter_id' )->references ( 'id' )->on ( 'filters' );
        } );

    }

    public function down ()
    {
        Schema::table ( 'modelxs', function (Blueprint $table)
        {
            $table->dropForeign ( [ 'filter_id' ] );
            $table->dropColumn ( 'filter_id' );
        } );

        Schema::dropIfExists ( 'filters' );
    }
};