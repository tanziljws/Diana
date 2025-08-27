# Panduan Penggunaan - Website Galeri Sekolah

## 🎯 Ringkasan Aplikasi

Website Galeri Sekolah adalah aplikasi web yang dibangun dengan Laravel 12 API yang memiliki 2 level privilege:
- **Admin**: Dapat mengelola semua konten (posts, kategori, galeri, agenda, profil)
- **User/Guest**: Dapat melihat konten yang dipublikasikan

## 🚀 Cara Menggunakan Aplikasi

### 1. Akses Aplikasi
- Buka browser dan akses: `http://localhost:8000`
- Anda akan melihat halaman utama dengan tombol "Masuk ke Website" dan "Admin Login"

### 2. Login sebagai Admin
- Klik tombol **"Admin Login"** di header
- Masukkan credentials:
  - Email: `admin@sekolah.com`
  - Password: `password123`
- Setelah login berhasil, Anda akan diarahkan ke dashboard admin

### 3. Akses sebagai User
- Klik tombol **"Masuk ke Website"** di header
- Anda akan langsung diarahkan ke halaman user tanpa perlu login

## 👨‍💼 Fitur Admin Dashboard

### Dashboard Overview
- **Statistik**: Melihat jumlah posts, kategori, galeri, dan agenda
- **Navigasi**: Sidebar dengan menu untuk mengelola konten

### Manajemen Posts
- Melihat semua posts yang ada
- Posts ditampilkan dengan judul, konten, dan status
- Status: `published` (hijau) atau `draft` (kuning)

### Manajemen Categories
- Melihat semua kategori yang ada
- Kategori digunakan untuk mengelompokkan posts

### Manajemen Galleries
- Melihat semua galeri foto
- Setiap galeri terkait dengan post tertentu
- Status: `active` (hijau) atau `inactive` (merah)

### Manajemen Agendas
- Melihat semua agenda sekolah
- Ditampilkan dengan judul, deskripsi, dan tanggal
- Status: `active` (hijau) atau `inactive` (merah)

## 👤 Fitur User Homepage

### Berita Terbaru
- Melihat semua posts yang dipublikasikan
- Ditampilkan dalam format card dengan judul dan preview konten
- Menampilkan kategori dan status post

### Galeri Foto
- Melihat semua galeri yang aktif
- Menampilkan jumlah foto dalam galeri
- Status galeri ditampilkan

### Agenda Sekolah
- Melihat semua agenda yang aktif
- Ditampilkan dengan judul, deskripsi, dan tanggal
- Format tanggal dalam bahasa Indonesia

### Profil Sekolah
- Melihat informasi profil sekolah
- Menampilkan nama sekolah dan email

## 🔧 Testing API

### Menggunakan Interface Testing
1. Buka halaman utama (`http://localhost:8000`)
2. Scroll ke bagian "API Testing Section"
3. Klik tombol-tombol untuk test endpoint:
   - **Test Login**: Test autentikasi
   - **Get Posts**: Ambil data posts
   - **Get Categories**: Ambil data kategori
   - **Get Agendas**: Ambil data agenda

### Menggunakan cURL
```bash
# Test login admin
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "admin@sekolah.com",
    "password": "password123"
  }'

# Get posts
curl -X GET http://localhost:8000/api/posts

# Get categories
curl -X GET http://localhost:8000/api/kategoris
```

## 📱 Responsive Design

Aplikasi ini responsive dan dapat diakses dari:
- **Desktop**: Tampilan penuh dengan sidebar admin
- **Tablet**: Layout menyesuaikan ukuran layar
- **Mobile**: Menu collapse dan layout stack

## 🔐 Keamanan

### Authentication
- Menggunakan Laravel Sanctum untuk token-based authentication
- Token disimpan di localStorage browser
- Auto-redirect ke login jika token tidak valid

### Authorization
- Admin dapat mengakses semua fitur
- User hanya dapat melihat konten yang dipublikasikan
- Middleware admin untuk melindungi route admin

## 🎨 UI/UX Features

### Design System
- **Tailwind CSS**: Framework CSS untuk styling
- **Color Scheme**: 
  - Blue: Admin interface
  - Green: User interface
  - Gray: Neutral elements
- **Typography**: Clean dan readable fonts

### User Experience
- **Loading States**: Feedback saat memuat data
- **Error Handling**: Pesan error yang informatif
- **Success Messages**: Konfirmasi aksi berhasil
- **Navigation**: Menu yang intuitif

## 📊 Data Flow

### Admin Flow
1. Login → Dashboard → Pilih menu → Lihat data
2. Data diambil dari API dengan token admin
3. Tampilan real-time dengan JavaScript

### User Flow
1. Login → Homepage → Scroll sections → Lihat konten
2. Data diambil dari API dengan token user
3. Konten difilter berdasarkan status published/active

## 🔄 State Management

### Local Storage
- `admin_token`: Token untuk admin
- `admin_user`: Data user admin
- `user_token`: Token untuk user
- `user_data`: Data user regular

### Session Management
- Token otomatis expired setelah logout
- Auto-redirect jika token tidak valid
- Clear storage saat logout

## 🚨 Troubleshooting

### Login Issues
- Pastikan email dan password benar
- Check console browser untuk error
- Pastikan server Laravel berjalan

### Data Loading Issues
- Refresh halaman
- Check network tab di browser
- Pastikan API endpoint berfungsi

### Permission Issues
- Pastikan login dengan role yang benar
- Admin hanya bisa akses dashboard admin
- User hanya bisa akses homepage user

## 📈 Performance

### Optimization
- **Lazy Loading**: Data dimuat saat diperlukan
- **Caching**: Token disimpan di localStorage
- **Minimal Requests**: Data diambil sekali dan ditampilkan

### Best Practices
- Responsive images
- Efficient API calls
- Clean code structure

## 🎯 Next Steps

### Untuk Pengembangan Lanjutan
1. **CRUD Operations**: Tambah fitur create, edit, delete
2. **File Upload**: Implementasi upload foto galeri
3. **Search & Filter**: Tambah pencarian dan filter
4. **Pagination**: Untuk data yang banyak
5. **Real-time Updates**: WebSocket untuk update real-time

### Untuk Production
1. **Environment Variables**: Setup untuk production
2. **Database Optimization**: Index dan query optimization
3. **Security Hardening**: Rate limiting, CORS, etc.
4. **Monitoring**: Log dan error tracking
5. **Backup**: Database backup strategy

---

## 📞 Support

Jika mengalami masalah:
1. Check error log di `storage/logs/laravel.log`
2. Pastikan semua dependencies terinstall
3. Restart server Laravel
4. Clear cache: `php artisan cache:clear`

**Selamat menggunakan Website Galeri Sekolah! 🎉**
