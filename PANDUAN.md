# Website Karang Taruna D'Fourty — Panduan Setup

Website Laravel untuk Karang Taruna D'Fourty (RW 040, Perumahan Panorama Wanasari, Cibitung, Bekasi).

## Fitur

- **Halaman publik**: Beranda, Profil (visi/misi/struktur), Program Kerja (dengan filter status & kategori), Galeri Kegiatan, Data Anggota (direktori, tanpa data kontak pribadi)
- **Panel admin** (`/login`): kelola Program Kerja, Galeri (upload foto), dan Data Anggota — CRUD penuh
- Desain custom (bukan template Bootstrap generik), tema "papan mading" yang terasa dekat dengan budaya Karang Taruna

## 1. Jalankan di komputer sendiri (lokal)

Pastikan sudah terinstall: **PHP 8.2+**, **Composer**. (Node/npm tidak wajib — halaman pakai Tailwind lewat CDN, jadi tidak perlu `npm run build`.)

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Buka `http://localhost:8000`.

**Login admin default** (langsung ganti setelah login pertama):
- Email: `admin@dfourty.org`
- Password: `dfourty2026`

Untuk ganti password admin lewat terminal:
```bash
php artisan tinker
>>> $u = App\Models\User::first();
>>> $u->password = Hash::make('password_baru_kamu');
>>> $u->save();
```

## 2. Struktur data

| Tabel | Isi |
|---|---|
| `prokers` | Program kerja: nama, kategori, deskripsi, tanggal, lokasi, status (rencana/berlangsung/selesai) |
| `galeris` | Foto kegiatan, bisa dikaitkan ke satu proker |
| `anggotas` | Data anggota: nama, jabatan, status keanggotaan, kontak (kontak **tidak** ditampilkan di halaman publik, hanya di panel admin) |

Semua bisa ditambah/ubah/hapus dari panel admin, tidak perlu sentuh kode.

## 3. Opsi hosting (pilih salah satu)

**A. Shared hosting cPanel (Niagahoster / DomaiNesia / Rumahweb, dsb.)**
Paling simpel buat organisasi seperti Karang Taruna — tinggal pilih paket yang support PHP 8.2+ & Laravel, upload lewat File Manager/Git, jalankan `composer install` via terminal cPanel, set folder `public/` sebagai document root. Biaya biasanya paling murah (puluhan ribu/bulan) dan gampang untuk serah-terima ke pengurus berikutnya karena banyak yang familiar dengan cPanel.

**B. Google Cloud Platform (Compute Engine + Ubuntu + Apache)**
Sama seperti setup portfolio kamu sebelumnya. Cocok kalau mau full kontrol. Karena ini juga sempat kena isu billing di Google Cloud Console, **pastikan pasang Budget & Alerts** di Billing sebelum deploy, dan pertimbangkan pakai VM `e2-micro` (masuk always-free tier di region tertentu) supaya nggak ada tagihan mengejutkan.

**C. Railway / Render (gratis dengan batasan)**
Cocok buat coba-coba/demo dulu sebelum yakin pakai yang berbayar. Ada limit jam aktif & kadang "tidur" kalau nggak diakses.

## 4. Sebelum go-live

- Ganti `APP_ENV=production` dan `APP_DEBUG=false` di `.env`
- Ganti password admin default
- Jalankan `php artisan migrate --seed` sekali saja di server (jangan berkali-kali, nanti data proker contoh dobel)
- Kalau pakai MySQL di hosting: ganti `DB_CONNECTION=mysql` dan isi `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` di `.env`, lalu `php artisan migrate --seed`
