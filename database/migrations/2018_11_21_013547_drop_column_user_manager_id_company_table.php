<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnUserManagerIdCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function(Blueprint $table) {
            if (Schema::hasColumn('company', 'user_id_manager')) {
                $table->dropForeign(['user_id_manager']);
                $table->dropColumn('user_id_manager');
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
        Schema::table('company', function(Blueprint $table) {
            if (!Schema::hasColumn('company', 'user_id_manager')) {
                $table->unsignedInteger('user_id_manager')->nullable();
                $table->foreign('user_id_manager')->references('id')->on('users')->onDelete('cascade');
            }
        });
    }
}
