<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MaterialType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_type', function(Blueprint $table)
       {
            $table->engine = 'InnoDB';
            $table->increments('mat_id');
            $table->string('name');
            $table->timestamps();
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('marc_tag_structure')->onUpdate('set null')->onDelete('set null');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_type');
    }
}
