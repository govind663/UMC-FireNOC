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

            $table->string('l_name')->nullable();
            $table->string('f_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('society_name')->nullable();
            $table->string('designation')->nullable();

            $table->string('house_name')->nullable();
            $table->string('flat_no')->nullable();
            $table->string('wing_name')->nullable();
            $table->string('road_name')->nullable();
            $table->string('area_name')->nullable();
            $table->string('taluka_name')->nullable();
            $table->string('pincode')->nullable();
            $table->string('ward_no')->nullable();
            $table->string('electrol_panel_no')->nullable();

            $table->string('types_of_property')->nullable();
            $table->string('property_no')->nullable();

            $table->string('city_name')->nullable();
            $table->string('survey_no')->nullable();
            $table->string('cts_no')->nullable();
            $table->string('part_no')->nullable();
            $table->string('plot_no')->nullable();
            $table->string('land_property_no')->nullable();

            $table->string('area_pincode')->nullable();
            $table->string('shop_no')->nullable();
            $table->string('building_height')->nullable();
            $table->string('rooms_in_buld')->nullable();
            $table->string('property_on_floor_buld')->nullable();
            $table->string('no_of_accomodation_people')->nullable();
            $table->string('area')->nullable();
            $table->string('no_of_workers')->nullable();
            $table->string('types_of_business')->nullable();
            $table->string('no_of_workers_sleep_night')->nullable();
            $table->string('fire_equips')->nullable();
            $table->string('business_address')->nullable();

            $table->string('location_map_doc')->nullable();
            $table->string('electric_license_doc')->nullable();
            $table->string('gas_license_doc')->nullable();
            $table->string('shop_license_doc')->nullable();
            $table->string('food_license')->nullable();
            $table->string('tax_bill_paid_doc')->nullable();
            $table->string('trade_license')->nullable();
            $table->string('gas_certificate_doc')->nullable();
            $table->string('commissioning_certificate')->nullable();

            $table->integer('application_status')->default('0')->comment('0:Operator, 1:Field Inspector, 2:Checker Maker, 3:Chief Fire Officer, 4:DMC, 5:Additional Commissioner, 6:Commissioner');
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
