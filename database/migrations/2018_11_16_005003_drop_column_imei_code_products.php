<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnImeiCodeProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function(Blueprint $table) {
            if (Schema::hasColumn('products', 'imei')) {
                $table->dropColumn('imei');
            }

            if (Schema::hasColumn('products', 'code')) {
                $table->dropColumn('code');
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
            if (!Schema::hasColumn('products', 'imei')) {
                $table->string('imei')->nullable();
            }

            if (!Schema::hasColumn('products', 'code')) {
                $table->string('code')->nullable();
            }
        });
    }
}
