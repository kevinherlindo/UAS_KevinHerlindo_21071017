<?php

namespace Database\Seeders\GalehLudi;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(BasicSeeder::class);
        $this->call(DosenSeeder::class);
        $this->call(MatakuliahSeeder::class);
        $this->call(JadwalSeeder::class);
    }
}
