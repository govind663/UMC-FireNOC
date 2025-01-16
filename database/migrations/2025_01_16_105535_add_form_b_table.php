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
            $table->integer('cf_status')->default('0')->comment('1:Approved, 2:Rejected')->after('station_dt');
            $table->integer('cf_by')->nullable()->after('cf_status');
            $table->date('cf_dt')->nullable()->after('cf_by');

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
