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
            $table->integer('clerk_status')->default('0')->comment('1:Approved, 2:Rejected')->after('application_status');
            $table->integer('clerk_by')->nullable()->after('clerk_status');
            $table->date('clerk_dt')->nullable()->after('clerk_by');
            $table->date('contractor_dt')->nullable()->after('clerk_dt');
            $table->string('contractor_name')->nullable()->after('contractor_dt');
            $table->string('contractor_address')->nullable()->after('contractor_name');
            $table->integer('fees_paid')->default(0)->after('contractor_address');
            $table->integer('annual_charges')->nullable()->after('fees_paid');
            $table->integer('total_charge')->nullable()->after('annual_charges');
            $table->integer('shera')->nullable()->after('total_charge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
