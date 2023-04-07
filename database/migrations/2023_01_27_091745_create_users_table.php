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
        Schema::create('users', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('id')->comment('TRIAL');
            $table->string('first_name')->comment('TRIAL');
            $table->string('last_name')->nullable()->comment('TRIAL');
            $table->string('email')->unique()->comment('TRIAL');
            $table->string('mobile_number')->nullable()->comment('TRIAL');
            $table->timestamp('email_verified_at')->nullable()->comment('TRIAL');
            $table->string('password')->comment('TRIAL');
            $table->integer('role_id')->default(2)->comment('TRIAL');
            $table->smallInteger('status')->default(1)->comment('TRIAL');
            $table->rememberToken()->comment('TRIAL');
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
        Schema::dropIfExists('users');
    }
};
