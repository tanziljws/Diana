# 🚂 Setup Database Railway

## Konfigurasi Database Railway

Database credentials:
- **Host**: `trolley.proxy.rlwy.net`
- **Port**: `46489`
- **Username**: `root`
- **Password**: `AoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt`
- **Database**: `railway`

## 📝 Update .env File

### Opsi 1: Menggunakan Script (Recommended)
```bash
chmod +x update_env_railway.sh
./update_env_railway.sh
```

### Opsi 2: Manual Update
Edit file `.env` dan update konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=trolley.proxy.rlwy.net
DB_PORT=46489
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=AoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt
```

## 🗄️ Import Database ke Railway

### Opsi 1: Menggunakan Laravel Migrations (Recommended)
```bash
# Update .env terlebih dahulu
./update_env_railway.sh

# Jalankan migrations
php artisan migrate:fresh --seed
```

### Opsi 2: Import SQL File
```bash
# Export database lokal (jika ada)
mysqldump -u root -p nama_database_lokal > database_backup.sql

# Import ke Railway
mysql -h trolley.proxy.rlwy.net -u root -pAoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt --port 46489 --protocol=TCP railway < database_backup.sql
```

### Opsi 3: Menggunakan Script
```bash
chmod +x import_database_railway.sh
./import_database_railway.sh
```

## ✅ Verifikasi Koneksi

Test koneksi database:
```bash
php artisan tinker
```

Di dalam tinker:
```php
DB::connection()->getPdo();
// Jika berhasil, akan menampilkan PDO object
```

## 🔄 Setelah Setup

1. **Clear cache**:
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

2. **Test aplikasi**:
   ```bash
   php artisan serve
   ```

3. **Akses aplikasi**:
   - Homepage: `http://localhost:8000`
   - Admin: `http://localhost:8000/admin/login`

## 📋 Checklist

- [ ] Update .env dengan kredensial Railway
- [ ] Test koneksi database
- [ ] Jalankan migrations
- [ ] Seed database (jika ada seeder)
- [ ] Test aplikasi
- [ ] Push perubahan ke GitHub

## 🚨 Troubleshooting

### Error: Access Denied
- Pastikan password benar
- Pastikan host dan port benar
- Cek firewall Railway

### Error: Unknown Database
- Pastikan database `railway` sudah dibuat di Railway
- Atau buat database baru di Railway dashboard

### Error: Connection Timeout
- Cek koneksi internet
- Pastikan Railway service aktif
- Cek firewall settings

