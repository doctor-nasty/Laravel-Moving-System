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
        Schema::create('carshp', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->integer('carshp_id')->unique('idx_carshp_id')->comment('TRIAL');
            $table->string('carshp_fnm')->nullable()->comment('TRIAL');
            $table->string('carshp_lnm')->nullable()->comment('TRIAL');
            $table->integer('carshp_tel')->nullable()->comment('TRIAL');
            $table->string('carshp_email')->nullable()->comment('TRIAL');
            $table->string('carshp_fr_zip', 10)->nullable()->comment('TRIAL');
            $table->string('carshp_to_zip')->nullable()->comment('TRIAL');
            $table->date('carshp_dt')->nullable()->comment('TRIAL');
            $table->timestamp('created_at')->nullable()->comment('TRIAL');
            $table->timestamp('updated_at')->nullable()->comment('TRIAL');
            $table->integer('carshp_tkn')->nullable()->comment('TRIAL');
            $table->timestamp('email_verified_at')->nullable()->comment('TRIAL');
            $table->string('carshp_vhmk')->nullable()->comment('TRIAL');
            $table->string('carshp_vhmdl')->nullable()->comment('TRIAL');
            $table->string('carshp_vhyr')->nullable()->comment('TRIAL');
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
        Schema::dropIfExists('carshp');
    }
};
