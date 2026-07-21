<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\Proker;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Akun admin untuk login ke panel admin.
        // GANTI PASSWORD INI setelah instalasi pertama!
        User::updateOrCreate(
            ['email' => 'admin@dfourty.org'],
            [
                'name' => 'Admin Karang Taruna',
                'password' => Hash::make('dfourty2026'),
            ]
        );

        $prokerKerjaBakti = Proker::create([
            'nama_kegiatan' => 'Kerja Bakti Kebersihan Lingkungan',
            'kategori' => 'Sosial & Lingkungan',
            'deskripsi' => 'Gotong royong membersihkan saluran air dan fasilitas umum sebagai persiapan HUT RI ke-81.',
            'tanggal_mulai' => '2026-07-27',
            'tanggal_selesai' => '2026-07-27',
            'lokasi' => 'Lingkungan RW 040',
            'penanggung_jawab' => 'Mutiara Rifiya',
            'status' => 'selesai',
        ]);

        Proker::create([
            'nama_kegiatan' => 'Lomba 17-an Anak & Remaja',
            'kategori' => 'Lomba 17-an',
            'deskripsi' => 'Rangkaian lomba tradisional untuk anak-anak dan remaja RW 040: balap karung, makan kerupuk, tarik tambang, dan estafet kelereng.',
            'tanggal_mulai' => '2026-08-10',
            'tanggal_selesai' => '2026-08-10',
            'lokasi' => 'Lapangan Perumahan Panorama Wanasari',
            'penanggung_jawab' => 'Rasya Aditya Ariyanto',
            'status' => 'rencana',
        ]);

        Proker::create([
            'nama_kegiatan' => 'Malam Puncak HUT RI ke-81',
            'kategori' => 'Malam Puncak',
            'deskripsi' => 'Malam penutupan rangkaian HUT RI ke-81 dengan pembagian hadiah lomba, pentas seni warga, dan doa bersama.',
            'tanggal_mulai' => '2026-08-29',
            'tanggal_selesai' => '2026-08-29',
            'lokasi' => 'Lapangan Perumahan Panorama Wanasari',
            'penanggung_jawab' => 'Muhammad Afriza Hidayat',
            'status' => 'rencana',
        ]);

        Anggota::insert([
            [
                'nama' => 'Muhammad Afriza Hidayat',
                'jenis_kelamin' => 'L',
                'no_hp' => null,
                'alamat' => 'Perumahan Panorama Wanasari',
                'rt_rw' => 'RW 040',
                'jabatan' => 'Ketua',
                'status' => 'aktif',
                'tanggal_bergabung' => '2024-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rasya Aditya Ariyanto',
                'jenis_kelamin' => 'L',
                'no_hp' => null,
                'alamat' => 'Perumahan Panorama Wanasari',
                'rt_rw' => 'RW 040',
                'jabatan' => 'Ketua Pelaksana HUT RI',
                'status' => 'aktif',
                'tanggal_bergabung' => '2024-06-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Mutiara Rifiya',
                'jenis_kelamin' => 'P',
                'no_hp' => null,
                'alamat' => 'Perumahan Panorama Wanasari',
                'rt_rw' => 'RW 040',
                'jabatan' => 'Sekretaris',
                'status' => 'aktif',
                'tanggal_bergabung' => '2024-03-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
