<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Node\NodeWalker;

use function Symfony\Component\Clock\now;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            [
                'category_name' => 'work',
                'created_at' => now()
            ],[
                'category_name' => 'personal',
                'created_at' => now()
            ],[
                'category_name' => 'other',
                'created_at' => now()
            ]
        ]);
    }
}
