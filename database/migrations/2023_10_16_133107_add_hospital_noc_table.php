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
        Schema::table('hospital_noc', function (Blueprint $table) {
            $table->string('location_of_place')->nullable()->after('property_doc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital_noc', function (Blueprint $table) {
            $table->dropColumn('location_of_place');
        });
    }
};
