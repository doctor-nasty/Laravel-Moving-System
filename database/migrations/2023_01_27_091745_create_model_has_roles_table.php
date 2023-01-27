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
        Schema::create('model_has_roles', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('role_id')->comment('TRIAL');
            $table->string('model_type')->comment('TRIAL');
            $table->integer('model_id')->comment('TRIAL');
            $table->char('trial754', 1)->nullable()->comment('TRIAL');

            $table->index(['model_id', 'model_type']);
            // $table->primary(['role_id', 'model_type', 'model_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_has_roles');
    }
};
