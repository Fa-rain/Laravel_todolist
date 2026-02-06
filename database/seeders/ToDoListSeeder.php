<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class ToDoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('todolist')->insert([
            [
                'title' => 'Todolist',
                'id_category'=> 1,
                'id_user'=> 1,
                'description' => 'Ini adalah deskripsi',
                'dateline' => '2026-03-12 08:00:00',
                'created_at' => now()
            ]
        ]);
    }
}
