<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagMapTable extends Migration
{
    const TABLE_NAME = 'tag_map';
    const NOTE_TABLE = 'notes';
    const TAG_TABLE = 'tags';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable(self::TABLE_NAME)) {
            return;
        }

        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id');
            $table->unsignedBigInteger('tag_id');

            $table->foreign('note_id')->references('id')->on(self::NOTE_TABLE);
            $table->foreign('tag_id')->references('id')->on(self::TAG_TABLE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
