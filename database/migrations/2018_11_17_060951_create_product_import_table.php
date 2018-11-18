<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_import', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('import_id');
            $table->foreign('import_id')->references('id')->on('import')->onDelete('cascade');
            $table->unsignedInteger('product_code_id');
            $table->foreign('product_code_id')->references('id')->on('product_code')->onDelete('cascade');
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
        Schema::dropIfExists('product_import');
    }
}
