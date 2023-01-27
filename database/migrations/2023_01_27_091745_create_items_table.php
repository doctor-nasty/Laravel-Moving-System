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
        Schema::create('items', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('id')->comment('TRIAL');
            $table->integer('item_id')->comment('TRIAL');
            $table->integer('cf')->comment('TRIAL');
            $table->string('item_name')->comment('TRIAL');
            $table->timestamp('created_at')->nullable()->comment('TRIAL');
            $table->timestamp('updated_at')->nullable()->comment('TRIAL');
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
        Schema::dropIfExists('items');
    }
};
