<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nim' => '102022333000',
            'nama' => 'Bayu',
            'no_hp' => '08123456789',
        ]);
        
        User::create([
            'nim' => '102022333222',
            'nama' => 'Yongki',
            'no_hp' => '08123125512',
        ]);
    }
}
?>