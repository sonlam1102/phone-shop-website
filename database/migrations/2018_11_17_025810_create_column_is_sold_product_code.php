<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnIsSoldProductCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_code', function(Blueprint $table) {
            if (!Schema::hasColumn('product_code', 'is_sold')) {
                $table->boolean('is_sold')->default(false);
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
            if (Schema::hasColumn('product_code', 'is_sold')) {
                $table->dropColumn('is_sold');
            }
        });
    }
}
