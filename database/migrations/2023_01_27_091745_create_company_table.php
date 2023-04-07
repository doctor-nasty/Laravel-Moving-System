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
        Schema::create('company', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('id')->comment('TRIAL');
            $table->string('name')->nullable()->comment('TRIAL');
            $table->string('website')->nullable()->comment('TRIAL');
            $table->string('address')->nullable()->comment('TRIAL');
            $table->string('city')->nullable()->comment('TRIAL');
            $table->string('state')->nullable()->comment('TRIAL');
            $table->string('zip')->nullable()->comment('TRIAL');
            $table->string('phonenumber')->nullable()->comment('TRIAL');
            $table->string('description')->nullable()->comment('TRIAL');
            $table->string('usdot')->nullable()->comment('TRIAL');
            $table->string('mcno')->nullable()->comment('TRIAL');
            $table->string('intrastate')->nullable()->comment('TRIAL');
            $table->string('fleetsize')->nullable()->comment('TRIAL');
            $table->integer('status')->nullable()->comment('TRIAL');
            $table->string('logo')->nullable()->default('default.png')->comment('TRIAL');
            $table->timestamp('updated_at')->nullable()->comment('TRIAL');
            $table->timestamp('created_at')->nullable()->comment('TRIAL');
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
        Schema::dropIfExists('company');
    }
};
