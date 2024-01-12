<?php

namespace Database\Seeders\GalehLudi;

use Carbon\Carbon;
use App\Models\GalehLudi\Tahun;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding database from Class TahunSeeder By Galeh Ludi');
        $faker = fake('id_ID');

        $startDate = Carbon::now()->subYears(5)->startOfYear();
        $endDate = Carbon::now()->endOfYear();

        while ($startDate->lte($endDate)) {
            if (Tahun::where('nama_tahun', $startDate->year)->count() === 0)
                Tahun::create([
                    'tahun_id' => "TH{$faker->unique()->numberBetween(1, 999)}",
                    'nama_tahun' => $startDate->year
                ]);

            $startDate->addYear();
        }
    }
}
