<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeFormItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_form_item', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_attribute_form_id');
            $table->foreign('product_attribute_form_id')->references('id')->on('product_attribute_form')->onDelete('cascade');
            $table->unsignedInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
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
        Schema::dropIfExists('attribute_form_item');
    }
}
