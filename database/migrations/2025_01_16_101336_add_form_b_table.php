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
            $table->integer('station_status')->default('0')->comment('1:Approved, 2:Rejected')->after('total_charge');
            $table->integer('station_by')->nullable()->after('station_status');
            $table->date('station_dt')->nullable()->after('station_by');


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
