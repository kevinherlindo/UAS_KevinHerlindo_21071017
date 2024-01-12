<?php

namespace Database\Seeders\GalehLudi;

use App\Models\GalehLudi\Dosen;
use App\Models\GalehLudi\Hari;
use App\Models\GalehLudi\Jadwal;
use App\Models\GalehLudi\Kelas;
use App\Models\GalehLudi\Kurikulum;
use App\Models\GalehLudi\Matakuliah;
use App\Models\GalehLudi\Prodi;
use App\Models\GalehLudi\Ruang;
use App\Models\GalehLudi\Tahun;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Hari::count() === 0)
            $this->call(HariSeeder::class);

        if (Tahun::count() === 0)
            $this->call(TahunSeeder::class);

        if (Kelas::count() === 0)
            $this->call(KelasSeeder::class);

        if (Ruang::count() === 0)
            $this->call(RuangSeeder::class);

        if (Prodi::count() === 0)
            $this->call(ProdiSeeder::class);

        if (Kurikulum::count() === 0)
            $this->call(KurikulumSeeder::class);

        if (Matakuliah::count() === 0)
            $this->call(MatakuliahSeeder::class);

        $this->command->info('Seeding database from Class JadwalSeeder By Galeh Ludi');

        $count = 0;
        if (Dosen::count() > Matakuliah::count())
            $count = Matakuliah::count();
        else
            $count = Dosen::count();

        $currMK = Matakuliah::inRandomOrder()->first(['mkid', 'sks']);
        $currDos = Dosen::inRandomOrder()->first('dosen_id')->dosen_id;

        $mk = Matakuliah::inRandomOrder()->get(['mkid', 'sks']);
        $dos = Dosen::inRandomOrder()->get('dosen_id');

        $faker = fake('id_ID');

        for ($i = 0; $i < $count; $i++) {
            $mk = collect($mk)->shuffle()->all();
            $currMK = collect($mk)->first();
            $mk = collect($mk)->except(0)->all();

            $dos = collect($dos)->shuffle()->all();
            $currDos = collect($dos)->first()->dosen_id;
            $dos = collect($dos)->except(0)->all();

            $startTime = $faker->dateTimeBetween('08:00', '20:00');

            $sksDuration = (int)$currMK->sks * 50;

            $endTime = clone $startTime;
            $endTime->modify("+{$sksDuration} minutes");

            Jadwal::create([
                'jadwal_id' => "J{$faker->unique()->numberBetween(1, 999)}",
                'mkid' => $currMK->mkid,
                'tahun_id' => Tahun::inRandomOrder()->first('tahun_id')->tahun_id,
                'prodi_id' => Prodi::inRandomOrder()->first('prodi_id')->prodi_id,
                'kelas_id' => Kelas::inRandomOrder()->first('kelas_id')->kelas_id,
                'ruang_id' => Ruang::inRandomOrder()->first('ruang_id')->ruang_id,
                'dosen_id' => $currDos,
                'hari_id' => Hari::inRandomOrder()->first('hari_id')->hari_id,
                'jam_mulai' => $startTime->format('H:i'),
                'jam_selesai' => $endTime->format('H:i')
            ]);
        }
    }
}
