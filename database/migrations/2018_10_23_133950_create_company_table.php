<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address')->nullable();
            $table->string('name')->nullable();
            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedInteger('user_id_manager')->nullable();
            $table->foreign('user_id_manager')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('company');
    }
}
