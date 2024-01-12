<?php

namespace Database\Seeders\GalehLudi;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\GalehLudi\Kurikulum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding database from Class KurikulumSeeder By Galeh Ludi');
        $faker = fake('id_ID');

        $startDate = Carbon::now()->subYears(5)->startOfYear();
        $endDate = Carbon::now()->endOfYear();

        while ($startDate->lte($endDate)) {
            for ($i = 1; $i <= 2; $i++) {
                if (Kurikulum::where('nama_kurikulum', "{$startDate->year}{$i}")->count() === 0)
                    Kurikulum::create([
                        'kurikulum_id' => "KR{$faker->unique()->numberBetween(1, 999)}",
                        'nama_kurikulum' => "{$startDate->year}{$i}"
                    ]);
            }

            $startDate->addYear();
        }
    }
}
