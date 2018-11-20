<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOriginalPriceProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function(Blueprint $table) {
            if (!Schema::hasColumn('products', 'original_price')) {
                $table->bigInteger('original_price');
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
        Schema::table('products', function(Blueprint $table) {
            if (Schema::hasColumn('products', 'original_price')) {
                $table->dropColumn('original_price');
            }
        });
    }
}
