<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ModifyIdAndIndexFromTagMapTable extends Migration
{
    const TABLE_NAME = 'tag_map';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn(self::TABLE_NAME, 'id') && Schema::hasColumn(self::TABLE_NAME, 'tag_map_note_id_tag_id_unique')) {
            return;
        }

        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->dropColumn('id');
            $table->unique(['note_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn(self::TABLE_NAME, 'id') && !Schema::hasColumn(self::TABLE_NAME, 'tag_map_note_id_tag_id_unique')) {
            return;
        }

        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->dropUnique('tag_map_note_id_tag_id_unique');
            $table->id();
        });
    }
}
