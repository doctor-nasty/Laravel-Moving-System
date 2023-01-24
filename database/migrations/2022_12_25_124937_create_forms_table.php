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

            $table->id();
            $table->integer('movingfromzip');
            $table->integer('movingtozip');
            $table->string('movingdate');
            $table->text('movesize');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->integer('phonenumber');
            $table->string('type');

            $table->timestamps();
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
