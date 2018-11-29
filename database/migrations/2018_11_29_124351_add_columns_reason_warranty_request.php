<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsReasonWarrantyRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warranty_request', function(Blueprint $table) {
            if (!Schema::hasColumn('warranty_request', 'reason')) {
                $table->string('reason')->nullable();
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
        Schema::table('warranty_request', function(Blueprint $table) {
            if (Schema::hasColumn('warranty_request', 'reason')) {
                $table->dropColumn('reason');
            }
        });
    }
}
