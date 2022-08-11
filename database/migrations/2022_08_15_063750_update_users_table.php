<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->enum('is_admin', [0, 1]);
            $table->enum('is_active', [0, 1]);
            $table->dropColumn('name');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumns('users', ['first_name', 'last_name', 'username', 'is_admin', 'is_active'])) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn(['first_name', 'last_name', 'username', 'is_admin', 'is_active']);
            });
        }
        if (!Schema::hasColumn('users', 'name')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('name');
            });
        }
    }
}
