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
            // === current rejected application role wise
            $table->string("current_rejected_status")
            ->comment('0:Pending, 1:Unpaid, 2:Paid, 3:Approved, 4:Rejected, 5:Underprocess, 6:Reviewed, 7:ChekerMaker')
            ->nullable()
            ->after('status');

            $table->string("current_rejected_role")
            ->comment('0:Operator, 1:Field Inspector, 2:Checker Maker, 3:Chief Fire Officer, 4:DMC, 5:Additional Commissioner, 6:Commissioner')
            ->nullable()
            ->after('current_rejected_status');
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
            // == drop  column for rejecting a noc application
            $table->dropColumn(['current_rejected_by', 'current_rejected_role']);
        });
    }
};
