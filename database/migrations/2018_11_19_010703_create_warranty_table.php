<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarrantyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_code_id');
            $table->foreign('product_code_id')->references('id')->on('product_code')->onDelete('cascade');
            $table->unsignedInteger('month')->default(0);
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
        Schema::dropIfExists('warranty');
    }
}
