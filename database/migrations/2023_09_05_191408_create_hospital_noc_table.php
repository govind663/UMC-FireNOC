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
        Schema::create('hospital_noc', function (Blueprint $table) {
            $table->id();
            $table->integer('noc_mst_id');

            $table->string('l_name');
            $table->string('f_name');
            $table->string('father_name');
            $table->string('hospital_name');
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
            $table->string('contact_persion');
            $table->string('tel_no');
            $table->string('email');

            $table->string('types_of_property');
            $table->string('property_no');

            $table->string('city_name');
            $table->string('survey_no');
            $table->string('cts_no');
            $table->string('part_no');
            $table->string('plot_no');
            $table->string('land_property_no');

            $table->string('area_pincode');
            $table->string('types_of_hospital');
            $table->date('from_date');
            $table->date('to_date');
            $table->string('shop_no');
            $table->string('area_place_measurments');
            $table->string('total_staff');
            $table->string('total_sleeping_staff');
            $table->string('hospital_fireequip');
            $table->string('hospital_address');

            $table->string('property_doc');
            $table->string('location_doc');
            $table->string('electric_doc');
            $table->string('shop_license_doc');
            $table->string('paid_tax_bill_doc');
            $table->string('commissioning_certificate');
            $table->string('affidavit_doc');
            $table->string('corporation_certificate');

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
        Schema::dropIfExists('hospital_noc');
    }
};
