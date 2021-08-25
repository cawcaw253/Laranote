<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTagsColorIntegrityConstraintInTagsTable extends Migration
{
    const TABLE_NAME = 'tags';
    const TARGET_UNIQUE = 'tags_color_code_unique';
    const TARGET_COLUMN = 'color_code';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn(self::TABLE_NAME, self::TARGET_UNIQUE)) {
            return;
        }

        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->dropUnique(self::TARGET_UNIQUE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasColumn(self::TABLE_NAME, self::TARGET_UNIQUE)) {
            return;
        }

        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->unique(self::TARGET_COLUMN);
        });
    }
}
