@extends('layouts.admin')

@section('title', 'Create Gallery')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-oxford-navy rounded-full mb-4">
                <svg class="w-8 h-8 text-oxford-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-serif font-bold text-oxford-navy mb-2">Create New Gallery</h1>
            <p class="text-oxford-gold font-medium">Showcase memorable moments and events</p>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-oxford-navy via-oxford-navy-light to-oxford-navy px-8 py-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-oxford-gold rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-serif font-bold text-white">Gallery Setup</h2>
                            <p class="text-oxford-gold text-sm">Configure your photo gallery details</p>
                        </div>
                    </div>
                </div>
                
                <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                    @csrf
                    
                    <!-- Gallery Configuration Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-serif font-semibold text-oxford-navy mb-4 flex items-center">
                            <div class="w-6 h-6 bg-oxford-gold rounded-full flex items-center justify-center mr-2">
                                <span class="text-xs font-bold text-oxford-navy">1</span>
                            </div>
                            Gallery Information
                        </h3>
                        
                        <!-- Judul Gallery -->
                        <div class="mb-6">
                            <label for="judul" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Gallery Title *
                            </label>
                            <input type="text" name="judul" id="judul" 
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium"
                                   placeholder="e.g., School Anniversary 2025" required>
                            <p class="text-xs text-gray-500 mt-1">This title will appear on gallery cards and modal</p>
                        </div>
                        
                        <!-- Deskripsi Gallery -->
                        <div class="mb-6">
                            <label for="deskripsi" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"></path>
                                </svg>
                                Gallery Description
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="3"
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium"
                                      placeholder="Brief description of this gallery..."></textarea>
                            <p class="text-xs text-gray-500 mt-1">This description will appear on gallery cards in home page</p>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Category -->
                            <div class="space-y-2">
                                <label for="kategori_id" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                    </svg>
                                    Category *
                                </label>
                                <select name="kategori_id" id="kategori_id" 
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium" required>
                                    <option value="" class="text-gray-500">Select category</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id_k }}">{{ $kategori->kategori }}</option>
                                    @endforeach
                                </select>
                                <p class="text-xs text-gray-500 mt-1">Choose gallery category</p>
                            </div>
                            
                            <!-- Related Post -->
                            <div class="space-y-2">
                                <label for="post_id" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Related Post (Optional)
                                </label>
                                <select name="post_id" id="post_id" 
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium">
                                    <option value="" class="text-gray-500">No related post</option>
                                    @foreach($posts as $post)
                                        <option value="{{ $post->id_p }}">{{ $post->judul }}</option>
                                    @endforeach
                                </select>
                                <p class="text-xs text-gray-500 mt-1">Link to a news post (optional)</p>
                            </div>
                            
                            <!-- Position -->
                            <div class="space-y-2">
                                <label for="position" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path>
                                    </svg>
                                    Display Position *
                                </label>
                                <input type="number" name="position" id="position" 
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium"
                                       placeholder="e.g., 1, 2, 3..." min="1" required>
                                <p class="text-xs text-gray-500 mt-1">Display order</p>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <div class="space-y-2">
                                <label for="status" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                                    </svg>
                                    Gallery Status *
                                </label>
                                <select name="status" id="status" 
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium" required>
                                    <option value="active">✅ Active - Visible to public</option>
                                    <option value="inactive">❌ Inactive - Hidden from public</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Photo Upload Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-serif font-semibold text-oxford-navy mb-4 flex items-center">
                            <div class="w-6 h-6 bg-oxford-gold rounded-full flex items-center justify-center mr-2">
                                <span class="text-xs font-bold text-oxford-navy">2</span>
                            </div>
                            Photo Upload
                        </h3>
                        
                        <div class="space-y-4">
                            <label for="photos" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                                </svg>
                                Gallery Photos *
                            </label>
                            
                            <!-- Custom File Upload Area -->
                            <div class="relative">
                                <div class="border-2 border-dashed border-oxford-gold/30 rounded-xl p-8 text-center bg-oxford-gold/5 hover:bg-oxford-gold/10 transition-colors duration-300">
                                    <div class="flex flex-col items-center space-y-4">
                                        <div class="w-16 h-16 bg-oxford-gold/20 rounded-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-oxford-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-semibold text-oxford-navy mb-2">Upload Gallery Photos</h4>
                                            <p class="text-gray-600 mb-4">Select multiple high-quality images for your gallery</p>
                                            <div class="text-sm text-gray-500 space-y-1">
                                                <p>• Supported formats: JPG, PNG, GIF</p>
                                                <p>• Recommended size: 1920x1080px or higher</p>
                                                <p>• Maximum file size: 5MB per image</p>
                                            </div>
                                        </div>
                                        <input type="file" name="photos[]" id="photos" multiple accept="image/*"
                                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                        <button type="button" class="inline-flex items-center px-6 py-3 bg-oxford-gold text-oxford-navy font-semibold rounded-xl hover:bg-opacity-90 transition-all duration-300 pointer-events-none">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Choose Photos
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- File Preview Area -->
                            <div id="file-preview" class="hidden">
                                <h4 class="text-sm font-semibold text-oxford-navy mb-2">Selected Files:</h4>
                                <div id="file-list" class="space-y-2"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.galleries.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Manage Galleries
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-oxford-navy to-oxford-navy-light hover:from-oxford-navy-light hover:to-oxford-navy text-oxford-gold font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Create Gallery
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('photos').addEventListener('change', function(e) {
    const files = e.target.files;
    const preview = document.getElementById('file-preview');
    const fileList = document.getElementById('file-list');
    
    if (files.length > 0) {
        preview.classList.remove('hidden');
        fileList.innerHTML = '';
        
        Array.from(files).forEach((file, index) => {
            const fileItem = document.createElement('div');
            fileItem.className = 'flex items-center justify-between bg-white p-3 rounded-lg border border-gray-200';
            fileItem.innerHTML = `
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-oxford-gold/20 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-oxford-navy">${file.name}</p>
                        <p class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                    </div>
                </div>
                <div class="text-xs text-oxford-gold font-medium">Ready to upload</div>
            `;
            fileList.appendChild(fileItem);
        });
    } else {
        preview.classList.add('hidden');
    }
});
</script>
@endsection
