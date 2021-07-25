<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTagsColorIntegrityConstraintInTagsTable extends Migration
{
    const TABLE_NAME = 'tags';
    const TARGET_COLUMN = 'tags_color_code_unique';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn(self::TABLE_NAME, self::TARGET_COLUMN)) {
            return;
        }

        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->dropUnique(self::TARGET_COLUMN);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumn(self::TABLE_NAME, self::TARGET_COLUMN)) {
            return;
        }

        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->unique('color_code');
        });
    }
}
