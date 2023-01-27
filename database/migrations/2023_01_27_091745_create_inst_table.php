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
        Schema::create('inst', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('inst_id')->comment('TRIAL');
            $table->string('inst_fnm')->nullable()->comment('TRIAL');
            $table->string('inst_lnm')->nullable()->comment('TRIAL');
            $table->decimal('inst_tel', 10, 0)->nullable()->comment('TRIAL');
            $table->string('inst_email')->nullable()->comment('TRIAL');
            $table->string('inst_fr_zip', 10)->nullable()->comment('TRIAL');
            $table->string('inst_to_zip', 10)->nullable()->comment('TRIAL');
            $table->date('inst_dt')->nullable()->comment('TRIAL');
            $table->integer('inst_sz_id')->nullable()->comment('TRIAL');
            $table->timestamp('created_at')->nullable()->comment('TRIAL');
            $table->timestamp('updated_at')->nullable()->comment('TRIAL');
            $table->integer('inst_tkn')->nullable()->comment('TRIAL');
            $table->timestamp('email_verified_at')->nullable()->comment('TRIAL');
            $table->char('trial751', 1)->nullable()->comment('TRIAL');

            $table->unique(['inst_id'], 'idx_inst_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inst');
    }
};
