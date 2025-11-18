# 🗄️ Import Database ke Railway MySQL

## Kredensial Database Railway

```
Host: trolley.proxy.rlwy.net
Port: 46489
Username: root
Password: AoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt
Database: railway
```

## 📋 Cara Import Database

### Metode 1: Menggunakan Laravel Migrations (RECOMMENDED) ⭐

Ini adalah cara TERMUDAH dan TERBAIK:

```bash
# 1. Pastikan .env sudah diupdate dengan kredensial Railway
./update_env_railway.sh

# 2. Clear config cache
php artisan config:clear

# 3. Jalankan migrations dan seeders
php artisan migrate:fresh --seed
```

### Metode 2: Import SQL File Langsung

Jika Anda sudah punya file SQL backup:

```bash
# Import ke Railway
mysql -h trolley.proxy.rlwy.net -u root -pAoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt --port 46489 --protocol=TCP railway < database_backup.sql
```

### Metode 3: Export dari Database Lokal Lalu Import

```bash
# 1. Export dari database lokal
mysqldump -u root -p nama_database_lokal > database_backup.sql

# 2. Import ke Railway
mysql -h trolley.proxy.rlwy.net -u root -pAoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt --port 46489 --protocol=TCP railway < database_backup.sql
```

### Metode 4: Menggunakan Script

```bash
# Jalankan script import
chmod +x import_database_railway.sh
./import_database_railway.sh
```

## ✅ Verifikasi Import

Setelah import, verifikasi dengan:

```bash
# Test koneksi
php artisan tinker
```

Di dalam tinker:
```php
DB::connection()->getPdo();
// Jika berhasil, akan menampilkan PDO object

// Test query
DB::table('users')->count();
```

## 🔄 Setelah Import

1. **Clear cache**:
   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan route:clear
   ```

2. **Test aplikasi**:
   ```bash
   php artisan serve
   ```

3. **Akses aplikasi**:
   - Homepage: `http://localhost:8000`
   - Admin Login: `http://localhost:8000/admin/login`
   - Default Admin: `admin@oxfordhigh.edu` / `admin123`

## 🚨 Troubleshooting

### Error: Access Denied
- Pastikan password benar: `AoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt`
- Pastikan host dan port benar
- Cek firewall Railway

### Error: Unknown Database
- Pastikan database `railway` sudah dibuat di Railway dashboard
- Atau buat database baru di Railway

### Error: Connection Timeout
- Cek koneksi internet
- Pastikan Railway service aktif
- Cek firewall settings

### Error: Table Already Exists
Jika tabel sudah ada, gunakan:
```bash
php artisan migrate:fresh --seed
```
Ini akan drop semua tabel dan membuat ulang.

## 📝 Catatan Penting

1. **File .env TIDAK di-push ke GitHub** (untuk keamanan)
2. **Gunakan script `update_env_railway.sh`** untuk update .env
3. **Backup database lokal** sebelum import ke Railway
4. **Test koneksi** sebelum menjalankan aplikasi

