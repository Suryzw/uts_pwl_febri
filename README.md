# Nama Proyek Laravel
Deskripsi singkat mengenai proyek ini. Misalnya:  
Aplikasi web berbasis Laravel untuk menghitung jumlah sampah yang dibuang oleh user.

---

## 🛠️ Persyaratan Sistem

Pastikan Anda sudah menginstall:
- PHP >= 8.x
- Composer
- Node.js & npm
- Database server (MySQL/PostgreSQL/etc.)

---

## 🚀 Cara Menjalankan Proyek

Ikuti langkah-langkah berikut untuk menjalankan proyek di lokal Anda:

### 1. Clone Repository

```
git clone https://github.com/username/nama-repo.git
cd nama-repo
```

### 2. Install Dependensi PHP

```
composer install
```

### 3. Install Dependensi Frontend

```
npm install
```

### 4. Salin File Environment

```
cp .env.example .env
```

### 5. Konfigurasi File
Edit ```.env``` sesuai kebutuhan, terutama bagian koneksi database dan nama aplikasi.

### 6. Generate App Key
```php artisan key:generate```

### 7. Jalankan Migrasi Database (Optional)
```php artisan migrate```

### 8. Jalankan Server
```php artisan serve```
Aplikasi akan tersedia di http://localhost:8000

---

## 📦 Catatan
Folder berikut tidak termasuk dalam repository karena diabaikan oleh .gitignore:

```vendor/``` → Harus di-install dengan composer install

```node_modules/``` → Harus di-install dengan npm install

Pastikan menjalankan kedua perintah tersebut setelah meng-clone repository.

---

## 📁 Struktur Direktori Penting
```app/``` – Kode utama Laravel

```routes/``` – File rute (web.php, api.php, dsb.)

```resources/``` – View (Blade), JS, dan CSS

```public/``` – Root untuk web server

```database/``` – Migrasi dan seeder
