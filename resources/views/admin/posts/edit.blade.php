@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-oxford-navy rounded-full mb-4">
                <svg class="w-8 h-8 text-oxford-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-serif font-bold text-oxford-navy mb-2">Edit Post</h1>
            <p class="text-oxford-gold font-medium">Update your post information</p>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-oxford-navy via-oxford-navy-light to-oxford-navy px-8 py-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-oxford-gold rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-serif font-bold text-white">Edit Post Information</h2>
                            <p class="text-oxford-gold text-sm">Update the details below to modify your post</p>
                        </div>
                    </div>
                </div>
                
                <form action="{{ route('admin.posts.update', $post->id_p) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                    @csrf
                    @method('PUT')
                    
                    <!-- Basic Information Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-serif font-semibold text-oxford-navy mb-4 flex items-center">
                            <div class="w-6 h-6 bg-oxford-gold rounded-full flex items-center justify-center mr-2">
                                <span class="text-xs font-bold text-oxford-navy">1</span>
                            </div>
                            Basic Information
                        </h3>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="judul" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z"></path>
                                    </svg>
                                    Post Title *
                                </label>
                                <input type="text" name="judul" id="judul" value="{{ old('judul', $post->judul) }}" 
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium" 
                                       placeholder="Enter an engaging title for your post"
                                       required>
                                @error('judul')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <div class="space-y-2">
                                <label for="kategori_id" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                    </svg>
                                    Category *
                                </label>
                                <select name="kategori_id" id="kategori_id" 
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium text-gray-900" required>
                                    <option value="" class="text-gray-500">Select a category</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id_k }}" class="text-gray-900" {{ old('kategori_id', $post->kategori_id) == $kategori->id_k ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-serif font-semibold text-oxford-navy mb-4 flex items-center">
                            <div class="w-6 h-6 bg-oxford-gold rounded-full flex items-center justify-center mr-2">
                                <span class="text-xs font-bold text-oxford-navy">2</span>
                            </div>
                            Content & Description
                        </h3>
                        
                        <div class="space-y-2">
                            <label for="konten" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path>
                                </svg>
                                Post Content *
                            </label>
                            <textarea name="konten" id="konten" rows="10" 
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium resize-none" 
                                      placeholder="Write your post content here. Be descriptive and engaging..."
                                      required>{{ old('konten', $post->konten) }}</textarea>
                            @error('konten')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Media & Settings Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-serif font-semibold text-oxford-navy mb-4 flex items-center">
                            <div class="w-6 h-6 bg-oxford-gold rounded-full flex items-center justify-center mr-2">
                                <span class="text-xs font-bold text-oxford-navy">3</span>
                            </div>
                            Media & Settings
                        </h3>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="image" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                                    </svg>
                                    Featured Image
                                </label>
                                
                                @if($post->image)
                                    <div class="mb-4">
                                        <p class="text-sm text-gray-600 mb-2">Current image:</p>
                                        <img src="{{ asset($post->image) }}" alt="Current post image" class="w-32 h-20 object-cover rounded-lg border border-gray-200">
                                    </div>
                                @endif
                                
                                <div class="relative">
                                    <input type="file" name="image" id="image" accept="image/*"
                                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-oxford-gold file:text-oxford-navy file:font-semibold hover:file:bg-opacity-90">
                                    <p class="mt-2 text-xs text-gray-500">Upload a new image to replace the current one (JPG, PNG, GIF). Recommended size: 1200x600px</p>
                                </div>
                                @error('image')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <div class="space-y-2">
                                <label for="status" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                                    </svg>
                                    Publication Status *
                                </label>
                                <select name="status" id="status" 
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium text-gray-900" 
                                        required>
                                    <option value="draft" class="text-gray-900" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>📝 Draft - Save for later</option>
                                    <option value="published" class="text-gray-900" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>🚀 Published - Make it live</option>
                                </select>
                                @error('status')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.posts.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Cancel
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-oxford-navy to-oxford-navy-light hover:from-oxford-navy-light hover:to-oxford-navy text-oxford-gold font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Update Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
