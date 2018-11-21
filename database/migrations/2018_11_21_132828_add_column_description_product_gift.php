<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDescriptionProductGift extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_gift', function(Blueprint $table) {
            if (!Schema::hasColumn('product_gift', 'description')) {
                $table->longText('description')->nullable();
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
            if (Schema::hasColumn('product_gift', 'description')) {
                $table->dropColumn('description');
            }
        });
    }
}
