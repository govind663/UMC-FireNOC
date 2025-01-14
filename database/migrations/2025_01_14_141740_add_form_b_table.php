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
        Schema::table('form_b', function (Blueprint $table) {
            $table->string('ch_inspector_doc')->nullable()->after('officer_dt');
            $table->string('ch_inspector_remarks')->nullable()->after('ch_inspector_doc');
            $table->date('ch_inspector_dt')->nullable()->after('ch_inspector_remarks');
            $table->integer('check_status')->default('0')->comment('1:Approved, 2:Rejected')->after('ch_inspector_dt');
            $table->integer('check_by')->nullable()->after('check_status');
            $table->date('check_dt')->nullable()->after('check_by');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_b', function (Blueprint $table) {
            //
        });
    }
};
