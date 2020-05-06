<?php

use Illuminate\Database\Eloquent\Model;

class auth_create_database extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('status', function($table)
        {
            $table->increments('status_id');
            $table->string('label');
            $table->string('description');
            $table->timestamps();
       });

       Schema::create('auth_user', function($table)
       {
            $table->increments('userid');
            $table->string('username');
            $table->string('password');
            $table->string('salt');
            $table->timestamps();
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('status_id')->on('status')->onUpdate('cascade')->onDelete('cascade');
       });

       Schema::create('auth_permission', function($table)
       {
            $table->increments('perm_id');
            $table->string('description');
            $table->string('label');
       });
       Schema::create('auth_role', function($table)
       {
            $table->increments('role_id');
            $table->string('role_name');
       });
       Schema::create('auth_role_permission', function($table)
       {
            $table->integer('role_id')->unsigned();
            $table->integer('perm_id')->unsigned();
            $table->foreign('role_id')->references('role_id')->on('auth_role')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('perm_id')->references('perm_id')->on('auth_permission')->onUpdate('cascade')->onDelete('cascade');

       });
       Schema::create('auth_user_role', function($table)
       {
            $table->integer('role_id')->unsigned();
            $table->integer('userid')->unsigned();
            $table->foreign('role_id')->references('role_id')->on('auth_role')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('userid')->references('userid')->on('auth_user')->onUpdate('cascade')->onDelete('cascade');
       });
        Schema::create('user_profile', function($table)
       {
            $table->integer('user_id')->unsigned();
            $table->string('full_name');
            $table->string('gender');
            $table->string('posistion');
            $table->string('contact_no');
            $table->foreign('user_id')->references('userid')->on('auth_user')->onUpdate('cascade')->onDelete('cascade');
       });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
