<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('building_noc', function (Blueprint $table) {
            $table->integer('operator_by')->nullable()->after('operator_status');
            $table->timestamp('operator_dt')->nullable()->after('operator_by');
            $table->integer('inspector_by')->nullable()->after('inspector_status');
            $table->timestamp('inspector_dt')->nullable()->after('inspector_by');
            $table->integer('officer_by')->nullable()->after('officer_status');
            $table->timestamp('officer_dt')->nullable()->after('officer_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('building_noc', function (Blueprint $table) {
            $table->dropColumn('operator_by');
            $table->dropColumn('operator_dt');
            $table->dropColumn('inspector_by');
            $table->dropColumn('inspector_dt');
            $table->dropColumn('officer_by');
            $table->dropColumn('officer_dt');
        });
    }
};
