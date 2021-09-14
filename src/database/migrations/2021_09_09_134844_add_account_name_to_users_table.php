<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountNameToUsersTable extends Migration
{
    const TABLE_NAME = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn(self::TABLE_NAME, 'account_name')) {
            return;
        }

        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->string('account_name')->nullable()->unique()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumn(self::TABLE_NAME, 'account_name')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('account_name');
        });
    }
}
