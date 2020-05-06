<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('user_profile', function(Blueprint $table)
       {
            $table->engine = 'InnoDB';
            $table->integer('user_id')->unsigned();
            $table->string('full_name');
            $table->string('gender');
            $table->string('posistion');
            $table->string('contact_no');
            $table->foreign('user_id')->references('user_id')->on('auth_user')->onUpdate('cascade')->onDelete('cascade');
       });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('user_profile');
    }
}
