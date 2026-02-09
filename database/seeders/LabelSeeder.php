<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('label')->insert([
            [
                'label_name' => 'important',
                'id_user' => 1,
                'created_at' => now()
            ],
            [
                'label_name' => 'fun',
                'id_user' => 1,
                'created_at' => now()
            ]
        ]);
    }
}
