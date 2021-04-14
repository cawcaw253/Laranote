<?php

use App\Enums\UserStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyStatusFieldOnUsersTable extends Migration
{
    const TABLE_NAME = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(self::TABLE_NAME, function ($table) {
            $table->enum('status', UserStatus::getValues())->default(UserStatus::ACTIVATED)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(self::TABLE_NAME, function ($table) {
            $table->enum('status', ['unverified', 'verified', 'banned'])->default('unverified');
        });
    }
}
