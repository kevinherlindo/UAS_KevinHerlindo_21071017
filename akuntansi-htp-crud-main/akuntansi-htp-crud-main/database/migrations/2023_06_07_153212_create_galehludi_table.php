<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('t_dosen')) {
            Schema::table('t_dosen', function (Blueprint $table) {
                $table->string('dosen_id')->primary();
                $table->string('nama_dosen', 50);
                $table->string('alamat', 100);
                $table->string('handphone', 15);
                $table->timestamps();
            });
        } else {
            Schema::create('t_dosen', function (Blueprint $table) {
                $table->string('dosen_id')->primary();
                $table->string('nama_dosen', 50);
                $table->string('alamat', 100);
                $table->string('handphone', 25);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('t_prodi')) {
            Schema::table('t_prodi', function (Blueprint $table) {
                $table->string('prodi_id')->primary();
                $table->string('nama_prodi', 50);
                $table->string('pejabat', 100);
                $table->timestamps();
            });
        } else {
            Schema::create('t_prodi', function (Blueprint $table) {
                $table->string('prodi_id')->primary();
                $table->string('nama_prodi', 50);
                $table->string('pejabat', 100);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('t_program')) {
            Schema::table('t_program', function (Blueprint $table) {
                $table->string('program_id')->primary();
                $table->string('nama_program', 50);
                $table->timestamps();
            });
        } else {
            Schema::create('t_program', function (Blueprint $table) {
                $table->string('program_id')->primary();
                $table->string('nama_program', 50);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('t_ruang')) {
            Schema::table('t_ruang', function (Blueprint $table) {
                $table->string('ruang_id')->primary();
                $table->string('nama_ruang', 50);
                $table->timestamps();
            });
        } else {
            Schema::create('t_ruang', function (Blueprint $table) {
                $table->string('ruang_id')->primary();
                $table->string('nama_ruang', 50);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('t_kelas')) {
            Schema::table('t_kelas', function (Blueprint $table) {
                $table->string('kelas_id')->primary();
                $table->string('nama_kelas', 50);
                $table->string('keterangan', 100);
                $table->timestamps();
            });
        } else {
            Schema::create('t_kelas', function (Blueprint $table) {
                $table->string('kelas_id')->primary();
                $table->string('nama_kelas', 50);
                $table->string('keterangan', 100);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('t_kurikulum')) {
            Schema::table('t_kurikulum', function (Blueprint $table) {
                $table->string('kurikulum_id')->primary();
                $table->string('nama_kurikulum', 50);
                $table->timestamps();
            });
        } else {
            Schema::create('t_kurikulum', function (Blueprint $table) {
                $table->string('kurikulum_id')->primary();
                $table->string('nama_kurikulum', 50);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('t_tahun')) {
            Schema::table('t_tahun', function (Blueprint $table) {
                $table->string('tahun_id')->primary();
                $table->string('nama_tahun', 50);
                $table->timestamps();
            });
        } else {
            Schema::create('t_tahun', function (Blueprint $table) {
                $table->string('tahun_id')->primary();
                $table->string('nama_tahun', 50);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('t_hari')) {
            Schema::table('t_hari', function (Blueprint $table) {
                $table->string('hari_id')->primary();
                $table->string('nama_hari', 50);
                $table->timestamps();
            });
        } else {
            Schema::create('t_hari', function (Blueprint $table) {
                $table->string('hari_id')->primary();
                $table->string('nama_hari', 50);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('t_mahasiswa')) {
            Schema::table('t_mahasiswa', function (Blueprint $table) {
                $table->string('nim')->primary();
                $table->string('nama_mahasiswa', 50);
                $table->string('alamat', 100);
                $table->string('prodi_id');
                $table->foreign('prodi_id')->references('prodi_id')->on('t_prodi');
                $table->string('program_id');
                $table->foreign('program_id')->references('program_id')->on('t_program');
                $table->timestamps();
            });
        } else {
            Schema::create('t_mahasiswa', function (Blueprint $table) {
                $table->string('nim')->primary();
                $table->string('nama_mahasiswa', 50);
                $table->string('alamat', 100);
                $table->string('prodi_id');
                $table->foreign('prodi_id')->references('prodi_id')->on('t_prodi');
                $table->string('program_id');
                $table->foreign('program_id')->references('program_id')->on('t_program');
                $table->timestamps();
            });
        }

        if (Schema::hasTable('t_matakuliah')) {
            Schema::table('t_matakuliah', function (Blueprint $table) {
                $table->string('mkid')->primary();
                $table->string('nama_mk', 50);
                $table->integer('sks');
                $table->string('semester', 2);
                $table->string('kurikulum_id');
                $table->foreign('kurikulum_id')->references('kurikulum_id')->on('t_kurikulum');
                $table->timestamps();
            });
        } else {
            Schema::create('t_matakuliah', function (Blueprint $table) {
                $table->string('mkid')->primary();
                $table->string('nama_mk', 50);
                $table->integer('sks');
                $table->string('semester', 2);
                $table->string('kurikulum_id');
                $table->foreign('kurikulum_id')->references('kurikulum_id')->on('t_kurikulum');
                $table->timestamps();
            });
        }

        if (Schema::hasTable('t_jadwal')) {
            Schema::table('t_jadwal', function (Blueprint $table) {
                $table->string('jadwal_id')->primary();
                $table->string('mkid');
                $table->string('tahun_id');
                $table->string('prodi_id');
                $table->string('kelas_id');
                $table->string('ruang_id');
                $table->string('dosen_id');
                $table->string('hari_id');
                $table->foreign('mkid')->references('mkid')->on('t_matakuliah');
                $table->foreign('tahun_id')->references('tahun_id')->on('t_tahun');
                $table->foreign('prodi_id')->references('prodi_id')->on('t_prodi');
                $table->foreign('kelas_id')->references('kelas_id')->on('t_kelas');
                $table->foreign('ruang_id')->references('ruang_id')->on('t_ruang');
                $table->foreign('dosen_id')->references('dosen_id')->on('t_dosen');
                $table->foreign('hari_id')->references('hari_id')->on('t_hari');
                $table->time('jam_mulai');
                $table->time('jam_selesai');
                $table->timestamps();
            });
        } else {
            Schema::create('t_jadwal', function (Blueprint $table) {
                $table->string('jadwal_id')->primary();
                $table->string('mkid');
                $table->string('tahun_id');
                $table->string('prodi_id');
                $table->string('kelas_id');
                $table->string('ruang_id');
                $table->string('dosen_id');
                $table->string('hari_id');
                $table->foreign('mkid')->references('mkid')->on('t_matakuliah');
                $table->foreign('tahun_id')->references('tahun_id')->on('t_tahun');
                $table->foreign('prodi_id')->references('prodi_id')->on('t_prodi');
                $table->foreign('kelas_id')->references('kelas_id')->on('t_kelas');
                $table->foreign('ruang_id')->references('ruang_id')->on('t_ruang');
                $table->foreign('dosen_id')->references('dosen_id')->on('t_dosen');
                $table->foreign('hari_id')->references('hari_id')->on('t_hari');
                $table->time('jam_mulai');
                $table->time('jam_selesai');
                $table->timestamps();
            });
        }

        if (Schema::hasTable('t_krs')) {
            Schema::table('t_krs', function (Blueprint $table) {
                $table->string('krs_id')->primary();
                $table->string('tahun_id');
                $table->string('nim');
                $table->foreign('tahun_id')->references('tahun_id')->on('t_tahun');
                $table->foreign('nim')->references('nim')->on('t_mahasiswa');
                $table->string('tugas');
                $table->string('kehadiran');
                $table->string('uts');
                $table->string('uas');
                $table->string('nilai_angka');
                $table->string('nilai_huruf');
                $table->timestamps();
            });
        } else {
            Schema::create('t_krs', function (Blueprint $table) {
                $table->string('krs_id')->primary();
                $table->string('tahun_id');
                $table->string('nim');
                $table->foreign('tahun_id')->references('tahun_id')->on('t_tahun');
                $table->foreign('nim')->references('nim')->on('t_mahasiswa');
                $table->string('tugas');
                $table->string('kehadiran');
                $table->string('uts');
                $table->string('uas');
                $table->string('nilai_angka');
                $table->string('nilai_huruf');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Schema::dropIfExists('t_dosen');
            Schema::dropIfExists('t_prodi');
            Schema::dropIfExists('t_program');
            Schema::dropIfExists('t_ruang');
            Schema::dropIfExists('t_kelas');
            Schema::dropIfExists('t_kurikulum');
            Schema::dropIfExists('t_tahun');
            Schema::dropIfExists('t_hari');
            Schema::dropIfExists('t_mahasiswa');
            Schema::dropIfExists('t_matakuliah');
            Schema::dropIfExists('t_jadwal');
            Schema::dropIfExists('t_krs');
        });
    }
};
