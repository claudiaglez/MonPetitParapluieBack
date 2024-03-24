<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('categories')->insert([
            ['category' => 'Bastidores', 'created_at' => $now, 'updated_at' => $now],
            ['category' => 'Totebags', 'created_at' => $now, 'updated_at' => $now],
            ['category' => 'Marcapáginas', 'created_at' => $now, 'updated_at' => $now],
            ['category' => 'Varios', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
