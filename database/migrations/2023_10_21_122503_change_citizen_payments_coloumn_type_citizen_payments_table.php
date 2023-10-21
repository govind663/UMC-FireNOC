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
            $table->string('new_area_meter')->nullable()->change();
            $table->string('meter_rate')->nullable()->change();
            $table->string('total_charges_cost')->nullable()->change();
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
            $table->string('new_area_meter')->change();
            $table->string('meter_rate')->change();
            $table->string('total_charges_cost')->change();
        });
    }
};
