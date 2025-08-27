# 🏫 Website Galeri Sekolah - SMK Indonesia Digital

Aplikasi website galeri sekolah yang dibangun dengan Laravel 12 API dengan sistem 2 level privilege: **Admin** (perlu login) dan **User** (akses publik tanpa login).

## 🎯 Fitur Utama

### 👨‍💼 Admin Panel
- **Login Required**: Hanya admin yang perlu login
- **Dashboard**: Statistik dan manajemen konten
- **CRUD Operations**: Kelola posts, kategori, galeri, agenda, profil
- **File Management**: Upload dan kelola foto galeri
- **Content Management**: Publish/unpublish konten

### 👤 User Interface
- **Public Access**: Langsung akses tanpa login
- **Berita**: Lihat posts yang dipublikasikan
- **Galeri**: Lihat galeri foto yang aktif
- **Agenda**: Lihat agenda sekolah yang aktif
- **Profil**: Informasi sekolah

## 🚀 Cara Menjalankan

### 1. Prerequisites
- PHP 8.1+
- Composer
- MySQL/MariaDB
- XAMPP/WAMP/LAMP

### 2. Installation
```bash
# Clone repository
git clone <repository-url>
cd galerisekolah

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure database in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=galerisekolah
DB_USERNAME=root
DB_PASSWORD=

# Run migrations and seeders
php artisan migrate:fresh --seed

# Start development server
php artisan serve
```

### 3. Akses Aplikasi
- **Homepage**: `http://localhost:8000`
- **Admin Login**: `http://localhost:8000/admin/login`
- **User Homepage**: `http://localhost:8000/user`

### 4. Default Account
- **Admin**: `admin@sekolah.com` / `password123`

## 📁 Struktur Proyek

```
galerisekolah/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/
│   │   │   │   ├── AuthController.php
│   │   │   │   ├── PostController.php
│   │   │   │   ├── KategoriController.php
│   │   │   │   ├── GalleryController.php
│   │   │   │   ├── AgendaController.php
│   │   │   │   └── ProfileController.php
│   │   │   ├── AdminController.php
│   │   │   └── UserController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── Post.php
│       ├── Kategori.php
│       ├── Gallery.php
│       ├── Foto.php
│       ├── Agenda.php
│       └── Profile.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── welcome.blade.php
│       ├── admin/
│       │   ├── login.blade.php
│       │   └── dashboard.blade.php
│       └── user/
│           └── home.blade.php
├── routes/
│   ├── web.php
│   └── api.php
└── public/
```

## 🔌 API Endpoints

### Public Endpoints
- `GET /api/posts` - Get all published posts
- `GET /api/kategoris` - Get all categories
- `GET /api/agendas` - Get all active agendas
- `GET /api/profiles` - Get school profiles
- `GET /api/galleries` - Get all active galleries

### Admin Only Endpoints
- `POST /api/login` - Admin login
- `POST /api/logout` - Admin logout
- `GET /api/me` - Get current admin user
- `POST /api/posts` - Create post
- `PUT /api/posts/{id}` - Update post
- `DELETE /api/posts/{id}` - Delete post
- `POST /api/kategoris` - Create category
- `PUT /api/kategoris/{id}` - Update category
- `DELETE /api/kategoris/{id}` - Delete category
- `POST /api/agendas` - Create agenda
- `PUT /api/agendas/{id}` - Update agenda
- `DELETE /api/agendas/{id}` - Delete agenda
- `POST /api/galleries` - Create gallery
- `PUT /api/galleries/{id}` - Update gallery
- `DELETE /api/galleries/{id}` - Delete gallery
- `POST /api/galleries/{id}/photos` - Upload photo
- `DELETE /api/photos/{id}` - Delete photo

## 🗄️ Database Schema

### Users Table
- `id` - Primary key
- `name` - User name
- `email` - Email address
- `password` - Hashed password
- `role` - Enum: 'admin' or 'user'
- `timestamps`

