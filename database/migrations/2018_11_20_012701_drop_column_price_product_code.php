<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnPriceProductCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_code', function(Blueprint $table) {
            if (Schema::hasColumn('product_code', 'price')) {
                $table->dropColumn('price');
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
        Schema::table('product_code', function(Blueprint $table) {
            if (!Schema::hasColumn('product_code', 'price')) {
                $table->bigInteger('price');
            }
        });
    }
}
