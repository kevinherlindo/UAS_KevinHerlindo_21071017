<?php

namespace Database\Seeders\GalehLudi;

use App\Models\GalehLudi\Kurikulum;
use App\Models\GalehLudi\Matakuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Seeding database from Class MatakuliahSeeder By Galeh Ludi');
        $faker = fake('id_ID');

        $mk = [
            'PRAKTEK DASAR KOMPUTER',
            'SISTEM OPERASI',
            'ALGORITMA DAN PEMROGRAMAN I',
            'SISTEM DIGITAL',
            'INTERAKSI MANUSIA DAN KOMPUTER',
            'ARSITEKTUR DAN ORGANISASI KOMPUTER',
            'ALGORITMA DAN PEMROGRAMAN II',
            'BASIS DATA I',
            'KOMUNIKASI DATA',
            'STRUKTUR DATA',
            'BASIS DATA II',
            'BAHASA PEMROGRAMAN I',
            'TEKNOLOGI OPEN SOURCE',
            'ANALISA DAN PERANCANGAN SISTEM INFORMASI (SADT)',
            'SISTEM INFORMASI MANAJEMEN',
            'JARINGAN KOMPUTER',
            'PEMROGRAMAN WEB',
            'PEMROGRAMAN BERIORIENTASI OBJEK',
            'PEMROGRAMAN AKUNTANSI',
            'METODE PENELITIAN',
            'ANALISA PROSES BISNIS',
            'PEMROGRAMAN FRAMEWORK',
            'CLOUD COMPUTING',
            'SISTEM PENDUKUNG KEPUTUSAN',
            'PEMROGRAMAN MOBILE',
            'DBMS',
            'DATA WAREHOUSE DAN DATA MINING'
        ];

        if (Kurikulum::count() === 0)
            $this->call(KurikulumSeeder::class);

        foreach ($mk as $value) {
            if (Matakuliah::where('nama_mk', $value)->count() === 0)
                Matakuliah::create([
                    'mkid' => 'MK' . str_pad($faker->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
                    'nama_mk' => $value,
                    'semester' => $faker->numberBetween(1, 8),
                    'sks' => $faker->randomElement([2, 3]),
                    'kurikulum_id' => Kurikulum::inRandomOrder()->first()->kurikulum_id
                ]);
        }
    }
}
