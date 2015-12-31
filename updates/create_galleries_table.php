<?php namespace UMAR\MasonGallery\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateGalleriesTable extends Migration
{

    public function up()
    {
        Schema::create('umar_masongallery_galleries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('date')->nullable();
            $table->boolean('show_gallery_page');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('umar_masongallery_galleries');
    }

}
