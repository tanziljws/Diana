# API Testing Guide - Website Galeri Sekolah

## 🚀 Quick Start

### 1. Login sebagai Admin
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "admin@sekolah.com",
    "password": "password123"
  }'
```

### 2. Simpan Token
Setelah login berhasil, simpan token dari response untuk digunakan di request berikutnya.

### 3. Test Endpoint dengan Token
```bash
curl -X GET http://localhost:8000/api/me \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

## 📋 Contoh Request Lengkap

### Authentication

#### Register User Baru
```bash
curl -X POST http://localhost:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }'
```

#### Login
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "admin@sekolah.com",
    "password": "password123"
  }'
```

### Posts Management (Admin Only)

#### Get All Posts (Public)
```bash
curl -X GET http://localhost:8000/api/posts
```

#### Create Post (Admin)
```bash
curl -X POST http://localhost:8000/api/posts \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -H "Content-Type: application/json" \
  -d '{
    "judul": "Berita Terbaru",
    "konten": "Ini adalah konten berita terbaru...",
    "kategori_id": 1,
    "status": "published"
  }'
```

#### Update Post (Admin)
```bash
curl -X PUT http://localhost:8000/api/posts/1 \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -H "Content-Type: application/json" \
  -d '{
    "judul": "Judul Updated",
    "konten": "Konten yang diupdate..."
  }'
```

#### Delete Post (Admin)
```bash
curl -X DELETE http://localhost:8000/api/posts/1 \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

### Categories Management (Admin Only)

#### Get All Categories (Public)
```bash
curl -X GET http://localhost:8000/api/kategoris
```

#### Create Category (Admin)
```bash
curl -X POST http://localhost:8000/api/kategoris \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -H "Content-Type: application/json" \
  -d '{
    "kategori": "Kategori Baru"
  }'
```

### Agenda Management (Admin Only)

#### Get All Agendas (Public)
```bash
curl -X GET http://localhost:8000/api/agendas
```

#### Create Agenda (Admin)
```bash
curl -X POST http://localhost:8000/api/agendas \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -H "Content-Type: application/json" \
  -d '{
    "judul": "Rapat Guru",
    "deskripsi": "Rapat bulanan guru",
    "tanggal": "2024-12-25",
    "status": "active"
  }'
```

### Gallery Management (Admin Only)

#### Get All Galleries (Public)
```bash
curl -X GET http://localhost:8000/api/galleries
```

#### Create Gallery (Admin)
```bash
curl -X POST http://localhost:8000/api/galleries \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -H "Content-Type: application/json" \
  -d '{
    "post_id": 1,
    "position": 1,
    "status": "active"
  }'
```

#### Upload Photo (Admin)
```bash
curl -X POST http://localhost:8000/api/galleries/1/photos \
  -H "Authorization: Bearer YOUR_TOKEN_HERE" \
  -F "file=@/path/to/photo.jpg" \
  -F "judul=Judul Foto"
```

## 🔧 Testing dengan Postman

### 1. Import Collection
Buat collection baru di Postman dan import endpoint berikut:

### 2. Environment Variables
Set environment variables:
- `base_url`: `http://localhost:8000/api`
- `token`: (akan diisi setelah login)

### 3. Login Flow
1. Set request method ke `POST`
2. URL: `{{base_url}}/login`
3. Body (raw JSON):
```json
{
    "email": "admin@sekolah.com",
    "password": "password123"
}
```
4. Set environment variable `token` dari response

### 4. Use Token
Untuk request yang memerlukan authentication:
- Header: `Authorization: Bearer {{token}}`

## 🧪 Testing dengan JavaScript

### Setup Axios
```javascript
import axios from 'axios';

// Set base URL
axios.defaults.baseURL = 'http://localhost:8000/api';

// Add token to requests
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
```

### Login Example
```javascript
async function login() {
    try {
        const response = await axios.post('/login', {
            email: 'admin@sekolah.com',
            password: 'password123'
        });
        
        const token = response.data.data.token;
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
        
        console.log('Login successful:', response.data);
    } catch (error) {
        console.error('Login failed:', error.response.data);
    }
}
```

### Get Posts Example
```javascript
async function getPosts() {
    try {
        const response = await axios.get('/posts');
        console.log('Posts:', response.data);
    } catch (error) {
        console.error('Failed to get posts:', error.response.data);
    }
}
```

## 📊 Response Format

### Success Response
```json
{
    "success": true,
    "message": "Operation successful",
    "data": {
        // Response data here
    }
}
```

### Error Response
```json
{
    "success": false,
    "message": "Error message",
    "errors": {
        // Validation errors if any
    }
}
```

## 🔍 Common Status Codes

- `200` - Success
- `201` - Created
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `422` - Validation Error
- `500` - Server Error

## 🚨 Troubleshooting

### 1. CORS Issues
Jika ada masalah CORS, pastikan:
- Server Laravel berjalan di `http://localhost:8000`
- Request dari domain yang diizinkan

### 2. Token Expired
Jika token expired:
- Login ulang untuk mendapatkan token baru
- Update Authorization header

### 3. Validation Errors
Jika ada validation error:
- Periksa format data yang dikirim
- Pastikan semua field required terisi
- Periksa tipe data yang benar

## 📱 Mobile App Integration

### React Native Example
```javascript
import axios from 'axios';

const api = axios.create({
    baseURL: 'http://localhost:8000/api',
    timeout: 10000,
});

// Add token interceptor
api.interceptors.request.use((config) => {
    const token = AsyncStorage.getItem('token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

// Login function
const login = async (email, password) => {
    try {
        const response = await api.post('/login', { email, password });
        await AsyncStorage.setItem('token', response.data.data.token);
        return response.data;
    } catch (error) {
        throw error.response.data;
    }
};
```

## 🎯 Testing Checklist

- [ ] Register user baru
- [ ] Login dengan credentials yang benar
- [ ] Login dengan credentials yang salah
- [ ] Get posts (public)
- [ ] Create post (admin only)
- [ ] Update post (admin only)
- [ ] Delete post (admin only)
- [ ] Get categories (public)
- [ ] Create category (admin only)
- [ ] Get agendas (public)
- [ ] Create agenda (admin only)
- [ ] Upload photo (admin only)
- [ ] Test unauthorized access
- [ ] Test invalid data validation

---

**Happy Testing! 🚀**





