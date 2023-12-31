<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JeniswisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jeniswisatas')->insert([
            [
                'namajenis' => 'pantai'
            ],
            [
                'namajenis' => 'cagar alam'
            ],
            [
                'namajenis' => 'monumen'
            ]
        ]);
    }
}
