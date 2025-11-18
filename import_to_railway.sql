-- Perintah untuk import database ke Railway MySQL
-- Jalankan perintah berikut di terminal:

-- Opsi 1: Jika sudah ada file SQL backup
-- mysql -h trolley.proxy.rlwy.net -u root -pAoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt --port 46489 --protocol=TCP railway < database_backup.sql

-- Opsi 2: Menggunakan Laravel migrations (RECOMMENDED)
-- php artisan migrate:fresh --seed

-- Opsi 3: Import langsung dengan command
-- mysql -h trolley.proxy.rlwy.net -u root -pAoqAPxtaLXnhtJqOjrHMXJZmHRnUajgt --port 46489 --protocol=TCP railway < import_to_railway.sql

