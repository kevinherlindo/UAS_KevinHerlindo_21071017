<?php

namespace Database\Seeders\GalehLudi;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BasicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(KelasSeeder::class);
        $this->call(RuangSeeder::class);
        $this->call(HariSeeder::class);
        $this->call(TahunSeeder::class);
        $this->call(KurikulumSeeder::class);
        $this->call(ProdiSeeder::class);
    }
}
