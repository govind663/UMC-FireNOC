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
            $table->integer('new_area_meter')->nullable()->change();
            $table->integer('meter_rate')->nullable()->change();
            $table->integer('total_charges_cost')->nullable()->change();
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
            $table->integer('new_area_meter')->change();
            $table->integer('meter_rate')->change();
            $table->integer('total_charges_cost')->change();
        });
    }
};
