<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsCartIdMethodOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function(Blueprint $table) {
            if (!Schema::hasColumn('order', 'method')) {
                $table->unsignedInteger('method');
            }
            if (!Schema::hasColumn('order', 'cart_id')) {
                $table->unsignedInteger('cart_id');
                $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade');
            }
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
