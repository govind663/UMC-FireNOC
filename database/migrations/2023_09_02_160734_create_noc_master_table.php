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
        Schema::create('noc_master', function (Blueprint $table) {
            $table->id();
            $table->string('mst_token')->nullable();
            $table->date('noc_a_date');
            $table->integer('citizen_id');
            $table->integer('noc_mode')->comment('1:New Bussiness NOC, 2:Renewal Bussiness NOC, 3:New Hospital NOC, 4:Renewal Hospital NOC, 5:Provisional Building NOC, 6:Final Building NOC');

            $table->string('declare_by');
            $table->date('declare_date');
            $table->string('nominated_persion');
            $table->string('nominated_persion_name');
            $table->string('deliver_by');
            $table->string('d_last_name');
            $table->string('d_first_name');
            $table->string('d_father_name');
            $table->string('d_house_name');
            $table->string('d_flat_no');
            $table->string('d_wing_no');
            $table->string('d_road_name');
            $table->string('d_area_name');
            $table->string('d_taluka_name');
            $table->string('d_pincode');
            $table->string('d_email');

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
        Schema::dropIfExists('noc_master');
    }
};
