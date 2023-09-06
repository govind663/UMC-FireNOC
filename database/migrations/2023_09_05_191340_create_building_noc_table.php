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
            $table->string('contact_persion');
            $table->string('tel_no');
            $table->string('email');

            $table->string('types_of_property');
            $table->string('property_no');

            $table->string('peermission_no');
            $table->date('permission_date');

            $table->string('maps_of_proposed_doc');
            $table->string('city_survey_doc');
            $table->string('sanad_doc');
            $table->string('competent_authority_doc');
            $table->string('dues_certificate_doc');
            $table->string('fire_equipments_install_doc')->nullable();

            $table->integer('application_status')->default('0')->comment('0:Operator, 1:Field Inspector, 2:Chief Fire Officer, 3:DMC');
            $table->date('approved_dt')->nullable();
            $table->integer('approved_by')->nullable();
            $table->date('rejected_dt')->nullable();
            $table->integer('rejected_by')->nullable();
            $table->string('remarks')->nullable();

            $table->string('payment_status')->default('0')->comment('0:Paid, 1:Unpaid');
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
