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
        Schema::table('setting_webs', function (Blueprint $table) {
            $table->text('google_maps')->after('company_address');
            $table->dropColumn('number_phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setting_webs', function (Blueprint $table) {
            $table->dropColumn('google_maps');
        });
    }
};