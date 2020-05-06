<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuthRolePermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('auth_role_permission', function(Blueprint $table)
       {
            $table->engine = 'InnoDB';
            $table->integer('role_id')->unsigned();
            $table->integer('perm_id')->unsigned();
            $table->foreign('role_id')->references('role_id')->on('auth_role')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('perm_id')->references('perm_id')->on('auth_permission')->onUpdate('cascade')->onDelete('cascade');

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_role_permission');
    }
}
