# Installation Guide - Website Galeri Sekolah

## 📋 Prerequisites

Sebelum menginstal aplikasi, pastikan sistem Anda memenuhi persyaratan berikut:

- **PHP** 8.2 atau lebih tinggi
- **Composer** (Package manager untuk PHP)
- **MySQL** 5.7 atau lebih tinggi
- **Web Server** (Apache/Nginx) atau XAMPP/WAMP
- **Git** (untuk clone repository)

## 🚀 Step-by-Step Installation

### 1. Clone Repository
```bash
git clone <repository-url>
cd galerisekolah
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Setup Environment File
```bash
cp .env.example .env
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Configure Database
Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_sekolah
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Create Database
Buat database baru di MySQL dengan nama `db_sekolah`:

```sql
CREATE DATABASE db_sekolah;
```

### 7. Run Migrations
```bash
php artisan migrate:fresh
```

### 8. Seed Database
```bash
php artisan db:seed
```

### 9. Create Storage Link (Optional)
Untuk upload file galeri:
```bash
php artisan storage:link
```

### 10. Start Development Server
```bash
php artisan serve
```

Aplikasi sekarang berjalan di `http://localhost:8000`

## 🔐 Default Accounts

Setelah instalasi selesai, Anda dapat login dengan akun default berikut:

### Admin Account
- **Email**: admin@sekolah.com
- **Password**: password123
- **Role**: Administrator

### User Account
- **Email**: user@sekolah.com
- **Password**: password123
- **Role**: Regular User

## 🧪 Testing Installation

### 1. Test Web Interface
- Buka browser dan akses `http://localhost:8000`
- Anda akan melihat halaman welcome dengan interface testing API

### 2. Test API Endpoints
- Klik tombol "Test Login" untuk test autentikasi
- Klik tombol "Get Posts" untuk test endpoint publik
- Klik tombol "Get Categories" untuk test endpoint kategori

### 3. Test dengan cURL
```bash
# Test login
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "admin@sekolah.com",
    "password": "password123"
  }'

# Test get posts
curl -X GET http://localhost:8000/api/posts
```

## 🔧 Configuration Options

### Database Configuration
Jika menggunakan database yang berbeda, edit file `.env`:

```env
# MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_sekolah
DB_USERNAME=your_username
DB_PASSWORD=your_password

# PostgreSQL
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=db_sekolah
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### File Upload Configuration
Untuk mengaktifkan upload file galeri:

1. Pastikan folder `storage/app/public/photos/` memiliki permission write
2. Jalankan `php artisan storage:link`
3. File akan tersimpan di `public/storage/photos/`

### CORS Configuration
Jika ada masalah CORS, edit file `config/cors.php`:

```php
'allowed_origins' => ['http://localhost:3000', 'http://localhost:8080'],
```

## 🚨 Troubleshooting

### 1. Composer Install Error
```bash
# Clear composer cache
composer clear-cache

# Update composer
composer self-update

# Install dengan --ignore-platform-reqs
composer install --ignore-platform-reqs
```

### 2. Database Connection Error
- Pastikan MySQL service berjalan
- Periksa username dan password database
- Pastikan database `db_sekolah` sudah dibuat

### 3. Permission Error
```bash
# Set permission untuk storage
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
```

### 4. Migration Error
```bash
# Clear cache
php artisan config:clear
php artisan cache:clear

# Reset migration
php artisan migrate:fresh --seed
```

### 5. Server Not Starting
```bash
# Check if port 8000 is available
netstat -an | grep 8000

# Use different port
php artisan serve --port=8080
```

## 📁 Project Structure

```
galerisekolah/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Api/          # API Controllers
│   │   └── Middleware/       # Custom Middleware
│   └── Models/               # Eloquent Models
├── database/
│   ├── migrations/           # Database Migrations
│   └── seeders/             # Database Seeders
├── routes/
│   └── api.php              # API Routes
├── resources/
│   └── views/
│       └── welcome.blade.php # Welcome Page
├── storage/
│   └── app/
│       └── public/
│           └── photos/       # Uploaded Photos
└── public/                   # Public Assets
```

## 🔄 Update Application

Untuk mengupdate aplikasi:

```bash
# Pull latest changes
git pull origin main

# Install new dependencies
composer install

# Run new migrations
php artisan migrate

# Clear cache
php artisan config:clear
php artisan cache:clear
```

## 📞 Support

Jika mengalami masalah dalam instalasi:

1. Periksa error log di `storage/logs/laravel.log`
2. Pastikan semua persyaratan sistem terpenuhi
3. Coba langkah troubleshooting di atas
4. Buat issue di repository dengan detail error

## 🎯 Next Steps

Setelah instalasi berhasil:

1. **Explore API**: Gunakan interface testing di halaman utama
2. **Read Documentation**: Baca `README.md` dan `API_TESTING.md`
3. **Customize**: Sesuaikan aplikasi dengan kebutuhan
4. **Deploy**: Deploy ke production server

---

**Selamat! Aplikasi Website Galeri Sekolah berhasil diinstal! 🎉**





