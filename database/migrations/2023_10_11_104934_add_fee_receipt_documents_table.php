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
        Schema::table('fee_receipt_documents', function (Blueprint $table) {
            $table->string('mst_token')->default('0')->after('citizen_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fee_receipt_documents', function (Blueprint $table) {
            $table->dropColumn('mst_token');
        });
    }
};
