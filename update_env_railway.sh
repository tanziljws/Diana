#!/bin/bash

# Script untuk update .env dengan kredensial Railway database

ENV_FILE=".env"

# Backup .env jika sudah ada
if [ -f "$ENV_FILE" ]; then
    cp "$ENV_FILE" "$ENV_FILE.backup"
    echo "✅ Backup .env dibuat: $ENV_FILE.backup"
fi

# Update database configuration untuk Railway
sed -i.bak 's/^DB_CONNECTION=.*/DB_CONNECTION=mysql/' "$ENV_FILE" 2>/dev/null || echo "DB_CONNECTION=mysql" >> "$ENV_FILE"
sed -i.bak 's/^DB_HOST=.*/DB_HOST=trolley.proxy.rlwy.net/' "$ENV_FILE" 2>/dev/null || echo "DB_HOST=trolley.proxy.rlwy.net" >> "$ENV_FILE"
sed -i.bak 's/^DB_PORT=.*/DB_PORT=46489/' "$ENV_FILE" 2>/dev/null || echo "DB_PORT=46489" >> "$ENV_FILE"
sed -i.bak 's/^DB_DATABASE=.*/DB_DATABASE=railway/' "$ENV_FILE" 2>/dev/null || echo "DB_DATABASE=railway" >> "$ENV_FILE"
sed -i.bak 's/^DB_USERNAME=.*/DB_USERNAME=root/' "$ENV_FILE" 2>/dev/null || echo "DB_USERNAME=root" >> "$ENV_FILE"
sed -i.bak 's/^DB_PASSWORD=.*/DB_PASSWORD=AoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt/' "$ENV_FILE" 2>/dev/null || echo "DB_PASSWORD=AoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt" >> "$ENV_FILE"

# Clean up backup files
rm -f "$ENV_FILE.bak"

echo "✅ .env file telah diupdate dengan kredensial Railway database"
echo ""
echo "Konfigurasi database:"
echo "  DB_CONNECTION=mysql"
echo "  DB_HOST=trolley.proxy.rlwy.net"
echo "  DB_PORT=46489"
echo "  DB_DATABASE=railway"
echo "  DB_USERNAME=root"
echo "  DB_PASSWORD=AoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt"

