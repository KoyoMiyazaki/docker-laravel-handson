<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = [
            'Test content',
            'Test contentTest contentTest contentTest contentTest contentTest contentTest contentTest content', 
            'Test contentTest contentTest contentTest contentTest contentTest contentTest contentTest contentTest contentTest contentTest contentTest contentTest contentTest contentTest content', 
            'Test content',
            'Test content',
            'Test content',
            'Test content',
        ];
        foreach($contents as $content)
        {
            DB::table('todolists')->insert([
                'content' => $content,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
