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
        Schema::create('forms', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('id')->comment('TRIAL');
            $table->string('firstname')->comment('TRIAL');
            $table->string('lastname')->comment('TRIAL');
            $table->string('email')->comment('TRIAL');
            $table->integer('phonenumber')->nullable()->comment('TRIAL');
            $table->timestamp('created_at')->nullable()->comment('TRIAL');
            $table->timestamp('updated_at')->nullable()->comment('TRIAL');
            $table->integer('movingfromzip1')->nullable()->comment('TRIAL');
            $table->integer('movingtozip1')->nullable()->comment('TRIAL');
            $table->string('movingdate1')->nullable()->comment('TRIAL');
            $table->string('movesize1')->nullable()->comment('TRIAL');
            $table->string('type1')->nullable()->comment('TRIAL');
            $table->integer('movingfromzip2')->nullable()->comment('TRIAL');
            $table->string('movingtocountry2')->nullable()->comment('TRIAL');
            $table->string('movingtocontinent2')->nullable()->comment('TRIAL');
            $table->string('movingdate2')->nullable()->comment('TRIAL');
            $table->string('movesize2')->nullable()->comment('TRIAL');
            $table->string('type2')->nullable()->comment('TRIAL');
            $table->integer('movingfromzip3')->nullable()->comment('TRIAL');
            $table->integer('movingtozip3')->nullable()->comment('TRIAL');
            $table->string('carmake3')->nullable()->comment('TRIAL');
            $table->string('carmodel3')->nullable()->comment('TRIAL');
            $table->string('caryear3')->nullable()->comment('TRIAL');
            $table->string('movingdate3')->nullable()->comment('TRIAL');
            $table->string('type3')->nullable()->comment('TRIAL');
            $table->integer('movingfromzip4')->nullable()->comment('TRIAL');
            $table->integer('movingtozip4')->nullable()->comment('TRIAL');
            $table->string('movesize4')->nullable()->comment('TRIAL');
            $table->string('movingdate4')->nullable()->comment('TRIAL');
            $table->string('type4')->nullable()->comment('TRIAL');
            $table->string('cityto1')->nullable()->comment('TRIAL');
            $table->string('cityfrom1')->nullable()->comment('TRIAL');
            $table->timestamp('email_verified_at')->nullable()->comment('TRIAL');
            $table->integer('token')->nullable()->comment('TRIAL');
            $table->integer('pin')->nullable()->comment('TRIAL');
            $table->string('cityto3')->nullable()->comment('TRIAL');
            $table->string('cityto4')->nullable()->comment('TRIAL');
            $table->string('cityfrom2')->nullable()->comment('TRIAL');
            $table->string('cityfrom3')->nullable()->comment('TRIAL');
            $table->string('cityfrom4')->nullable()->comment('TRIAL');
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
        Schema::dropIfExists('forms');
    }
};
