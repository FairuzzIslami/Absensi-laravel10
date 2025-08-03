# 📚 Aplikasi Absensi Siswa Berbasis Website

Aplikasi ini dibuat untuk membantu proses absensi siswa secara digital dan efisien. Dibangun menggunakan Laravel 10 dan dirancang untuk digunakan oleh tiga peran utama: **Admin**, **Guru**, dan **Siswa**.

---

## 🎯 Tujuan
- Meningkatkan efisiensi dalam pencatatan absensi siswa.
- Meminimalisir kesalahan dalam rekap absensi manual.
- Memberikan akses absensi real-time bagi guru dan siswa.

## 📌 Alasan
- Sistem manual sulit dikontrol dan mudah hilang datanya.
- Sekolah membutuhkan sistem digital yang mudah digunakan dan cepat.

## ✅ Manfaat
- Memudahkan monitoring absensi.
- Mempermudah rekapitulasi data kehadiran.
- Meningkatkan transparansi dan akurasi data absensi.

---

## 🧠 Flow Sistem

![Flow Absensi Sekolah](flow.png)

---

## 🧩 Struktur Database

![Database Schema](tableAbsensi.png)

---

## 🛠️ Tech Stack

### Backend
- Laravel 10 (PHP Framework)

### Frontend/UI
- Bootstrap 5 (UI Framework)

### JS Libraries
- SweetAlert (Notifikasi interaktif)
- AOS Init (Animasi scroll)

### Database
- MySQL (via XAMPP)

---

## 🚀 Fitur Utama

### 👤 Admin
- Membuat akun Siswa & Guru
- Membuat Kelas & Jurusan
- Merekap data absensi per hari

### 👨‍🏫 Guru
- Mengisi data absensi siswa
- Melihat riwayat absensi per tanggal
- Melihat data kelas

### 👨‍🎓 Siswa
- Mengisi absensi sendiri
- Melihat riwayat absensi

---

## 📥 Instalasi

### 
1. Clone Repository
bash
git clone https://github.com/username/absensi-siswa.git
cd absensi-siswa

2. Install Dependency Backend
bash
composer install
