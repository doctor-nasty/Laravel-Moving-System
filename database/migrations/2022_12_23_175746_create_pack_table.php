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
        Schema::create('pack', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id');
            $table->string('name');
            $table->string('email');
            $table->datetime('date');
            $table->string('htel');
            $table->string('wtel');
            $table->integer('movesize');
            $table->string('timetocall');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pack');
    }
};
