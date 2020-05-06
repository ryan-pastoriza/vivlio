<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MarcSubfieldStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marc_subfield_structure', function(Blueprint $table)
       {
            $table->engine = 'InnoDB';
            $table->string('tagsubfield');
            $table->string('tagsubfieldname');
            $table->string('repeatable');
            $table->timestamps();
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('marc_tag_structure')->onUpdate('cascade')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('marc_subfield_structure');
    }
}
