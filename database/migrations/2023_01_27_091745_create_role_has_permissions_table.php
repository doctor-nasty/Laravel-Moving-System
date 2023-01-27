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
        Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->comment('TRIAL');
            $table->increments('permission_id')->comment('TRIAL');
            $table->integer('role_id')->index('role_has_permissions_role_id_foreign')->comment('TRIAL');
            $table->char('trial754', 1)->nullable()->comment('TRIAL');

            // $table->primary(['permission_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_has_permissions');
    }
};
