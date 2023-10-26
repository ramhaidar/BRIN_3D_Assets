<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up ()
    {
        Schema::create ( 'model_views', function (Blueprint $table)
        {
            $table->id ();
            $table->unsignedBigInteger ( 'model_id' );
            $table->string ( 'ip_address' );
            $table->timestamp ( 'viewed_at' );
            $table->foreign ( 'model_id' )->references ( 'id' )->on ( 'modelxs' );
        } );
    }


    /**
     * Reverse the migrations.
     */
    public function down () : void
    {
        Schema::dropIfExists ( 'model_views' );
    }
};