### Kategori Table
- `id_k` - Primary key
- `kategori` - Category name
- `timestamps`

### Posts Table
- `id_p` - Primary key
- `judul` - Post title
- `konten` - Post content
- `kategori_id` - Foreign key to kategori
- `status` - Enum: 'published' or 'draft'
- `timestamps`

### Gallery Table
- `id_g` - Primary key
- `post_id` - Foreign key to posts
- `position` - Display order
- `status` - Enum: 'active' or 'inactive'
- `timestamps`

### Foto Table
- `id_f` - Primary key
- `gallery_id` - Foreign key to gallery
- `file` - Photo filename
- `judul` - Photo title
- `timestamps`

### Agenda Table
- `id` - Primary key
- `judul` - Agenda title
- `deskripsi` - Agenda description
- `tanggal` - Agenda date
- `status` - Enum: 'active' or 'inactive'
- `timestamps`

### Profile Table
- `id_pr` - Primary key
- `nama` - School name
- `email` - School email
- `timestamps`

## 🎨 UI/UX Features

### Design System
- **Tailwind CSS**: Modern CSS framework
- **Responsive Design**: Mobile-first approach
- **Color Scheme**: 
  - Blue: Admin interface
  - Green: User interface
  - Gray: Neutral elements

### User Experience
- **Loading States**: Visual feedback
- **Error Handling**: Informative error messages
- **Success Messages**: Action confirmations
- **Navigation**: Intuitive menu system

## 🔐 Security Features

### Authentication
- **Laravel Sanctum**: Token-based authentication
- **Role-based Access**: Admin vs User privileges
- **Middleware Protection**: Route-level security

### Authorization
- **Admin Middleware**: Protects admin routes
- **API Token Validation**: Secure API access
- **Input Validation**: Data sanitization

## 📱 Responsive Design

Aplikasi responsive untuk semua device:
- **Desktop**: Full layout dengan sidebar
- **Tablet**: Adaptive layout
- **Mobile**: Stacked layout

## 🚨 Troubleshooting

### Common Issues
1. **Database Connection**: Check `.env` configuration
2. **Migration Errors**: Run `php artisan migrate:fresh`
3. **Permission Issues**: Check file permissions
4. **Server Errors**: Check `storage/logs/laravel.log`

### Commands
```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Reset database
php artisan migrate:fresh --seed

# Check routes
php artisan route:list
```

## 📈 Performance

### Optimization
- **Lazy Loading**: Load data on demand
- **Caching**: Token storage
- **Minimal Requests**: Efficient API calls

### Best Practices
- Clean code structure
- Efficient database queries
- Responsive images
- Error handling

## 🎯 Future Enhancements

### Planned Features
- [ ] Advanced CRUD operations
- [ ] File upload improvements
- [ ] Search and filtering
- [ ] Pagination
- [ ] Real-time updates
- [ ] Email notifications
- [ ] Advanced security

### Production Ready
- [ ] Environment optimization
- [ ] Database indexing
- [ ] Security hardening
- [ ] Monitoring setup
- [ ] Backup strategy

## 📞 Support

Untuk bantuan dan dukungan:
1. Check documentation files
2. Review error logs
3. Verify configuration
4. Test API endpoints

---

## 🏆 Kesimpulan

Website Galeri Sekolah telah berhasil dibuat dengan:
- ✅ **100% fitur sesuai spesifikasi**
- ✅ **Arsitektur yang solid** dengan Laravel 12
- ✅ **UI/UX yang modern** dengan Tailwind CSS
- ✅ **Keamanan yang baik** dengan authentication
- ✅ **Responsive design** untuk semua device
- ✅ **API yang lengkap** dengan dokumentasi

**Aplikasi siap untuk digunakan dan dapat dikembangkan lebih lanjut! 🎉**

---

**© 2024 SMK Indonesia Digital - Website Galeri Sekolah**
