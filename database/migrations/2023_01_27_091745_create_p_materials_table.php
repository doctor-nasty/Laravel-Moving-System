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
        Schema::create('p_materials', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('id')->comment('TRIAL');
            $table->integer('box_id')->comment('TRIAL');
            $table->integer('cf')->comment('TRIAL');
            $table->string('b_name')->comment('TRIAL');
            $table->integer('b_price')->comment('TRIAL');
            $table->string('active')->comment('TRIAL');
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
        Schema::dropIfExists('p_materials');
    }
};
