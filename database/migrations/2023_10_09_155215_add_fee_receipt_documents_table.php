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
            $table->integer('document_status')->default('0')->comment('0: Document Not Uploaded, 1: Document Uploaded Successfully')->after('payment_recepit_doc');
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
            $table->dropColumn('document_status');
        });
    }
};
