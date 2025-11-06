# 📚 Aplikasi Absensi Siswa Berbasis Website

Aplikasi ini dibuat untuk mendigitalisasi proses absensi siswa di sekolah. Dibangun menggunakan **Laravel 10**, aplikasi ini menyediakan fitur login berdasarkan role (**admin, guru, dan siswa**), pengelolaan kelas, pencatatan absensi, **absensi berbasis kode unik dari guru**, dan rekap data kehadiran.

---

## 🎯 Tujuan & Manfaat

### Tujuan:
- Membantu sekolah melakukan pencatatan absensi secara digital dan aman dengan kode unik dari guru.

### Manfaat:
- Mempermudah guru dalam mengelola absensi siswa.
- Menjamin absensi siswa dilakukan pada waktu dan kelas yang tepat dengan kode unik.
- Memberikan kemudahan akses bagi siswa untuk mengisi absensi mandiri.
- Meningkatkan efisiensi dan akurasi data kehadiran.

---

## 🧠 Flow Sistem

![Flow Absensi Sekolah]<img width="1144" height="531" alt="Image" src="https://github.com/user-attachments/assets/820b8b07-8a27-4065-8fd8-aaa170354e49" />

**Penjelasan Flow:**
1. **Guru** membuat **kode absensi unik** untuk setiap kelas/pertemuan.
2. **Siswa** memasukkan kode absensi di halaman absensi.
3. Sistem memvalidasi kode, mencatat kehadiran, dan menyimpan data.
4. **Guru** dan **Admin** dapat memantau serta merekap data absensi.

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
- Membuat **kode absensi unik** untuk setiap pertemuan/kelas
- Mengisi absensi siswa per kelas
- Melihat data kelas
- Melihat riwayat absensi per tanggal

### 👨‍🎓 Siswa
- Memasukkan **kode absensi** untuk mengisi absensi
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

![Database Schema]<img width="1002" height="497" alt="Image" src="https://github.com/user-attachments/assets/e6927bed-c6fc-4f58-972a-41d11e3d2f87" />

**Tabel Utama:**
- `users` → Menyimpan data pengguna (siswa/guru/admin)
- `roles` → Menentukan peran pengguna
- `kelas` → Data kelas dan jurusan
- `kehadiran` → Menyimpan absensi tiap user
- `kode_absensi` → Menyimpan kode unik yang dibuat guru

---

## 📜 Lisensi

Proyek ini open-source dan menggunakan lisensi **MIT**.  
Silakan gunakan, modifikasi, dan distribusikan dengan bebas.

---

## 🙋‍♂️ Developer

**Fairuz Aqila Islami**  
SMK MUHAMMDIYAH 04 BOYOLALI (BARKAB)  
Bidang: REKAYASA PERANGKAT LUNAK (RPL)
