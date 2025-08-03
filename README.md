
# 📚 Aplikasi Absensi Siswa Berbasis Website

Aplikasi ini dibuat untuk mendigitalisasi proses absensi siswa di sekolah. Dibangun menggunakan Laravel 10, aplikasi ini menyediakan fitur login berdasarkan role (admin, guru, dan siswa), pengelolaan kelas, pencatatan absensi, dan rekap data kehadiran.

---

## 🎯 Tujuan & Manfaat

### Tujuan:
- Membantu sekolah melakukan pencatatan absensi secara digital.

### Manfaat:
- Mempermudah guru dalam mengelola absensi siswa.
- Memberikan kemudahan akses bagi siswa untuk mengisi absensi mandiri.
- Meningkatkan efisiensi dan akurasi data kehadiran.

---

## 🧠 Flow Sistem

![Flow Absensi Sekolah](flow.png)

---

## 🛠️ Tech Stack

- **Framework**: Laravel 10
- **UI Framework**: Bootstrap 5
- **JavaScript Library**: SweetAlert, AOS Init
- **Database**: MySQL (via XAMPP)

---

## 🔧 Cara Instalasi Cepat

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi secara lokal:

```bash
# 1. Clone repository
git clone https://github.com/username/absensi-siswa.git
cd absensi-siswa

# 2. Install dependency Laravel
composer install

# 3. Copy file konfigurasi environment
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Atur konfigurasi database di file .env
# Contoh:
# DB_DATABASE=absensi_sekolah
# DB_USERNAME=root
# DB_PASSWORD=

# 6. Jalankan migrasi & seeder (opsional untuk demo)
php artisan migrate --seed

# 7. Jalankan server lokal Laravel
php artisan serve
```

Akses di browser:
```
http://127.0.0.1:8000
```

---

## 👥 Role & Fitur Akses

### 🔐 Admin
- Menambahkan akun guru & siswa
- Membuat kelas & jurusan
- Melihat dan merekap absensi berdasarkan tanggal

### 👨‍🏫 Guru
- Mengisi absensi siswa per kelas
- Melihat data kelas
- Melihat riwayat absensi per tanggal

### 👨‍🎓 Siswa
- Mengisi absensi secara mandiri
- Melihat riwayat absensi pribadi

---

## 🧪 Akun Login Demo

Berikut adalah akun yang dapat digunakan untuk mencoba sistem:

```text
🔐 Admin
Email    : admin@gmail.com
Password : 123456

👨‍🏫 Guru
Email    : rini@gmail.com
Password : 123456

👨‍🎓 Siswa
Email    : restu@gmail.com
Password : 123456
```

> 📌 *Note: Email & password di atas tersedia jika kamu menjalankan seeder (`php artisan migrate --seed`).*

---

## 🗃️ Struktur Database

![Database Schema](tableAbsensi.png)

**Tabel Utama:**
- `users` → Menyimpan data pengguna (siswa/guru/admin)
- `roles` → Menentukan peran pengguna
- `kelas` → Data kelas dan jurusan
- `kehadiran` → Menyimpan absensi tiap user

---

## 📜 Lisensi

Proyek ini open-source dan menggunakan lisensi **MIT**.  
Silakan gunakan, modifikasi, dan distribusikan dengan bebas.

---

## 🙋‍♂️ Developer

**Fairuz Aqila Islami**  
SMK MUHAMMDIYAH 04 BOYOLALI (BARKAB)  
Bidang: REKAYASA DAN PERANGKAT LUNAK (RPL)
