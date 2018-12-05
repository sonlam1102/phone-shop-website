<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_channel', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_channel_id');
            $table->foreign('customer_channel_id')->references('id')->on('customer_channel')->onDelete('cascade');
            $table->string('message')->nullable();
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
        Schema::dropIfExists('message_channel');
    }
}
