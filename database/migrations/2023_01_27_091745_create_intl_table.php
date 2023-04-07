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
        Schema::create('intl', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('intl_id')->unique('idx_intl_id')->comment('TRIAL');
            $table->string('intl_fnm')->nullable()->comment('TRIAL');
            $table->string('intl_lnm')->nullable()->comment('TRIAL');
            $table->integer('intl_tel')->nullable()->comment('TRIAL');
            $table->string('intl_email')->nullable()->comment('TRIAL');
            $table->string('intl_fr_zip', 10)->nullable()->comment('TRIAL');
            $table->string('intl_to_cont')->nullable()->comment('TRIAL');
            $table->date('intl_dt')->nullable()->comment('TRIAL');
            $table->integer('intl_sz_id')->nullable()->comment('TRIAL');
            $table->timestamp('created_at')->nullable()->comment('TRIAL');
            $table->timestamp('updated_at')->nullable()->comment('TRIAL');
            $table->integer('intl_tkn')->nullable()->comment('TRIAL');
            $table->timestamp('email_verified_at')->nullable()->comment('TRIAL');
            $table->string('intl_to_cntr')->nullable()->comment('TRIAL');
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
        Schema::dropIfExists('intl');
    }
};
