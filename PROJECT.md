# 🎉 MovementEvent

### Event Management System

---

## 📌 Overview

**MovementEvent** adalah aplikasi berbasis web untuk mengelola penerimaan tamu wedding secara profesional, scalable, dan siap digunakan untuk event skala besar maupun SaaS.

Aplikasi ini mendukung:

* Multi Event Management
* Guest Check-in System
* VIP Seating Management
* RSVP & Invitation System
* Event Organizer & Crew Management
* Live Display Screen
* Activity Logging & Analytics

---

## 🚀 Project Initialization

### 🔹 1. Create Laravel Project

```bash
composer create-project laravel/laravel MovementEvent
cd MovementEvent
```

---

### 🔹 2. Setup Environment

Edit `.env`:

```env
APP_NAME=MovementEvent

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=db_movement_event
DB_USERNAME=postgres
DB_PASSWORD=
```

---

### 🔹 3. Generate App Key

```bash
php artisan key:generate
```

---

### 🔹 4. Install Authentication (Laravel Breeze)

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run build
php artisan migrate
```

---

### 🔹 5. Install Additional Packages

```bash
composer require simplesoftwareio/simple-qrcode
composer require maatwebsite/excel
composer require spatie/laravel-permission
```

---

### 🔹 6. Run Migration & Seeder

```bash
php artisan migrate
php artisan db:seed
```

---

## 🧠 Architecture & Coding Pattern

Aplikasi ini menggunakan pendekatan:

### ✅ Clean Architecture Pattern

* Controller → Service → Repository

---

### 🔹 Controller Layer

* Menangani HTTP request & response
* Contoh:

  * `GuestArrivalController`

---

### 🔹 Service Layer

* Berisi business logic utama
* Contoh:

  * Validasi check-in
  * Logic attendance

---

### 🔹 Repository Layer

* Mengelola query database
* Abstraksi akses data

---

### 🔹 Benefits

* Code lebih modular
* Mudah di-maintain
* Scalable untuk SaaS

---

## 🧩 Main Features

### 🎯 Guest Management

* CRUD tamu
* Import data
* Kategori (VIP / Regular)

---

### 🎯 Check-in System

* Scan QR / input manual
* Validasi undangan
* Input jumlah hadir
* Anti double check-in

---

### 🎯 VIP Seating

* Assign meja untuk tamu VIP
* Kapasitas meja

---

### 🎯 Display Screen

* Menampilkan nama tamu
* Highlight VIP
* Informasi meja

---

### 🎯 Event Management

* Multi event
* Event Organizer
* Crew management

---

### 🎯 RSVP System

* Konfirmasi kehadiran
* Jumlah tamu

---

### 🎯 Activity Log

* Tracking aktivitas user
* Audit trail

---

## 🗃️ Database Structure & Explanation

---

### 🔹 events

Menyimpan data utama event.

| Field              | Fungsi        |
| ------------------ | ------------- |
| name               | Nama event    |
| event_date         | Tanggal acara |
| location           | Lokasi        |
| event_organizer_id | Relasi ke EO  |

---

### 🔹 event_organizers

Menyimpan data vendor / EO.

| Field            | Fungsi  |
| ---------------- | ------- |
| name             | Nama EO |
| contact          | Kontak  |
| person_in_charge | PIC     |

---

### 🔹 users

User aplikasi.

| Field | Fungsi    |
| ----- | --------- |
| name  | Nama user |
| email | Login     |
| role  | Role user |

---

### 🔹 event_user (Pivot)

Relasi many-to-many user ↔ event.

| Field    | Fungsi |
| -------- | ------ |
| event_id | Event  |
| user_id  | User   |

---

### 🔹 crews

Panitia event.

| Field    | Fungsi    |
| -------- | --------- |
| event_id | Event     |
| name     | Nama crew |
| role     | Tugas     |
| contact  | Kontak    |

---

### 🔹 categories

Kategori tamu.

| Field | Fungsi        |
| ----- | ------------- |
| name  | VIP / Regular |

---

### 🔹 tables

Meja tamu.

| Field    | Fungsi    |
| -------- | --------- |
| event_id | Event     |
| name     | Nama meja |
| capacity | Kapasitas |

---

### 🔹 guests ⭐ (CORE TABLE)

Data utama tamu.

| Field             | Fungsi          |
| ----------------- | --------------- |
| name              | Nama tamu       |
| qr_code           | Kode unik       |
| invitation_quota  | Jumlah undangan |
| total_attendees   | Jumlah hadir    |
| attendance_status | Status hadir    |
| checkin_at        | Waktu check-in  |

---

### 🔹 guest_logs

Log check-in tamu.

| Field        | Fungsi      |
| ------------ | ----------- |
| guest_id     | Relasi tamu |
| checkin_time | Waktu       |
| method       | QR / manual |

---

### 🔹 invitations

Undangan digital.

| Field           | Fungsi        |
| --------------- | ------------- |
| invitation_link | Link undangan |
| status          | Status kirim  |

---

### 🔹 rsvps

Konfirmasi kehadiran.

| Field             | Fungsi        |
| ----------------- | ------------- |
| attendance_status | Hadir / tidak |
| guest_count       | Jumlah        |

---

### 🔹 sessions

Sesi acara.

| Field      | Fungsi    |
| ---------- | --------- |
| name       | Nama sesi |
| start_time | Mulai     |
| end_time   | Selesai   |

---

### 🔹 rundowns

Timeline acara.

| Field            | Fungsi        |
| ---------------- | ------------- |
| title            | Nama acara    |
| start_time       | Waktu mulai   |
| end_time         | Waktu selesai |
| person_in_charge | PIC           |

---

### 🔹 activity_logs

Audit trail sistem.

| Field       | Fungsi |
| ----------- | ------ |
| user_id     | User   |
| action      | Aksi   |
| description | Detail |

---

## 🔄 System Flow

### 🔹 Guest Check-in

1. Input QR Code
2. Validasi tamu
3. Input jumlah hadir
4. Update database
5. Simpan log
6. Redirect ke display screen

---

### 🔹 Display Flow

* Menampilkan:

  * Nama tamu
  * Kategori
  * Meja VIP

---

## 🖥️ UI Overview

### 🔹 Check-in Page

* Input QR
* Input jumlah tamu

### 🔹 Display Screen

* Fullscreen
* Animasi welcome
* Highlight VIP

---

## 🔥 Key Highlights

* Multi Event Ready
* VIP Experience System
* Clean Architecture
* Scalable for SaaS
* Real-time capable

---

## 🚀 Future Enhancements

* QR Scan via Camera
* WhatsApp Integration
* Live Dashboard
* Offline Mode
* AI Face Recognition

---

## 👨‍💻 Author

Movement Event System
