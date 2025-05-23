<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '102022333000',
            'nama' => 'Bayu',
            'no_hp' => '08123456789',
        ]);
        
        Mahasiswa::create([
            'nim' => '102022333222',
            'nama' => 'Yongki',
            'no_hp' => '08123125512',
        ]);
    }
}
