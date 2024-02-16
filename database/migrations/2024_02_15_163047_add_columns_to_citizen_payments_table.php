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
        Schema::table('citizen_payments', function (Blueprint $table) {
            // == Add New Columns ==
            $table->string('description')->nullable()->after('fee_construction_id');
            $table->string('area')->nullable()->after('description');
            $table->string('actualcharges')->nullable()->after('area');
            $table->string('noccharges')->nullable()->after('actualcharges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citizen_payments', function (Blueprint $table) {
            // Remove 'Description' and 'Area' columns
            $table->dropColumn([
                'description',
                'area',
                'actualcharges',
                'noccharges'
            ]);
        });
    }
};
