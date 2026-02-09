<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelTodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('label_todolist')->insert([
            [
                'id_label' => 1,
                'id_todolist' => 1,
                'created_at' => now()
            ],
            [
                'id_label' => 2,
                'id_todolist' => 1,
                'created_at' => now()
            ]
        ]);
    }
}
