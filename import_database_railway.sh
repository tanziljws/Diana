#!/bin/bash

# Script untuk import database ke Railway MySQL
# Pastikan MySQL client sudah terinstall

DB_HOST="trolley.proxy.rlwy.net"
DB_PORT="46489"
DB_USER="root"
DB_PASS="AoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt"
DB_NAME="railway"

echo "🚀 Memulai import database ke Railway..."
echo ""

# Export database dari local (jika ada)
if [ -f "database_backup.sql" ]; then
    echo "📦 Menggunakan file backup: database_backup.sql"
    SQL_FILE="database_backup.sql"
else
    echo "⚠️  File database_backup.sql tidak ditemukan"
    echo "💡 Membuat backup dari database lokal terlebih dahulu..."
    echo ""
    echo "Jalankan perintah berikut untuk export database lokal:"
    echo "  mysqldump -u root -p nama_database_lokal > database_backup.sql"
    echo ""
    read -p "Apakah Anda ingin melanjutkan dengan migrations? (y/n) " -n 1 -r
    echo
    if [[ ! $REPLY =~ ^[Yy]$ ]]; then
        exit 1
    fi
    
    # Gunakan Laravel migrations sebagai gantinya
    echo "📦 Menggunakan Laravel migrations..."
    echo ""
    echo "Jalankan perintah berikut untuk setup database:"
    echo "  php artisan migrate:fresh --seed"
    exit 0
fi

# Import ke Railway
echo "📤 Mengimport database ke Railway..."
mysql -h "$DB_HOST" -u "$DB_USER" -p"$DB_PASS" --port "$DB_PORT" --protocol=TCP "$DB_NAME" < "$SQL_FILE"

if [ $? -eq 0 ]; then
    echo "✅ Database berhasil diimport ke Railway!"
else
    echo "❌ Error saat import database"
    exit 1
fi

echo ""
echo "✅ Selesai! Database telah diimport ke Railway MySQL"
echo ""
echo "Selanjutnya, jalankan migrations Laravel:"
echo "  php artisan migrate"
echo "  php artisan db:seed"

