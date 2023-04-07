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
        Schema::create('strg', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('strg_id')->unique('idx_strg_id')->comment('TRIAL');
            $table->string('strg_fnm')->nullable()->comment('TRIAL');
            $table->string('strg_lnm')->nullable()->comment('TRIAL');
            $table->integer('strg_tel')->nullable()->comment('TRIAL');
            $table->string('strg_email')->nullable()->comment('TRIAL');
            $table->date('strg_dt')->nullable()->comment('TRIAL');
            $table->timestamp('created_at')->nullable()->comment('TRIAL');
            $table->timestamp('updated_at')->nullable()->comment('TRIAL');
            $table->integer('strg_tkn')->nullable()->comment('TRIAL');
            $table->timestamp('email_verified_at')->nullable()->comment('TRIAL');
            $table->string('strg_zip')->nullable()->comment('TRIAL');
            $table->integer('strg_sz_id')->nullable()->comment('TRIAL');
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
        Schema::dropIfExists('strg');
    }
};
