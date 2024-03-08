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
            // === add renewal date column to business noc table ===
            $table->date("renewal_date")->nullable()->after('permission_date');
            // === create index on `renewal_date` for better performance ===
            $table->index('renewal_date');
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
            // == drop  "renewal_date" column from business noc table ====
            $table->dropColumn("renewal_date");
        });
    }
};
