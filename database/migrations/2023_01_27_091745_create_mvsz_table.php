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
        Schema::create('mvsz', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('mvsz_id')->comment('TRIAL');
            $table->string('mvsz_name')->nullable()->comment('TRIAL');
            $table->char('trial754', 1)->nullable()->comment('TRIAL');

            $table->unique(['mvsz_id'], 'idx_mvsz_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mvsz');
    }
};
