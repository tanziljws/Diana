@extends('layouts.admin')

@section('title', 'Edit Gallery')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 py-8">
    <div class="container mx-auto px-4">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="max-w-5xl mx-auto mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-sm" role="alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-5xl mx-auto mb-6">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-sm" role="alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                </div>
            </div>
        @endif

        <!-- Page Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-oxford-navy rounded-full mb-4">
                <svg class="w-8 h-8 text-oxford-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-serif font-bold text-oxford-navy mb-2">Edit Gallery</h1>
            <p class="text-oxford-gold font-medium">Update gallery details and photos</p>
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
                            <h2 class="text-xl font-serif font-bold text-white">Edit Gallery</h2>
                            <p class="text-oxford-gold text-sm">Update your photo gallery details</p>
                        </div>
                    </div>
                </div>
                
                <form id="gallery-update-form" action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-8">
                    @csrf
                    @method('PUT')
                    
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
                                   value="{{ old('judul', $gallery->judul) }}"
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
                                      placeholder="Brief description of this gallery...">{{ old('deskripsi', $gallery->deskripsi) }}</textarea>
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
                                        <option value="{{ $kategori->id_k }}" {{ $gallery->kategori_id == $kategori->id_k ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
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
                                        <option value="{{ $post->id_p }}" {{ $gallery->post_id == $post->id_p ? 'selected' : '' }}>{{ $post->judul }}</option>
                                    @endforeach
                                </select>
                                <p class="text-xs text-gray-500 mt-1">Link to a news post (optional)</p>
                            </div>
                            
                            <div class="space-y-2">
                                <label for="position" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path>
                                    </svg>
                                    Display Position *
                                </label>
                                <input type="number" name="position" id="position" 
                                       value="{{ $gallery->position }}"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium"
                                       placeholder="e.g., 1, 2, 3..." min="1" required>
                                <p class="text-xs text-gray-500 mt-1">Order in which this gallery appears (lower numbers appear first)</p>
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
                                    <option value="active" {{ $gallery->status == 'active' ? 'selected' : '' }}>✅ Active - Visible to public</option>
                                    <option value="inactive" {{ $gallery->status == 'inactive' ? 'selected' : '' }}>❌ Inactive - Hidden from public</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Current Photos Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-serif font-semibold text-oxford-navy mb-4 flex items-center">
                            <div class="w-6 h-6 bg-oxford-gold rounded-full flex items-center justify-center mr-2">
                                <span class="text-xs font-bold text-oxford-navy">2</span>
                            </div>
                            Current Photos
                        </h3>
                        
                        @if($gallery->fotos->count() > 0)
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                @foreach($gallery->fotos as $foto)
                                    <div class="relative group">
                                        <img src="{{ asset($foto->file ?? $foto->path_foto) }}" alt="Gallery Photo" class="w-full h-32 object-cover rounded-lg">
                                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                            <button onclick="deletePhoto({{ $foto->id_f }})" 
                                                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No photos</h3>
                                <p class="mt-1 text-sm text-gray-500">Upload some photos to this gallery</p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Add More Photos Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-serif font-semibold text-oxford-navy mb-4 flex items-center">
                            <div class="w-6 h-6 bg-oxford-gold rounded-full flex items-center justify-center mr-2">
                                <span class="text-xs font-bold text-oxford-navy">3</span>
                            </div>
                            Add More Photos
                        </h3>
                        
                        <div class="mt-4">
                            <div class="flex items-center justify-center w-full">
                                <label for="photos" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF (MAX. 2MB per image)</p>
                                    </div>
                                    <input id="photos" name="photos[]" type="file" class="hidden" multiple accept="image/*" onchange="handleFileSelect(this)">
                                </label>
                            </div>
                            <div id="file-list" class="mt-4 grid grid-cols-1 gap-2">
                                <!-- File previews will be added here -->
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.galleries.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Cancel
                        </a>
                        <button type="button" onclick="submitForm()" 
                                class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-oxford-navy to-oxford-navy-light hover:from-oxford-navy-light hover:to-oxford-navy text-oxford-gold font-semibold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Update Gallery
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function submitForm() {
    const form = document.getElementById('gallery-update-form');
    const judul = document.getElementById('judul').value;
    const kategoriId = document.getElementById('kategori_id').value;
    const position = document.getElementById('position').value;
    const status = document.getElementById('status').value;
    
    console.log('Submit form called');
    console.log('Form action:', form.action);
    console.log('Form method:', form.method);
    console.log('Judul:', judul, 'Kategori:', kategoriId, 'Position:', position, 'Status:', status);
    
    // Basic validation
    if (!judul) {
        alert('Masukkan judul gallery');
        return false;
    }
    if (!kategoriId) {
        alert('Pilih kategori gallery');
        return false;
    }
    if (!position) {
        alert('Masukkan posisi gallery');
        return false;
    }
    if (!status) {
        alert('Pilih status gallery');
        return false;
    }
    
    // Submit the specific update form
    console.log('Submitting gallery update form...');
    form.submit();
    return true;
}

function deletePhoto(photoId) {
    if (confirm('Apakah Anda yakin ingin menghapus foto ini?')) {
        console.log('Deleting photo ID:', photoId);
        
        // Get CSRF token from the main form
        const mainForm = document.getElementById('gallery-update-form');
        const csrfToken = mainForm.querySelector('input[name="_token"]');
        
        if (!csrfToken) {
            alert('CSRF token tidak ditemukan');
            return;
        }
        
        // Create a separate form to delete the photo
        const deleteForm = document.createElement('form');
        deleteForm.method = 'POST';
        deleteForm.action = `/admin/galleries/photo/${photoId}`;
        deleteForm.style.display = 'none';
        deleteForm.id = 'delete-photo-form-' + photoId;
        
        // Add CSRF token
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = csrfToken.value;
        deleteForm.appendChild(csrfInput);
        
        // Add method override for DELETE
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        deleteForm.appendChild(methodInput);
        
        console.log('Delete form created:', deleteForm);
        console.log('Delete form action:', deleteForm.action);
        
        // Submit the delete form
        document.body.appendChild(deleteForm);
        deleteForm.submit();
    }
}

function handleFileSelect(input) {
    const fileList = document.getElementById('file-list');
    fileList.innerHTML = '';
    
    if (input.files && input.files.length > 0) {
        console.log('Files selected:', input.files.length);
        
        Array.from(input.files).forEach((file, index) => {
            console.log('Processing file:', file.name);
            
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.createElement('div');
                preview.className = 'flex items-center justify-between p-3 bg-white rounded-lg border border-gray-200 mb-2';
                preview.innerHTML = `
                    <div class="flex items-center space-x-3">
                        <img src="${e.target.result}" alt="Preview" class="w-12 h-12 object-cover rounded">
                        <div>
                            <span class="text-sm font-medium text-gray-700 block">${file.name}</span>
                            <span class="text-xs text-gray-500">${(file.size / 1024).toFixed(1)} KB</span>
                        </div>
                    </div>
                    <span class="text-xs text-green-600 font-medium">Ready to upload</span>
                `;
                fileList.appendChild(preview);
            };
            reader.readAsDataURL(file);
        });
        
        // Show success message
        const successMsg = document.createElement('div');
        successMsg.className = 'bg-green-50 border border-green-200 text-green-700 px-4 py-2 rounded-lg mt-2';
        successMsg.innerHTML = `<strong>${input.files.length}</strong> foto siap untuk diupload. Klik "Update Gallery" untuk menyimpan.`;
        fileList.appendChild(successMsg);
    }
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('photos');
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            handleFileSelect(this);
        });
    }
    
    // Test button functionality
    console.log('Page loaded, testing elements...');
    console.log('File input:', document.getElementById('photos'));
    console.log('Form:', document.querySelector('form'));
    console.log('Submit button found');
});
</script>
@endsection
