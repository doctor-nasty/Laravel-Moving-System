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
        Schema::create('jct_cmp_st', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('id')->unique('cmp_st_id')->comment('TRIAL');
            $table->integer('cmp_id')->nullable()->comment('TRIAL');
            $table->integer('st_id')->nullable()->comment('TRIAL');
            $table->char('trial751', 1)->nullable()->comment('TRIAL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jct_cmp_st');
    }
};
