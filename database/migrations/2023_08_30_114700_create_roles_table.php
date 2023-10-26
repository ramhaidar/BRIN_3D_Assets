<?php

use App\Models\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up () : void
    {
        Schema::create ( 'roles', function (Blueprint $table)
        {
            $table->id (); // Auto-incremental and primary key
            $table->string ( 'name' ); // varchar(255)
            $table->timestamps (); // Adds created_at and updated_at columns
        } );

        // Insert 'User' and 'Admin' roles
        Role::insert ( [ 
            [ 'name' => 'User' ],
            [ 'name' => 'Admin' ]
        ] );
    }

    /**
     * Reverse the migrations.
     */
    public function down ()
    {
        Schema::dropIfExists ( 'roles' );
    }
};