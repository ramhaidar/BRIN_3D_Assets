<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up () : void
    {
        Schema::create ( 'modelxs', function (Blueprint $table)
        {
            $table->id (); // Auto-incremental and primary key
            $table->string ( 'name' ); // varchar(255)
            $table->string ( 'file_path' ); // varchar(255)
            $table->string ( 'description', 780 );
            $table->boolean ( 'private' ); // boolean column to indicate if the model is private or not
            $table->string ( 'sha3_hash' ); // Add a new column to store the SHA-3 hash of the file
            $table->unsignedBigInteger ( 'view_count' )->default ( 0 );
            // $table->unsignedBigInteger ( 'like_count' )->default ( 0 );
            $table->timestamps (); // Adds created_at and updated_at columns
            $table->unsignedBigInteger ( 'user_id' );
            $table->foreign ( 'user_id' )->references ( 'id' )->on ( 'users' );
        } );
    }


    /**
     * Reverse the migrations.
     */
    public function down () : void
    {
        Schema::dropIfExists ( 'modelxs' );
    }
};