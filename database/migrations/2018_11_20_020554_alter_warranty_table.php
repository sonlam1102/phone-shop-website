<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterWarrantyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warranty', function(Blueprint $table) {
            if (!Schema::hasColumn('warranty', 'from')) {
                $table->date('from')->nullable();
            }
            if (!Schema::hasColumn('warranty', 'to')) {
                $table->date('to')->nullable();
            }
            if (Schema::hasColumn('warranty', 'month')) {
                $table->dropColumn('month');
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
        Schema::table('warranty', function(Blueprint $table) {
            if (Schema::hasColumn('warranty', 'from')) {
                $table->dropColumn('from');
            }
            if (Schema::hasColumn('warranty', 'to')) {
                $table->dropColumn('to');
            }
            if (!Schema::hasColumn('warranty', 'month')) {
                $table->unsignedInteger('month')->default(1);
            }
        });
    }
}
