<?php

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
        DB::table('notes')->insert([
            'title' => 'Hello LaraNote!!',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'Hello Im Sail',
            'user_id' => '2',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'Note testing',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'well i want to change my id...',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'Hello Im Muramoto',
            'user_id' => '3',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'well i want to change my id...',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'well i want to change my id...',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'well i want to change my id...',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'well i want to change my id...',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'well i want to change my id...',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'well i want to change my id...',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'well i want to change my id...',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('notes')->insert([
            'title' => 'well i want to change my id...',
            'user_id' => '1',
            'contents' => 'test',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
