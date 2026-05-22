<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $berlian = User::where('email', 'berlian@sipema.com')->first();
        $ishika = User::where('email', 'ishika@sipema.com')->first();

        if ($berlian) {
            // Complaint 1: Belum Diproses
            Pengaduan::create([
                'user_id' => $berlian->id,
                'judul' => 'AC Ruang 302 Gedung Kuliah Bersama Rusak',
                'kategori' => 'Fasilitas',
                'deskripsi' => 'AC di ruang kelas 302 mengeluarkan suara bising dan tidak dingin sama sekali sejak 2 hari yang lalu, sehingga mengganggu konsentrasi belajar-mengajar.',
                'bukti' => null,
                'status' => 'Belum Diproses',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ]);

            // Complaint 2: Diproses
            Pengaduan::create([
                'user_id' => $berlian->id,
                'judul' => 'Koneksi Wi-fi Lemot di Perpustakaan Lantai 2',
                'kategori' => 'Pelayanan',
                'deskripsi' => 'Koneksi internet Wi-fi di area pojok baca perpustakaan lantai 2 sangat lambat dan sering terputus sendiri, menyulitkan mahasiswa yang ingin mencari referensi tugas akhir.',
                'bukti' => null,
                'status' => 'Diproses',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(2),
            ]);

            // Complaint 3: Selesai
            Pengaduan::create([
                'user_id' => $berlian->id,
                'judul' => 'KRS Mengalami Error Saat Jam Pengisian Utama',
                'kategori' => 'Akademik',
                'deskripsi' => 'Aplikasi portal akademik mengalami crash 500 internal server error saat mahasiswa serentak mengakses untuk pengisian KRS semester genap.',
                'bukti' => null,
                'status' => 'Selesai',
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(8),
            ]);
        }

        if ($ishika) {
            // Complaint 4: Belum Diproses
            Pengaduan::create([
                'user_id' => $ishika->id,
                'judul' => 'Lampu Kelas Mati di Lab Komputer 3',
                'kategori' => 'Fasilitas',
                'deskripsi' => 'Tiga buah lampu bohlam di Lab Komputer 3 mati total, menyebabkan suasana ruangan menjadi redup terutama saat praktikum sore hari.',
                'bukti' => null,
                'status' => 'Belum Diproses',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ]);

            // Complaint 5: Diproses
            Pengaduan::create([
                'user_id' => $ishika->id,
                'judul' => 'Proyektor Tidak Menyala di Ruang Aula Utama',
                'kategori' => 'Fasilitas',
                'deskripsi' => 'Proyektor utama gantung di Aula tidak mendeteksi sinyal input HDMI dari laptop pemateri seminar, diduga port konektor longgar atau kabel internal putus.',
                'bukti' => null,
                'status' => 'Diproses',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDay(),
            ]);
        }
    }
}
