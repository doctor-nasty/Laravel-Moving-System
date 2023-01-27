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
            $table->comment('TRIAL');
            $table->increments('id')->comment('TRIAL');
            $table->integer('job_id')->comment('TRIAL');
            $table->string('name')->comment('TRIAL');
            $table->string('email')->comment('TRIAL');
            $table->timestamp('date')->comment('TRIAL');
            $table->string('htel')->comment('TRIAL');
            $table->string('wtel')->comment('TRIAL');
            $table->integer('movesize')->comment('TRIAL');
            $table->string('timetocall')->comment('TRIAL');
            $table->string('city')->comment('TRIAL');
            $table->string('state')->comment('TRIAL');
            $table->integer('zip')->comment('TRIAL');
            $table->string('desc')->comment('TRIAL');
            $table->timestamp('created_at')->nullable()->comment('TRIAL');
            $table->timestamp('updated_at')->nullable()->comment('TRIAL');
            $table->char('trial754', 1)->nullable()->comment('TRIAL');
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
