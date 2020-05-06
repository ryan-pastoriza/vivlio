<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarcTagStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marc_tag_structure', function(Blueprint $table)
       {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('tagfield');
            $table->string('tagname');
            $table->string('repeatable');
            $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marc_tag_structure');
    }
}
