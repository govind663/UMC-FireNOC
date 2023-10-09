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
        Schema::create('business_noc', function (Blueprint $table) {
            $table->id();
            $table->integer('noc_mst_id');

            $table->string('l_name');
            $table->string('f_name');
            $table->string('father_name');
            $table->string('society_name');
            $table->string('designation');

            $table->string('house_name');
            $table->string('flat_no');
            $table->string('wing_name');
            $table->string('road_name');
            $table->string('area_name');
            $table->string('taluka_name');
            $table->string('pincode');
            $table->string('ward_no');
            $table->string('electrol_panel_no');

            $table->string('types_of_property');
            $table->string('property_no');

            $table->string('city_name');
            $table->string('survey_no');
            $table->string('cts_no');
            $table->string('part_no');
            $table->string('plot_no');
            $table->string('land_property_no');

            $table->string('area_pincode');
            $table->string('shop_no');
            $table->string('building_height');
            $table->string('rooms_in_buld');
            $table->string('property_on_floor_buld');
            $table->string('no_of_accomodation_people');
            $table->string('area');
            $table->string('no_of_workers');
            $table->string('types_of_business');
            $table->string('no_of_workers_sleep_night');
            $table->string('fire_equips');
            $table->string('business_address');

            $table->string('location_map_doc')->nullable();
            $table->string('electric_license_doc');
            $table->string('gas_license_doc');
            $table->string('shop_license_doc');
            $table->string('food_license');
            $table->string('tax_bill_paid_doc');
            $table->string('trade_license');
            $table->string('gas_certificate_doc');
            $table->string('commissioning_certificate');

            $table->integer('application_status')->default('0')->comment('0:Operator, 1:Field Inspector, 2:Chief Fire Officer, 3:DMC');
            $table->date('approved_dt')->nullable();
            $table->integer('approved_by')->nullable();
            $table->date('rejected_dt')->nullable();
            $table->integer('rejected_by')->nullable();
            $table->string('remarks')->nullable();

            $table->string('payment_status')->default('0')->comment('1:Paid, 2:Unpaid');
            $table->date('payment_dt')->nullable();
            $table->integer('payment_by')->nullable();


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
        Schema::dropIfExists('business_noc');
    }
};
