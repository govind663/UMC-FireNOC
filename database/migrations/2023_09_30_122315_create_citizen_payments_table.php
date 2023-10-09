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
        Schema::create('citizen_payments', function (Blueprint $table) {
            $table->id();
            $table->string('mst_token')->nullable();
            $table->date('payment_dt');
            $table->integer('citizen_id');
            $table->integer('payment_noc_mode')->comment('1:New Bussiness NOC, 2:Renewal Bussiness NOC, 3:New Hospital NOC, 4:Renewal Hospital NOC, 5:Provisional Building NOC, 6:Final Building NOC');

            $table->string('l_name');
            $table->string('f_name');
            $table->string('father_name');
            $table->integer('fee_construction_id');
            $table->integer('fee_mode_operate_id');
            $table->integer('wing_option')->comment('1:Yes 2:No');
            $table->integer('fee_bldg_ht_id');
            $table->integer('wing_rate')->nullable();
            $table->double('new_area_meter', 9, 2)->nullable();
            $table->double('meter_rate', 9, 2)->nullable();
            $table->double('total_charges_cost', 9, 2)->nullable();

            $table->integer('citizen_payment_status')->comment('1: Payment Done Successfully 2: Document Uploaded Successfully')->default(0);

            $table->integer('inserted_by')->nullable();
            $table->timestamp('inserted_dt')->nullable();
            $table->integer('modified_by')->nullable();
            $table->timestamp('modified_dt')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizen_payments');
    }
};
