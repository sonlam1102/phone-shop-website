<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStaffUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staff_user', function(Blueprint $table) {
            if (Schema::hasColumn('staff_user', 'manager_id')) {
                try {
                    $table->dropForeign(['manager_id']);
                }
                catch (\Exception $e) {}
                $table->dropColumn('manager_id');
            }

            if (!Schema::hasColumn('staff_user', 'company_id')) {
                $table->unsignedInteger('company_id')->default(1);
                $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
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
        Schema::table('staff_user', function (Blueprint $table) {
            if (Schema::hasColumn('staff_user', 'company_id')) {
                try {
                    $table->dropForeign(['company_id']);
                }
                catch (\Exception $e) {}
                $table->dropColumn('company_id');
            }

            if (!Schema::hasColumn('staff_user', 'manager_id')) {
                $table->unsignedInteger('manager_id')->nullable();
                $table->foreign('manager_id')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }
}
