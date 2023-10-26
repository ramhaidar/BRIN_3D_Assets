<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up ()
    {
        Schema::create ( 'ratings', function (Blueprint $table)
        {
            $table->id ();
            $table->unsignedBigInteger ( 'user_id' );
            $table->unsignedBigInteger ( 'model_id' );
            $table->integer ( 'rating' );
            $table->timestamps ();

            $table->foreign ( 'user_id' )->references ( 'id' )->on ( 'users' );
            $table->foreign ( 'model_id' )->references ( 'id' )->on ( 'modelxs' );
        } );
    }

    public function down ()
    {
        Schema::dropIfExists ( 'ratings' );
    }

};