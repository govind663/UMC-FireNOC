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
        Schema::table('business_noc', function (Blueprint $table) {
            $table->integer('status')->default('0')->comment('0:Pending, 1:Approved, 2:Rejected')->after('affidavit_doc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_noc', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
