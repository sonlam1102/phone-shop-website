<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnQuantityProductGiftAccessories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_gift_accessories', function(Blueprint $table) {
            if (!Schema::hasColumn('product_gift_accessories', 'quantity')) {
                $table->unsignedInteger('quantity')->default(1);
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
        Schema::table('product_gift_accessories', function(Blueprint $table) {
            if (Schema::hasColumn('product_gift_accessories', 'quantity')) {
                $table->dropColumn('quantity');
            }
        });
    }
}
