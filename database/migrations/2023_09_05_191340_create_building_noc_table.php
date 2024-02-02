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
        Schema::create('building_noc', function (Blueprint $table) {
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
            $table->string('contact_persion')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('email')->nullable();

            $table->string('types_of_property')->nullable();
            $table->string('property_no')->nullable();

            $table->string('peermission_no')->nullable();
            $table->date('permission_date')->nullable();

            $table->string('maps_of_proposed_doc')->nullable();
            $table->string('city_survey_doc')->nullable();
            $table->string('sanad_doc')->nullable();
            $table->string('competent_authority_doc')->nullable();
            $table->string('dues_certificate_doc')->nullable();
            $table->string('fire_equipments_install_doc')->nullable();

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
        Schema::dropIfExists('building_noc');
    }
};
