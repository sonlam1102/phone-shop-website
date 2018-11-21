<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIsActiveProductGift extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_gift', function(Blueprint $table) {
            if (!Schema::hasColumn('product_gift', 'is_active')) {
                $table->boolean('is_active')->default(true);
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
        Schema::table('product_gift', function(Blueprint $table) {
            if (Schema::hasColumn('product_gift', 'is_active')) {
                $table->dropColumn('is_active');
            }
        });
    }
}
