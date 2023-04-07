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
        Schema::create('jct_fr_cnty', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('id')->comment('TRIAL');
            $table->integer('cmp_id')->comment('TRIAL');
            $table->integer('svc_id')->comment('TRIAL');
            $table->integer('cnty_id')->comment('TRIAL');
            $table->timestamp('updated_at')->comment('TRIAL');
            $table->timestamp('created_at')->comment('TRIAL');
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
        Schema::dropIfExists('jct_fr_cnty');
    }
};
