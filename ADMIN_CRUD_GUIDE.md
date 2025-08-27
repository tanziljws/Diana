# Admin CRUD Operations Guide

## Overview
The admin dashboard provides complete CRUD (Create, Read, Update, Delete) functionality for managing school content. The system uses existing database tables in phpMyAdmin - no migrations needed. Here's how to use each section:

## 1. Posts Management

### Create New Post
1. Go to "Posts" section in admin dashboard
2. Click "Add New Post" button
3. Fill in the form:
   - **Title**: "Kegiatan Ekstrakurikuler Baru"
   - **Content**: "Sekolah membuka kegiatan ekstrakurikuler robotika untuk siswa kelas 10-12"
   - **Category**: Select from dropdown (e.g., "Kegiatan Akademik")
4. Click "Save Post"

### Edit Post
1. Find the post in the list
2. Click "Edit" button
3. Modify the fields as needed
4. Click "Update Post"

### Delete Post
1. Find the post in the list
2. Click "Delete" button
3. Confirm deletion

## 2. Categories Management

### Create New Category
1. Go to "Categories" section
2. Click "Add New Category"
3. Fill in:
   - **Nama Kategori**: "Prestasi Siswa"
   - **Deskripsi**: "Kategori untuk berita prestasi dan penghargaan siswa"
4. Click "Save Category"

### Example Categories to Add:
- **Kegiatan Sekolah** - "Berbagai kegiatan dan acara sekolah"
- **Pengumuman** - "Pengumuman penting untuk siswa dan orang tua"
- **Prestasi** - "Prestasi akademik dan non-akademik siswa"

## 3. Galleries Management

### Create New Gallery
1. Go to "Galleries" section
2. Click "Add New Gallery"
3. Fill in:
   - **Judul**: "Pameran Seni 2024"
   - **Deskripsi**: "Pameran karya seni siswa kelas 11 dan 12"
   - **Tanggal**: "2024-04-20"
4. Click "Save Gallery"

### Example Galleries to Add:
- **Upacara Bendera** - "Upacara bendera setiap hari Senin"
- **Kelas Laboratorium** - "Kegiatan praktikum di laboratorium sains"
- **Pertandingan Basket** - "Pertandingan basket antar kelas"

## 4. Agenda Management

### Create New Agenda
1. Go to "Agenda" section
2. Click "Add New Agenda"
3. Fill in:
   - **Judul**: "Rapat Komite Sekolah"
   - **Deskripsi**: "Rapat bulanan komite sekolah dengan orang tua"
   - **Tanggal**: "2024-04-25"
   - **Waktu**: "19:00"
   - **Tempat**: "Ruang Serbaguna"
4. Click "Save Agenda"

### Example Agenda Items to Add:
- **Ujian Tengah Semester** - "Ujian tengah semester genap" - "2024-05-15" - "08:00" - "Ruang Kelas"
- **Lomba Pidato** - "Lomba pidato bahasa Indonesia tingkat sekolah" - "2024-05-10" - "13:00" - "Aula"
- **Kunjungan Industri** - "Kunjungan ke pabrik untuk kelas 12 IPA" - "2024-05-20" - "07:00" - "Bus Sekolah"

## 5. Testing the CRUD Operations

### Step-by-Step Testing:

1. **Login to Admin Dashboard**
   - Go to `/admin/dashboard`
   - Dashboard loads with sample data

2. **Test Posts CRUD**
   - Create: Add a new post about school activities
   - Read: View the post in the list
   - Update: Edit the post content
   - Delete: Remove a test post

3. **Test Categories CRUD**
   - Create: Add "Ekstrakurikuler" category
   - Update: Change description of existing category
   - Delete: Remove unused category

4. **Test Galleries CRUD**
   - Create: Add "Kegiatan Olahraga" gallery
   - Update: Change gallery description
   - Delete: Remove old gallery

5. **Test Agenda CRUD**
   - Create: Add "Pertemuan Guru" agenda
   - Update: Change meeting time
   - Delete: Remove past events

## 6. API Endpoints

The admin dashboard connects to these API endpoints:

- **GET /api/posts** - Fetch all posts
- **POST /api/posts** - Create new post
- **PUT /api/posts/{id}** - Update post
- **DELETE /api/posts/{id}** - Delete post

Similar patterns for `/api/kategoris`, `/api/galleries`, and `/api/agendas`.

## 7. Sample Data Available

The system comes with sample data:
- 2 sample posts
- 3 sample categories  
- 2 sample galleries
- 2 sample agenda items

You can modify or delete these and add your own content.

## Database Tables Structure

The system uses these existing phpMyAdmin tables:

### Table: `posts`
- `id` (Primary Key)
- `judul` (VARCHAR) - Title in Indonesian
- `isi` (TEXT) - Content in Indonesian  
- `kategori_id` (Foreign Key to kategori.id)
- `gambar` (VARCHAR, optional) - Image in Indonesian
- `created_at`, `updated_at` (TIMESTAMP)

### Table: `kategori`
- `id` (Primary Key)
- `nama_kategori` (VARCHAR)
- `deskripsi` (TEXT, optional)
- `created_at`, `updated_at` (TIMESTAMP)

### Table: `gallery`
- `id` (Primary Key)
- `judul` (VARCHAR)
- `deskripsi` (TEXT, optional)
- `tanggal` (DATE)
- `cover_image` (VARCHAR, optional)
- `created_at`, `updated_at` (TIMESTAMP)

### Table: `agenda`
- `id` (Primary Key)
- `judul` (VARCHAR)
- `deskripsi` (TEXT, optional)
- `tanggal` (DATE)
- `waktu` (TIME)
- `tempat` (VARCHAR)
- `created_at`, `updated_at` (TIMESTAMP)

## Database Configuration

Make sure your `.env` file has these settings:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=galerisekolah
DB_USERNAME=root
DB_PASSWORD=
```

## Notes
- All CRUD operations connect directly to phpMyAdmin database
- Data persists in the actual database tables
- Forms include validation for required fields
- The interface is responsive and works on mobile devices
- No Laravel migrations needed - uses existing table structure
