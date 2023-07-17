<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wisatas')->insert([
            [
                'nama_wisata' => 'Pantai ABC',
                'lokasi' => 'Surabaya',
                'deskripsi' => 'Pantai bersih dengan banyak hiburan',
                'htm' => '50.000/orang',
                'jeniswisata_id' => 1
            ],
            [
                'nama_wisata' => 'Hutan Beruang',
                'lokasi' => 'Malang',
                'deskripsi' => 'Hutan itu hijau',
                'htm' => 'Gratis',
                'jeniswisata_id' => 2
            ],
            [
                'nama_wisata' => 'Tugu FGH',
                'lokasi' => 'Malang',
                'deskripsi' => 'Tugu besar di tengah kota',
                'htm' => 'Gratis',
                'jeniswisata_id' => 3
            ],
        ]);
    }
}
