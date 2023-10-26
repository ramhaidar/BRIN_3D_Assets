<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up ()
    {
        Schema::create ( 'categories', function (Blueprint $table)
        {
            $table->id ();
            $table->string ( 'name' );
            $table->timestamps ();
        } );

        // Insert the categories data
        Category::insert ( [ 
            [ 'name' => 'Kebumian dan Maritim' ],
            [ 'name' => 'Elektronika dan Informatika' ],
            [ 'name' => 'Teknologi Bersih' ],
            [ 'name' => 'Transportasi' ],
            [ 'name' => 'Antariksa dan Penerbangan' ]
        ] );

        Schema::table ( 'modelxs', function (Blueprint $table)
        {
            $table->unsignedBigInteger ( 'category_id' );
            $table->foreign ( 'category_id' )->references ( 'id' )->on ( 'categories' );
        } );

    }

    public function down ()
    {
        Schema::table ( 'modelxs', function (Blueprint $table)
        {
            $table->dropForeign ( [ 'category_id' ] );
            $table->dropColumn ( 'category_id' );
        } );

        Schema::dropIfExists ( 'categories' );
    }

};