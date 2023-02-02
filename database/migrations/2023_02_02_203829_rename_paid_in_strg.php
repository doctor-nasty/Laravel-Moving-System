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
        Schema::table('jct_svc_strg', function (Blueprint $table) {
            $table->renameColumn('paid', 'price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jct_svc_strg', function (Blueprint $table) {
            $table->renameColumn('price', 'paid');
        });
    }
};
