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
        Schema::table('business_noc', function (Blueprint $table) {
            $table->date('f_inspector_dt')->nullable()->after('f_inspector_remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_noc', function (Blueprint $table) {
            $table->dropColumn('f_inspector_dt');
        });
    }
};
