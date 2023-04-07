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
        Schema::create('roles', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('id')->comment('TRIAL');
            $table->string('name')->comment('TRIAL');
            $table->string('guard_name')->comment('TRIAL');
            $table->timestamp('created_at')->nullable()->comment('TRIAL');
            $table->timestamp('updated_at')->nullable()->comment('TRIAL');
            $table->char('trial754', 1)->nullable()->comment('TRIAL');

            $table->unique(['name', 'guard_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
