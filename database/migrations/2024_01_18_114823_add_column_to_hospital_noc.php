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
        Schema::table('hospital_noc', function (Blueprint $table) {
            $table->integer('dmc_status')->default('0')->comment('1:Approved, 2:Rejected')->after('rejected_by');
            $table->integer('dmc_by')->nullable()->after('dmc_status');
            $table->timestamp('dmc_dt')->nullable()->after('dmc_by');

            $table->integer('addl_commissioner_status')->default('0')->comment('1:Approved, 2:Rejected')->after('dmc_dt');
            $table->integer('addl_commissioner_by')->nullable()->after('addl_commissioner_status');
            $table->timestamp('addl_commissioner_dt')->nullable()->after('addl_commissioner_by');

            $table->integer('commissioner_status')->default('0')->comment('1:Approved, 2:Rejected')->after('addl_commissioner_dt');
            $table->integer('commissioner_by')->nullable()->after('commissioner_status');
            $table->timestamp('commissioner_dt')->nullable()->after('commissioner_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital_noc', function (Blueprint $table) {
            $table->dropColumn('dmc_status');
            $table->dropColumn('dmc_by');
            $table->dropColumn('dmc_dt');
            $table->dropColumn('addl_commissioner_status');
            $table->dropColumn('addl_commissioner_by');
            $table->dropColumn('addl_commissioner_dt');
            $table->dropColumn('commissioner_status');
            $table->dropColumn('commissioner_by');
            $table->dropColumn('commissioner_dt');
        });
    }
};
