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
        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->foreign(['permission_id'], 'fk_migrations_permissions_0')->references(['id'])->on('permissions')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('model_has_permissions', function (Blueprint $table) {
            $table->dropForeign('fk_migrations_permissions_0');
        });
    }
};