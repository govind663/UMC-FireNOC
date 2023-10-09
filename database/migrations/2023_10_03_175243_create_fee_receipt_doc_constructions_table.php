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
        Schema::create('fee_receipt_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('citizen_id');
            $table->integer('payment_noc_mode')->comment('1:New Bussiness NOC, 2:Renewal Bussiness NOC, 3:New Hospital NOC, 4:Renewal Hospital NOC, 5:Provisional Building NOC, 6:Final Building NOC');
            $table->string('payment_recepit_doc');
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
        Schema::dropIfExists('fee_receipt_documents');
    }
};
