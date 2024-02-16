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
        Schema::table('citizen_payments', function (Blueprint $table) {

            // == Drop  Columns ==
            $table->dropColumn(['fee_mode_operate_id']);
            $table->dropColumn(['wing_option']);
            $table->dropColumn(['fee_bldg_ht_id']);
            $table->dropColumn(['wing_rate']);
            $table->dropColumn(['new_area_meter']);
            $table->dropColumn(['meter_rate']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citizen_payments', function (Blueprint $table) {
            // == Drop  Columns ==
            $table->unsignedBigInteger("fee_mode_operate_id")->after("user_id");
            $table->string("wing_option",10)->default(null)->after("fee_mode_operate_id");
            $table->unsignedBigInteger("fee_bldg_ht_id")->after("wing_option");
            $table->float("wing_rate", 8, 2)->default(0)->after("fee_bldg_ht_id");
            $table->integer("new_area_meter")->unsigned()->default(0)->after("wing_rate");
            $table->float("meter_rate", 8, 4)->default(0)->after("new_area_meter");
        });
    }
};
