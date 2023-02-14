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
        Schema::create('jct_svc_car', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('cmp_id');
            $table->integer('svc_id')->default(3);
            $table->integer('crprc_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jct_svc_car');
    }
};
