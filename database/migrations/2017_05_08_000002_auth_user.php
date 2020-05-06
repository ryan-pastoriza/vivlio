<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuthUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_user', function(Blueprint $table)
       {
            $table->engine = 'InnoDB';
            $table->increments('user_id');
            $table->string('username');
            $table->string('password');
            $table->string('salt');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('status_id')->on('status')->nullable();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_user');
    }
}
