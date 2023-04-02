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
        Schema::table('permissions', function (Blueprint $table) {
            if (Schema::hasColumn('permissions', 'group_permission_id')) {
                $table->dropColumn('group_permission_id');
            }

            if (!Schema::hasColumn('permissions', 'name')) {
                $table->string('name');
            }

            if (!Schema::hasColumn('permissions', 'group_code')) {
                $table->string('group_code');
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            //
        });
    }
};
