@extends('layouts.admin')

@section('title', 'Create Post')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-oxford-navy to-oxford-navy-light px-6 py-4">
                <h1 class="text-2xl font-bold text-oxford-gold">Create New Post</h1>
            </div>
            
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-oxford-gold focus:border-transparent" 
                               required>
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select name="kategori_id" id="kategori_id" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-oxford-gold focus:border-transparent transition-all duration-200" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id_k }}">{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="konten" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                    <textarea name="konten" id="konten" rows="8" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                              required>{{ old('konten') }}</textarea>
                    @error('konten')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" id="status" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                required>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.posts.index') }}" 
                       class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="bg-oxford-navy hover:bg-oxford-navy-light text-oxford-gold font-semibold py-3 px-6 rounded-lg transition-colors duration-200">
                        Create Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
