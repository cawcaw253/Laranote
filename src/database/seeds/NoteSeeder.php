<?php

use App\Models\Note;
use App\Models\Tag;
use App\Models\TagMap;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the User table seeders
     *
     * @return void
     */
    public function run()
    {
        $note_first = Note::create([
            'title' => 'Markdown Template',
            'user_id' => '1',
            'contents' => file_get_contents(realpath(__DIR__ . '/datas/markdown_template.txt')),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $note_second = Note::create([
            'title' => 'Hello LaraNote!!',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $other_note_first = Note::create([
            'title' => 'Other Users Notes',
            'user_id' => '2',
            'contents' => 'this is other users note!',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $tag_php = Tag::create([
            'title' => 'PHP',
            'color_code' => '#8993be',
        ]);
        $tag_laravel = Tag::create([
            'title' => 'Laravel',
            'color_code' => '#fb503b',
        ]);
        $tag_vue = Tag::create([
            'title' => 'Vue',
            'color_code' => '#42b883',
        ]);
        $tag_go = Tag::create([
            'title' => 'Golang',
            'color_code' => '#64c8c8',
        ]);

        TagMap::create([
            'note_id' => $note_first->id,
            'tag_id' => $tag_vue->id,
        ]);
        TagMap::create([
            'note_id' => $note_first->id,
            'tag_id' => $tag_laravel->id,
        ]);
        TagMap::create([
            'note_id' => $note_second->id,
            'tag_id' => $tag_php->id,
        ]);
        TagMap::create([
            'note_id' => $note_second->id,
            'tag_id' => $tag_laravel->id,
        ]);
        TagMap::create([
            'note_id' => $note_second->id,
            'tag_id' => $tag_vue->id,
        ]);
        TagMap::create([
            'note_id' => $other_note_first->id,
            'tag_id' => $tag_go->id,
        ]);
        TagMap::create([
            'note_id' => $other_note_first->id,
            'tag_id' => $tag_laravel->id,
        ]);
    }
}
