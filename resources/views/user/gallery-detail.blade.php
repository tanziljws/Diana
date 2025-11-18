<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $gallery->nama_gallery }} - Oxford High School</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script>
        // Global variables for zoom and pan
        let currentScale = 1;
        let isDragging = false;
        let startPos = { x: 0, y: 0 };
        let translate = { x: 0, y: 0 };
        let startTranslate = { x: 0, y: 0 };
        let currentImageIndex = 0;
        let galleryImages = [];
        let touchStartX = 0;
        let touchEndX = 0;
        
        // Simple image click handler
        function handleImageClick(src, title, description, index = 0) {
            console.log('Image clicked:', src);
            
            // Initialize gallery images if not already done
            if (galleryImages.length === 0) {
                initGalleryImages();
            }
            
            // Find the current image index
            currentImageIndex = galleryImages.findIndex(img => img.src === src);
            if (currentImageIndex === -1) currentImageIndex = 0;
            
            // Show loading
            const modal = document.getElementById('imageModal');
            const img = document.getElementById('modalImage');
            const spinner = document.getElementById('loadingSpinner');
            
            // Reset zoom and position
            currentScale = 1;
            translate = { x: 0, y: 0 };
            
            // Set content
            document.getElementById('modalTitle').textContent = title || 'Galeri Foto';
            document.getElementById('modalDescription').textContent = description || '';
            
            // Show modal and loading
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            img.style.display = 'none';
            spinner.style.display = 'flex';
            
            // Load image
            const tempImg = new Image();
            tempImg.onload = function() {
                img.src = src;
                img.alt = title || 'Galeri Foto';
                img.style.display = 'block';
                spinner.style.display = 'none';
                
                // Center the image
                centerImage();
                
                // Update navigation buttons
                updateNavButtons();
            };
            tempImg.onerror = function() {
                console.error('Failed to load image:', src);
                img.src = '{{ asset('img/placeholder.jpg') }}';
                img.alt = 'Gambar tidak dapat dimuat';
                img.style.display = 'block';
                spinner.style.display = 'none';
            };
            tempImg.src = src;
        }
        
        // Close modal function
        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            // Reset scale and position for next time
            currentScale = 1;
            translate = { x: 0, y: 0 };
        }
        
        // Center image in modal
        function centerImage(resetPosition = true) {
            const img = document.getElementById('modalImage');
            const container = document.getElementById('imageContainer');
            if (!img || !container) return;
            
            const containerRect = container.getBoundingClientRect();
            const imgRect = img.getBoundingClientRect();
            
            // Calculate scale to fit container
            const scale = Math.min(
                containerRect.width / img.naturalWidth,
                containerRect.height / img.naturalHeight,
                1 // Don't scale up beyond original size
            );
            
            currentScale = scale;
            if (resetPosition) {
                translate = { x: 0, y: 0 };
            }
            
            applyTransform();
        }
        
        // Apply transform to the image
        function applyTransform() {
            const img = document.getElementById('modalImage');
            if (!img) return;
            
            img.style.transform = `translate(${translate.x}px, ${translate.y}px) scale(${currentScale})`;
        }
        
        // Zoom function
        function zoom(delta, clientX, clientY) {
            const img = document.getElementById('modalImage');
            if (!img) return;
            
            const rect = img.getBoundingClientRect();
            const offsetX = clientX - rect.left;
            const offsetY = clientY - rect.top;
            
            // Calculate new scale
            const newScale = Math.max(0.5, Math.min(3, currentScale * delta));
            
            // Calculate new position to zoom towards cursor
            const ratio = 1 - newScale / currentScale;
            const newX = translate.x + (offsetX - translate.x) * ratio;
            const newY = translate.y + (offsetY - translate.y) * ratio;
            
            currentScale = newScale;
            translate = { x: newX, y: newY };
            
            applyTransform();
        }
        
        // Initialize gallery images
        function initGalleryImages() {
            const items = document.querySelectorAll('.gallery-item');
            galleryImages = Array.from(items).map(item => ({
                src: item.getAttribute('data-src'),
                title: item.getAttribute('data-title') || '',
                description: item.getAttribute('data-description') || ''
            }));
        }
        
        // Navigate between images
        function navigateImage(direction) {
            if (galleryImages.length === 0) return;
            
            currentImageIndex = (currentImageIndex + direction + galleryImages.length) % galleryImages.length;
            const img = galleryImages[currentImageIndex];
            handleImageClick(img.src, img.title, img.description, currentImageIndex);
        }
        
        // Update navigation buttons state
        function updateNavButtons() {
            if (galleryImages.length <= 1) {
                document.getElementById('prevBtn').style.display = 'none';
                document.getElementById('nextBtn').style.display = 'none';
            } else {
                document.getElementById('prevBtn').style.display = 'flex';
                document.getElementById('nextBtn').style.display = 'flex';
            }
        }
        
        // Initialize event listeners
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('imageModal');
            const img = document.getElementById('modalImage');
            const zoomContainer = document.getElementById('zoomContainer');
            
            if (!modal || !img || !zoomContainer) return;
            
            // Close modal when clicking outside image
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeImageModal();
                }
            });
            
            // Mouse wheel zoom
            zoomContainer.addEventListener('wheel', function(e) {
                e.preventDefault();
                const delta = e.deltaY > 0 ? 0.9 : 1.1;
                zoom(delta, e.clientX, e.clientY);
            }, { passive: false });
            
            // Mouse drag to pan
            zoomContainer.addEventListener('mousedown', function(e) {
                if (currentScale <= 1) return;
                isDragging = true;
                startPos = { x: e.clientX, y: e.clientY };
                startTranslate = { ...translate };
                zoomContainer.style.cursor = 'grabbing';
            });
            
            document.addEventListener('mousemove', function(e) {
                if (!isDragging) return;
                e.preventDefault();
                
                const dx = e.clientX - startPos.x;
                const dy = e.clientY - startPos.y;
                
                translate.x = startTranslate.x + dx;
                translate.y = startTranslate.y + dy;
                
                applyTransform();
            });
            
            document.addEventListener('mouseup', function() {
                isDragging = false;
                zoomContainer.style.cursor = currentScale > 1 ? 'grab' : 'default';
            });
            
            // Touch events for swipe and pinch zoom
            let initialDistance = 0;
            
            zoomContainer.addEventListener('touchstart', function(e) {
                if (e.touches.length === 1) {
                    // Single touch - start drag
                    isDragging = true;
                    startPos = { x: e.touches[0].clientX, y: e.touches[0].clientY };
                    startTranslate = { ...translate };
                } else if (e.touches.length === 2) {
                    // Two touches - start pinch zoom
                    const touch1 = e.touches[0];
                    const touch2 = e.touches[1];
                    initialDistance = Math.hypot(
                        touch2.clientX - touch1.clientX,
                        touch2.clientY - touch1.clientY
                    );
                }
            }, { passive: false });
            
            zoomContainer.addEventListener('touchmove', function(e) {
                e.preventDefault();
                
                if (e.touches.length === 1 && isDragging) {
                    // Single touch - drag
                    const touch = e.touches[0];
                    const dx = touch.clientX - startPos.x;
                    const dy = touch.clientY - startPos.y;
                    
                    translate.x = startTranslate.x + dx;
                    translate.y = startTranslate.y + dy;
                    
                    applyTransform();
                } else if (e.touches.length === 2) {
                    // Two touches - pinch zoom
                    const touch1 = e.touches[0];
                    const touch2 = e.touches[1];
                    const currentDistance = Math.hypot(
                        touch2.clientX - touch1.clientX,
                        touch2.clientY - touch1.clientY
                    );
                    
                    if (initialDistance > 0) {
                        const centerX = (touch1.clientX + touch2.clientX) / 2;
                        const centerY = (touch1.clientY + touch2.clientY) / 2;
                        const delta = currentDistance / initialDistance;
                        
                        zoom(delta, centerX, centerY);
                        initialDistance = currentDistance;
                    }
                }
            }, { passive: false });
            
            zoomContainer.addEventListener('touchend', function(e) {
                if (e.touches.length === 1) {
                    // One touch ended, but another is still active
                    startPos = { 
                        x: e.touches[0].clientX, 
                        y: e.touches[0].clientY 
                    };
                    startTranslate = { ...translate };
                } else {
                    // All touches ended
                    isDragging = false;
                    initialDistance = 0;
                }
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (!modal.classList.contains('hidden')) {
                    centerImage(false);
                }
            });
            
            // Initialize gallery images
            initGalleryImages();
            
            // Navigation buttons
            document.getElementById('prevBtn').addEventListener('click', function(e) {
                e.stopPropagation();
                navigateImage(-1);
            });
            
            document.getElementById('nextBtn').addEventListener('click', function(e) {
                e.stopPropagation();
                navigateImage(1);
            });
            
            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (modal.classList.contains('hidden')) return;
                
                switch(e.key) {
                    case 'ArrowLeft':
                        navigateImage(-1);
                        break;
                    case 'ArrowRight':
                        navigateImage(1);
                        break;
                    case 'Escape':
                        closeImageModal();
                        break;
                    case '+':
                    case '=':
                        zoom(1.2, window.innerWidth / 2, window.innerHeight / 2);
                        break;
                    case '-':
                    case '_':
                        zoom(0.8, window.innerWidth / 2, window.innerHeight / 2);
                        break;
                    case '0':
                        centerImage();
                        break;
                }
            });
        });
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --oxford-navy: #0a1f44;
            --oxford-gold: #c5a572;
            --oxford-navy-light: #1a3a5c;
            --oxford-gold-light: #c5a572;
            --oxford-dark: #1a1a1a;
            --oxford-dark-light: #2d2d2d;
            --oxford-dark-lighter: #404040;
            --oxford-accent: #64748b;
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
        .font-script { font-family: 'Dancing Script', cursive; }
        .bg-oxford-navy { background-color: var(--oxford-navy); }
        .bg-oxford-gold { background-color: var(--oxford-gold); }
        .text-oxford-navy { color: var(--oxford-navy); }
        .text-oxford-gold { color: var(--oxford-gold); }
        .border-oxford-gold { border-color: var(--oxford-gold); }
        .bg-oxford-navy-light { background-color: var(--oxford-navy-light); }
        
        /* Text Gradient */
        .text-gradient {
            background: linear-gradient(135deg, var(--oxford-gold), #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Glass Effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Neon Glow */
        .neon-glow {
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.4);
        }
        
        /* Subtle Glow */
        .subtle-glow {
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
        }
        .subtle-glow:hover {
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }
    </style>
    <style>
        /* Custom scrollbar for comments */
        #commentsContainer::-webkit-scrollbar {
            width: 6px;
        }
        #commentsContainer::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        #commentsContainer::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }
        #commentsContainer::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }
        
        /* Comment styling */
        .comment-item {
            transition: all 0.3s ease;
        }
        .comment-item:hover {
            background-color: #f9fafb;
        }
        
        /* Loading animation */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top-color: #3b82f6;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Header -->
    <header class="bg-oxford-navy text-white shadow-lg border-b-4 border-oxford-gold">
        <div class="container mx-auto px-6 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('gallery.index') }}" class="flex items-center">
                        <span class="text-oxford-gold font-medium">← Kembali ke Galeri</span>
                    </a>
                </div>
                <a href="{{ route('user.home') }}" class="text-oxford-gold px-6 py-3 font-semibold hover:bg-opacity-90 transition-all">
                    ← Kembali ke Home
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12">
        <!-- Gallery Header -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
            <div class="text-center">
                <h2 class="text-4xl font-serif font-bold text-oxford-navy mb-4">{{ $gallery->judul ?? 'Galeri Tanpa Judul' }}</h2>
                @if($gallery->deskripsi)
                    <p class="text-xl text-gray-600 mb-6">{{ $gallery->deskripsi }}</p>
                @endif
                <div class="flex items-center justify-center space-x-6 text-sm text-gray-500">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                        </svg>
                        {{ $gallery->fotos->count() }} Foto
                    </span>
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        {{ $gallery->created_at->format('d M Y') }}
                    </span>
                    @if(isset($gallery->status))
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $gallery->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $gallery->status === 'active' ? 'AKTIF' : 'TIDAK AKTIF' }}
                    </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Photo Gallery Grid -->
        @if($gallery->fotos->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($gallery->fotos as $foto)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="relative group" style="height: 250px;">
                            @php
                                // Cek di beberapa lokasi yang mungkin
                                $filename = basename($foto->file);
                                $possiblePaths = [
                                    'uploads/gallery/' . $filename,
                                    'storage/' . $filename,
                                    'storage/gallery/' . $filename,
                                    $foto->file // Path asli dari database
                                ];

                                $imagePath = asset('img/placeholder.jpg');
                                
                                foreach ($possiblePaths as $path) {
                                    if (file_exists(public_path($path))) {
                                        $imagePath = asset($path);
                                        break;
                                    }
                                }
                                
                                // Debug info
                                // echo "<!-- Debug: " . json_encode([
                                //     'file' => $foto->file,
                                //     'possible_paths' => $possiblePaths,
                                //     'selected_path' => $imagePath
                                // ]) . " -->";
                            @endphp
                            <div class="w-full h-full relative group gallery-item" 
                                 style="cursor: pointer;"
                                 data-src="{{ $imagePath }}"
                                 data-title="{{ $foto->judul ?? '' }}"
                                 data-description="{{ $foto->deskripsi ?? '' }}"
                                 onclick="handleImageClick('{{ $imagePath }}', '{{ addslashes($foto->judul ?? '') }}', '{{ addslashes($foto->deskripsi ?? '') }}', {{ $loop->index }}); return false;">
                                <img src="{{ $imagePath }}" 
                                     alt="{{ $foto->judul ?? 'Foto Galeri' }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                     onerror="this.onerror=null; this.src='{{ asset('img/placeholder.jpg') }}'">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @if(($foto->judul && !str_contains($foto->judul, '.jpeg') && !str_contains($foto->judul, '.jpg') && !str_contains($foto->judul, '.png')) || $foto->deskripsi)
                        <div class="p-4">
                            @if($foto->judul && !str_contains($foto->judul, '.jpeg') && !str_contains($foto->judul, '.jpg') && !str_contains($foto->judul, '.png'))
                                <h3 class="font-serif font-bold text-lg text-oxford-navy mb-2">{{ $foto->judul }}</h3>
                            @endif
                            @if($foto->deskripsi)
                                <p class="text-gray-600 text-sm">{{ $foto->deskripsi }}</p>
                            @endif
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-2xl shadow-xl p-12 text-center">
                <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                </svg>
                <h3 class="text-2xl font-serif font-bold text-gray-400 mb-2">Belum Ada Foto</h3>
                <p class="text-gray-500">Galeri ini belum memiliki foto yang dapat ditampilkan.</p>
            </div>
        @endif
    </main>

    <!-- Image Modal -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-95 z-50 flex flex-col items-center justify-center p-4">
        <div class="w-full h-full max-w-[95vw] max-h-[95vh] flex flex-col">
            <!-- Header -->
            <div class="flex justify-between items-center mb-2 px-4 py-3 bg-black bg-opacity-80 w-full rounded-t-lg">
                <h3 id="modalTitle" class="text-lg font-bold text-white truncate max-w-[80%]"></h3>
                <div class="flex items-center space-x-4">
                    <span id="imageInfo" class="text-sm text-gray-300 hidden md:block"></span>
                    <button onclick="closeImageModal()" class="text-white hover:text-oxford-gold text-2xl font-bold w-8 h-8 flex items-center justify-center">
                        &times;
                    </button>
                </div>
            </div>
            
            <!-- Main Image Container -->
            <div id="imageContainer" class="group flex-1 w-full flex items-center justify-center overflow-hidden bg-black rounded-b-lg relative">
                <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 z-10 bg-black bg-opacity-50 hover:bg-opacity-75 text-white p-3 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100 focus:outline-none" aria-label="Previous image">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                
                <div id="zoomContainer" class="w-full h-full flex items-center justify-center p-2 transition-transform duration-300">
                    <img id="modalImage" 
                         src="" 
                         alt="" 
                         class="max-w-full max-h-full w-auto h-auto object-contain cursor-zoom-in"
                         style="image-orientation: from-image;"
                         draggable="false"
                         onload="imageLoaded(this)">
                </div>
                
                <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 z-10 bg-black bg-opacity-50 hover:bg-opacity-75 text-white p-3 rounded-full transition-all duration-300 opacity-0 group-hover:opacity-100 focus:outline-none" aria-label="Next image">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div id="loadingSpinner" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-70">
                    <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-oxford-gold"></div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="mt-2 p-3 bg-black bg-opacity-80 w-full rounded-b-lg">
                <p id="modalDescription" class="text-white text-center text-sm md:text-base"></p>
                <div class="mt-2 flex justify-center space-x-4">
                    <button id="zoomInBtn" class="text-white hover:text-oxford-gold p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7" />
                        </svg>
                    </button>
                    <button id="zoomOutBtn" class="text-white hover:text-oxford-gold p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10H7" />
                        </svg>
                    </button>
                    <button id="resetZoomBtn" class="text-white hover:text-oxford-gold p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        #imageContainer {
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        #zoomContainer {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            transform-origin: center center;
        }
        
        #modalImage {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
        
        .cursor-zoom-in {
            cursor: zoom-in;
        }
        
        .cursor-zoom-out {
            cursor: zoom-out;
        }
        
        .transition-transform {
            transition: transform 0.2s ease-out;
        }
        
        /* Navigation buttons */
        #prevBtn, #nextBtn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s, background 0.3s;
        }
        
        #prevBtn { left: 15px; }
        #nextBtn { right: 15px; }
        
        #imageContainer:hover #prevBtn,
        #imageContainer:hover #nextBtn {
            opacity: 1;
        }
        
        #prevBtn:hover, #nextBtn:hover {
            background: rgba(0, 0, 0, 0.8);
        }
    </style>

    <script>
        // Global variables for zoom and pan
        let currentScale = 1;
        let isDragging = false;
        let startPos = { x: 0, y: 0 };
        let translate = { x: 0, y: 0 };
        let startTranslate = { x: 0, y: 0 };
        let currentImageIndex = 0;
        let galleryImages = [];
        
        // DOM elements
        const zoomContainer = document.getElementById('zoomContainer');
        const modalImage = document.getElementById('modalImage');
        const loadingSpinner = document.getElementById('loadingSpinner');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        
        // Initialize gallery images array
        function initGalleryImages() {
            const imageElements = document.querySelectorAll('.gallery-image');
            galleryImages = Array.from(imageElements).map(img => ({
                src: img.dataset.src || img.src,
                title: img.dataset.title || '',
                description: img.dataset.description || ''
            }));
        }
        
        // Navigate to previous/next image
        function navigateImage(direction) {
            if (!galleryImages.length) return;
            
            currentImageIndex = (currentImageIndex + direction + galleryImages.length) % galleryImages.length;
            const image = galleryImages[currentImageIndex];
            
            // Reset zoom and position
            currentScale = 1;
            translate = { x: 0, y: 0 };
            updateTransform();
            
            // Show loading
            modalImage.style.display = 'none';
            loadingSpinner.style.display = 'flex';
            
            // Update image
            modalImage.src = image.src;
            modalImage.alt = image.title || 'Galeri Foto';
            document.getElementById('modalTitle').textContent = image.title || 'Galeri Foto';
            document.getElementById('modalDescription').textContent = image.description || '';
        }
        
        function openImageModal(imageSrc, title, description, index = 0) {
            // Prevent default behavior
            const event = window.event || {};
            if (event.preventDefault) event.preventDefault();
            if (event.stopPropagation) event.stopPropagation();
            const modal = document.getElementById('imageModal');
            const img = document.getElementById('modalImage');
            
            // Initialize gallery images if not already done
            if (galleryImages.length === 0) {
                initGalleryImages();
                // Find the current image index
                currentImageIndex = galleryImages.findIndex(img => img.src === imageSrc);
                if (currentImageIndex === -1) currentImageIndex = 0;
            } else {
                currentImageIndex = index;
            }
            
            // Reset state
            currentScale = 1;
            translate = { x: 0, y: 0 };
            updateTransform();
            
            // Show loading
            img.style.display = 'none';
            loadingSpinner.style.display = 'flex';
            
            // Set content
            document.getElementById('modalTitle').textContent = title || 'Galeri Foto';
            document.getElementById('modalDescription').textContent = description || '';
            document.getElementById('imageInfo').textContent = 'Memuat...';
            
            // Show modal
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Load image
            const tempImg = new Image();
            tempImg.onload = function() {
                img.src = imageSrc;
                img.alt = title || 'Galeri Foto';
                const dimensions = `${this.naturalWidth} × ${this.naturalHeight} px`;
                document.getElementById('imageInfo').textContent = dimensions;
                
                // Show image and hide spinner
                setTimeout(() => {
                    img.style.display = 'block';
                    loadingSpinner.style.display = 'none';
                    
                    // Get container and image dimensions
            const container = document.getElementById('imageContainer');
            const containerRect = container.getBoundingClientRect();
            
            // Calculate available space (accounting for padding and header/footer)
            const availableWidth = containerRect.width - 40; // 20px padding each side
            const availableHeight = containerRect.height - 40; // 20px padding top/bottom
            
            // Calculate scale to fit image in container while maintaining aspect ratio
            const widthRatio = availableWidth / this.naturalWidth;
            const heightRatio = availableHeight / this.naturalHeight;
            
            // Use the smaller scale to ensure the whole image is visible
            currentScale = Math.min(widthRatio, heightRatio, 1); // Cap at 100% of original size
            
            // Calculate centered position
            const imgWidth = this.naturalWidth * currentScale;
            const imgHeight = this.naturalHeight * currentScale;
            
            // Center the image
            translate = {
                x: (containerRect.width - imgWidth) / 2,
                y: (containerRect.height - imgHeight) / 2
            };
            
            // Update transform
            updateTransform();        };
                    
                    updateTransform();
                    updateCursor();
                    
                }, 100);
            };
            
            tempImg.onerror = function() {
                document.getElementById('imageInfo').textContent = 'Gagal memuat gambar';
                loadingSpinner.style.display = 'none';
                img.style.display = 'block';
                img.src = '{{ asset('img/placeholder.jpg') }}';
                img.alt = 'Gambar tidak dapat dimuat';
                centerImage();
            };
            
            tempImg.src = imageSrc;
        }
        
        function imageLoaded(img) {
            // This function is called when the image finishes loading
            centerImage();
        }
        
        function centerImage() {
            if (!modalImage.complete) return;
            
            const container = document.getElementById('imageContainer');
            const imgRect = modalImage.getBoundingClientRect();
            const containerRect = container.getBoundingClientRect();
            
            // Reset scale and position
            currentScale = 1;
            translate = { x: 0, y: 0 };
            updateTransform();
            
            // Calculate initial scale to fit container
            const scaleX = containerRect.width / imgRect.width;
            const scaleY = (containerRect.height - 100) / imgRect.height; // Account for header/footer
            currentScale = Math.min(scaleX, scaleY, 1);
            
            updateTransform();
            
            // Update cursor based on zoom level
            updateCursor();
        }
        
        function zoom(scaleFactor, zoomPoint = null) {
            const oldScale = currentScale;
            currentScale = Math.max(0.5, Math.min(currentScale * scaleFactor, 5));
            
            if (zoomPoint) {
                // Calculate the mouse position relative to the image
                const rect = zoomContainer.getBoundingClientRect();
                const x = zoomPoint.clientX - rect.left;
                const y = zoomPoint.clientY - rect.top;
                
                // Adjust the translate to zoom toward the mouse position
                translate.x = x - (x - translate.x) * (currentScale / oldScale);
                translate.y = y - (y - translate.y) * (currentScale / oldScale);
            }
            
            updateTransform();
            updateCursor();
        }
        
        function updateTransform() {
            zoomContainer.style.transform = `translate(${translate.x}px, ${translate.y}px) scale(${currentScale})`;
        }
        
        function updateCursor() {
            modalImage.classList.toggle('cursor-zoom-in', currentScale <= 1);
            modalImage.classList.toggle('cursor-zoom-out', currentScale > 1);
            
            // Update cursor style for dragging
            if (currentScale > 1) {
                zoomContainer.style.cursor = isDragging ? 'grabbing' : 'grab';
            } else {
                zoomContainer.style.cursor = 'default';
            }
        }
        
        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('imageModal');
            if (modal.classList.contains('hidden')) return;
            
            switch(e.key) {
                case 'ArrowLeft':
                    navigateImage(-1);
                    break;
                case 'ArrowRight':
                    navigateImage(1);
                    break;
                case 'Escape':
                    closeImageModal();
                    break;
            }
        });
        
        // Simple function to show image in modal
        function showImage(src, title, description) {
            console.log('showImage called with:', { src, title, description });
            if (!src) {
                console.error('No source provided');
                return;
            }
            const modal = document.getElementById('imageModal');
            const img = document.getElementById('modalImage');
            
            // Show loading
            img.style.display = 'none';
            document.getElementById('loadingSpinner').style.display = 'flex';
            
            // Set content
            document.getElementById('modalTitle').textContent = title || 'Galeri Foto';
            document.getElementById('modalDescription').textContent = description || '';
            
            // Show modal
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Load image
            const tempImg = new Image();
            tempImg.onload = function() {
                img.src = src;
                img.alt = title || 'Galeri Foto';
                document.getElementById('imageInfo').textContent = 
                    `${this.naturalWidth} × ${this.naturalHeight} px`;
                
                // Show image and hide spinner
                setTimeout(() => {
                    img.style.display = 'block';
                    document.getElementById('loadingSpinner').style.display = 'none';
                    
                    // Center the image
                    centerImage();
                }, 100);
            };
            
            tempImg.onerror = function() {
                document.getElementById('imageInfo').textContent = 'Gagal memuat gambar';
                document.getElementById('loadingSpinner').style.display = 'none';
                img.style.display = 'block';
                img.src = '{{ asset('img/placeholder.jpg') }}';
                img.alt = 'Gambar tidak dapat dimuat';
            };
            
            tempImg.src = src;
        }

        // Close modal function
        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Initialize with jQuery
        $(document).ready(function() {
            console.log('jQuery loaded');
            
            // Handle gallery item click
            $('.gallery-item').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const $this = $(this);
                const src = $this.data('src');
                const title = $this.data('title') || '';
                const description = $this.data('description') || '';
                
                console.log('Gallery item clicked:', { src, title, description });
                
                // Show modal
                $('#modalImage').hide();
                $('#loadingSpinner').show();
                $('#modalTitle').text(title || 'Galeri Foto');
                $('#modalDescription').text(description);
                $('#imageModal').removeClass('hidden');
                $('body').css('overflow', 'hidden');
                
                // Load image
                const img = new Image();
                img.onload = function() {
                    $('#modalImage')
                        .attr('src', src)
                        .attr('alt', title || 'Galeri Foto')
                        .show();
                    $('#loadingSpinner').hide();
                    centerImage();
                };
                img.onerror = function() {
                    console.error('Failed to load image:', src);
                    $('#imageInfo').text('Gagal memuat gambar');
                    $('#loadingSpinner').hide();
                    $('#modalImage')
                        .attr('src', '{{ asset('img/placeholder.jpg') }}')
                        .attr('alt', 'Gambar tidak dapat dimuat')
                        .show();
                };
                img.src = src;
            });
            
            // Close modal
            $('#imageModal').on('click', function(e) {
                if (e.target === this) {
                    $(this).addClass('hidden');
                    $('body').css('overflow', 'auto');
                }
            });
            
            // Navigation buttons
            $('#prevBtn, #nextBtn').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const direction = $(this).attr('id') === 'prevBtn' ? -1 : 1;
                navigateImage(direction);
                return false;
            });
            
            // Initialize gallery images
            initGalleryImages();
            // Initialize gallery images
            initGalleryImages();
            
            // Navigation buttons
            if (prevBtn) {
                prevBtn.onclick = function(e) {
                    e.preventDefault();
                    navigateImage(-1);
                    return false;
                };
            }
            
            if (nextBtn) {
                nextBtn.onclick = function(e) {
                    e.preventDefault();
                    navigateImage(1);
                    return false;
                };
            }
            // Zoom buttons
            const zoomInBtn = document.getElementById('zoomInBtn');
            const zoomOutBtn = document.getElementById('zoomOutBtn');
            const resetZoomBtn = document.getElementById('resetZoomBtn');
            const imageContainer = document.getElementById('imageContainer');
            
            if (zoomInBtn) zoomInBtn.addEventListener('click', () => zoom(1.2));
            if (zoomOutBtn) zoomOutBtn.addEventListener('click', () => zoom(0.8));
            if (resetZoomBtn) resetZoomBtn.addEventListener('click', centerImage);
            
            // Mouse wheel zoom
            if (imageContainer) {
                imageContainer.addEventListener('wheel', (e) => {
                    e.preventDefault();
                    const delta = e.deltaY > 0 ? 0.9 : 1.1;
                    zoom(delta, e);
                }, { passive: false });
                
                // Touch events for swipe
                let touchStartX = 0;
                let touchEndX = 0;
                
                imageContainer.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                }, false);
                
                imageContainer.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                }, false);
                
                function handleSwipe() {
                    const swipeThreshold = 50; // minimum distance for a swipe to be registered
                    const swipeDistance = touchEndX - touchStartX;
                    
                    if (Math.abs(swipeDistance) > swipeThreshold) {
                        if (swipeDistance > 0) {
                            // Swipe right - go to previous image
                            navigateImage(-1);
                        } else {
                            // Swipe left - go to next image
                            navigateImage(1);
                        }
                    }
                }
            }
            
            // Drag to pan
            if (zoomContainer) {
                zoomContainer.addEventListener('mousedown', (e) => {
                    if (currentScale <= 1) return;
                    
                    isDragging = true;
                    startPos = { x: e.clientX, y: e.clientY };
                    startTranslate = { ...translate };
                    updateCursor();
                });
            }
            
            // Click to zoom in/out
            if (modalImage) {
                modalImage.addEventListener('click', (e) => {
                    if (currentScale <= 1) {
                        zoom(2, e);
                    } else {
                        centerImage();
                    }
                });
            }
            
            // Close modal when clicking outside the image
            const modal = document.getElementById('imageModal');
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeImageModal();
                    }
                });
            }
        });
        
        // Global event listeners
        window.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            
            const dx = e.clientX - startPos.x;
            const dy = e.clientY - startPos.y;
            
            translate = {
                x: startTranslate.x + dx,
                y: startTranslate.y + dy
            };
            
            updateTransform();
        });
        
        window.addEventListener('mouseup', () => {
            isDragging = false;
            updateCursor();
        });
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
            }
        });
        
        // Handle window resize
        window.addEventListener('resize', () => {
            if (document.getElementById('imageModal') && !document.getElementById('imageModal').classList.contains('hidden')) {
                centerImage();
            }
        });
    </script>
</body>
</html>
