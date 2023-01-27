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
        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->foreign(['role_id'], 'fk_personal_access_tokens_roles_0')->references(['id'])->on('roles')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign(['permission_id'], 'fk_personal_access_tokens_permissions_1')->references(['id'])->on('permissions')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_has_permissions', function (Blueprint $table) {
            $table->dropForeign('fk_personal_access_tokens_roles_0');
            $table->dropForeign('fk_personal_access_tokens_permissions_1');
        });
    }
};
