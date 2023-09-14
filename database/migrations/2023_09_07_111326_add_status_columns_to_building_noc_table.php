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
        Schema::table('building_noc', function (Blueprint $table) {
            $table->integer('status')->default('0')->comment('0:Pending, 1:Unpaid, 2:Paid, 3:Approved, 4:Rejected, 5:Underprocess, 6:Reviewed')->after('fire_equipments_install_doc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('building_noc', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
