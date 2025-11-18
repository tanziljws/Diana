<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gallery Showcase - Oxford High School</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
        
        /* Custom Tailwind Colors */
        .bg-oxford-navy { background-color: var(--oxford-navy); }
        .bg-oxford-gold { background-color: var(--oxford-gold); }
        .text-oxford-navy { color: var(--oxford-navy); }
        .text-oxford-gold { color: var(--oxford-gold); }
        .border-oxford-gold { border-color: var(--oxford-gold); }
        .bg-oxford-navy-light { background-color: var(--oxford-navy-light); }
        .ring-oxford-gold { --tw-ring-color: var(--oxford-gold); }
        
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
            box-shadow: 0 0 20px rgba(197, 165, 114, 0.4);
        }
        
        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }
        
        /* Filter Button Active */
        .filter-active {
            background-color: var(--oxford-navy);
            color: white;
        }
        
        /* Subtle Glow */
        .subtle-glow {
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
        }
        .subtle-glow:hover {
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }
        
        /* Simple transitions only */
        button, a {
            transition: background-color 0.2s, color 0.2s;
        }
        
        /* Ensure loading/empty states don't block clicks */
        #loadingState.hidden,
        #emptyState.hidden {
            display: none !important;
            pointer-events: none !important;
        }
        
        /* Ensure grid view is clickable */
        #gridView {
            pointer-events: auto !important;
            position: relative;
            z-index: 1;
        }
        
    </style>
</head>
<body class="bg-gray-50 min-h-screen font-sans">
    
    <!-- Hero Section Modern Aesthetic -->
<section class="relative w-full bg-cover bg-center bg-no-repeat py-24 md:py-32 lg:py-40"
    style="
        background-image:
        linear-gradient(rgba(10, 31, 68, 0.7), rgba(10, 31, 68, 0.8)),
        url('{{ asset('images/bgaleri.jpg') }}');
    ">
    
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-oxford-navy/10 to-oxford-navy/40"></div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center">
        
        <!-- Breadcrumb Modern -->
        <nav class="flex justify-center mb-8" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm">
                <li>
                    <a href="/user" 
                       class="flex items-center gap-2 text-oxford-gold/70 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 3.293l6 6V17a1 1 0 01-1 1h-3v-4H8v4H5a1 1 0 01-1-1v-7.707l6-6z" />
                        </svg>
                        Home
                    </a>
                </li>

                <li>
                    <svg class="w-5 h-5 text-oxford-gold/40" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" />
                    </svg>
                </li>

                <li class="text-white font-medium tracking-wide">
                    Gallery
                </li>
            </ol>
        </nav>

        <!-- Glassmorphism Card -->
        <div class="backdrop-blur-md bg-white/10 border border-white/20 rounded-2xl py-10 px-6 md:px-12 shadow-xl inline-block">

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white drop-shadow-sm mb-4">
                Our Gallery
            </h1>

            <p class="text-lg md:text-xl text-oxford-gold/90 max-w-2xl mx-auto leading-relaxed">
                Capture the unforgettable moments throughout our school’s journey.
            </p>

        </div>

    </div>
</section>
    <!-- Stats Section -->
    <section class="bg-white py-8 md:py-12 shadow-md -mt-8 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                <!-- Stat 1 -->
                <div class="bg-white rounded-xl p-6 text-center border border-oxford-navy/10 shadow-sm">
                    <div class="text-3xl md:text-4xl font-bold text-oxford-navy mb-2" id="totalGalleries">0</div>
                    <div class="text-oxford-navy/80 font-medium">Total Galleries</div>
                </div>
                
                <!-- Stat 2 -->
                <div class="bg-white rounded-xl p-6 text-center border border-oxford-navy/10 shadow-sm">
                    <div class="text-3xl md:text-4xl font-bold text-oxford-navy mb-2" id="totalPhotos">0</div>
                    <div class="text-oxford-navy/80 font-medium">Total Photos</div>
                </div>
                
                <!-- Stat 3 -->
                <div class="bg-white rounded-xl p-6 text-center border border-oxford-navy/10 shadow-sm">
                    <div class="text-3xl md:text-4xl font-bold text-oxford-navy mb-2" id="totalCategories">{{ $totalCategories ?? 0 }}</div>
                    <div class="text-oxford-navy/80 font-medium">Kategori</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="sticky top-0 z-40 bg-white shadow-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 md:py-4">
            <div class="flex items-center justify-between flex-wrap gap-2 md:gap-4">
                <!-- Search -->
                <div class="flex-1 max-w-md">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Cari galeri berdasarkan judul..." 
                            class="w-full pl-8 md:pl-10 pr-3 md:pr-4 py-2 md:py-2.5 text-sm md:text-base border-2 border-gray-300 rounded-lg md:rounded-xl focus:ring-2 focus:ring-oxford-gold focus:border-oxford-gold outline-none transition-all hover:border-oxford-gold/50"
                            oninput="filterGalleries()">
                        <svg class="absolute left-2 md:left-3 top-2 md:top-3 w-4 h-4 md:w-5 md:h-5 text-gray-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Content -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-8">
        <!-- Grid View -->
        <div id="galleriesContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($galleries as $gallery)
                @if($gallery->fotos->count() > 0)
                    <div class="gallery-item group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1" data-title="{{ strtolower($gallery->judul) }}">
                        <div class="relative overflow-hidden h-48">
                            <img src="{{ asset($gallery->fotos->first()->file) }}" 
                                 alt="{{ $gallery->judul }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                <div>
                                    <h3 class="text-white font-bold text-lg">{{ $gallery->judul }}</h3>
                                    <p class="text-gray-200 text-sm">{{ $gallery->fotos->count() }} foto</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-oxford-navy">{{ $gallery->judul }}</h3>
                                <span class="text-sm text-gray-500">{{ $gallery->created_at->format('d M Y') }}</span>
                            </div>
                            <p class="text-gray-600 text-sm mt-1 line-clamp-2">{{ $gallery->deskripsi }}</p>
                            <div class="mt-3 flex justify-between items-center">
                                <div class="flex -space-x-2">
                                    @foreach($gallery->fotos->take(3) as $foto)
                                        <div class="w-6 h-6 rounded-full border-2 border-white overflow-hidden">
                                            <img src="{{ asset($foto->file) }}" alt="" class="w-full h-full object-cover">
                                        </div>
                                    @endforeach
                                    @if($gallery->fotos->count() > 3)
                                        <div class="w-6 h-6 rounded-full bg-oxford-gold text-white text-xs flex items-center justify-center">
                                            +{{ $gallery->fotos->count() - 3 }}
                                        </div>
                                    @endif
                                </div>
                                <a href="{{ route('user.gallery.show', $gallery->id_g) }}" 
                                   class="text-oxford-gold hover:text-oxford-navy font-medium text-sm flex items-center">
                                    Lihat Semua
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Pagination -->
        @if($galleries->hasPages())
            <div class="mt-12">
                {{ $galleries->links() }}
            </div>
        @endif
    </section>

    <!-- Gallery Modal -->
    <div id="galleryModal" class="hidden fixed inset-0 bg-black/90 backdrop-blur-sm z-50 overflow-y-auto">
        <div class="min-h-screen px-3 md:px-4 py-4 md:py-8">
            <!-- Close Button -->
            <button onclick="closeGalleryModal()" class="fixed top-3 md:top-4 right-3 md:right-4 z-50 w-10 h-10 md:w-12 md:h-12 frosted-glass hover:bg-white/20 rounded-full flex items-center justify-center transition-all transform hover:scale-110 hover:rotate-90">
                <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            
            <div class="max-w-6xl mx-auto">
                <!-- Gallery Header -->
                <div class="text-center mb-6 md:mb-8">
                    <h2 id="modalTitle" class="text-2xl md:text-3xl lg:text-4xl font-serif font-bold text-white mb-2 md:mb-4 px-8"></h2>
                    <p id="modalDescription" class="text-sm md:text-base text-gray-300 max-w-2xl mx-auto px-4"></p>
                    
                    <!-- Stats & Actions Bar -->
                    <div class="flex items-center justify-center gap-3 md:gap-6 mt-4 md:mt-6 flex-wrap">
                        <!-- Stats -->
                        <div class="flex items-center gap-3 md:gap-6">
                            <div class="flex items-center gap-1 md:gap-2 text-white text-sm md:text-base">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                                </svg>
                                <span id="modalLikes">0</span>
                            </div>
                            <div class="flex items-center gap-1 md:gap-2 text-white text-sm md:text-base">
                                <svg class="w-4 h-4 md:w-5 md:h-5 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                </svg>
                                <span id="modalViews">0</span>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex items-center gap-2 md:gap-3">
                            <button onclick="shareCurrentGallery()" class="flex items-center gap-1 md:gap-2 frosted-glass hover:bg-white/20 px-3 md:px-4 py-1.5 md:py-2 rounded-full text-white text-xs md:text-sm font-semibold transition-all transform hover:scale-105">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                                <span class="hidden md:inline">Share</span>
                            </button>
                            <button onclick="downloadCurrentGallery()" class="flex items-center gap-1 md:gap-2 bg-oxford-gold hover:bg-yellow-500 px-3 md:px-4 py-1.5 md:py-2 rounded-full text-oxford-navy text-xs md:text-sm font-semibold transition-all transform hover:scale-105 neon-border">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                <span class="hidden md:inline">Download</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Photo Grid -->
                <div id="modalPhotos" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 md:gap-3 lg:gap-4">
                    <!-- Photos will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black/95 backdrop-blur-sm z-[60] flex items-center justify-center p-4" onclick="closeImageModal()">
        <div class="relative max-w-7xl max-h-[95vh] w-full" onclick="event.stopPropagation()">
            <!-- Close Button -->
            <button onclick="closeImageModal()" class="absolute -top-12 right-0 md:-top-14 md:-right-14 w-10 h-10 md:w-12 md:h-12 frosted-glass hover:bg-white/20 rounded-full flex items-center justify-center transition-all transform hover:scale-110 hover:rotate-90 z-10">
                <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            
            <!-- Image Container -->
            <div class="bg-white rounded-xl md:rounded-2xl overflow-hidden shadow-2xl reveal-animation">
                <div class="relative bg-black flex items-center justify-center" style="max-height: 70vh;">
                    <img id="imageModalImage" src="" alt="" class="max-w-full max-h-[70vh] w-auto h-auto object-contain">
                </div>
                
                <!-- Image Info -->
                <div class="p-4 md:p-6 bg-white">
                    <h3 id="imageModalTitle" class="text-lg md:text-xl lg:text-2xl font-bold text-oxford-navy mb-2"></h3>
                    <p id="imageModalDescription" class="text-sm md:text-base text-gray-600"></p>
                    
                    <!-- Download Button -->
                    <div class="mt-4 flex gap-3">
                        <button onclick="downloadImage()" class="flex items-center gap-2 bg-oxford-navy hover:bg-oxford-gold text-white hover:text-oxford-navy px-4 py-2 rounded-lg font-semibold transition-all transform hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download
                        </button>
                        <button onclick="window.open(document.getElementById('imageModalImage').src, '_blank')" class="flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-semibold transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            Open in New Tab
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Search functionality
        function filterGalleries() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const galleryItems = document.querySelectorAll('.gallery-item');
            let hasResults = false;

            galleryItems.forEach(item => {
                const title = item.getAttribute('data-title');
                if (title.includes(searchTerm)) {
                    item.style.display = 'block';
                    hasResults = true;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show no results message if no matches found
            const noResults = document.getElementById('noResults');
            if (!hasResults) {
                if (!noResults) {
                    const container = document.getElementById('galleriesContainer');
                    container.insertAdjacentHTML('afterbegin', `
                        <div id="noResults" class="col-span-full text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-700">Galeri tidak ditemukan</h3>
                            <p class="mt-1 text-gray-500">Tidak ada galeri yang sesuai dengan pencarian Anda.</p>
                        </div>`);
                }
            } else if (noResults) {
                noResults.remove();
            }
        }

        // Setup axios
        axios.defaults.baseURL = window.location.origin;
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        axios.defaults.withCredentials = true;

        let galleries = [];
        let currentView = 'grid';
        let currentUser = null;
        let currentGalleryId = null;

        // Check user login
        async function checkUserLogin() {
            try {
                const response = await axios.get('/auth/user');
                if (response.data.success && response.data.user) {
                    currentUser = response.data.user;
                }
            } catch (error) {
                console.log('No user logged in');
            }
        }

        // Load galleries
        async function loadGalleries() {
            try {
                const response = await axios.get('/api/galleries');
                galleries = response.data;
                
                // Update stats
                document.getElementById('totalGalleries').textContent = galleries.length;
                const totalPhotos = galleries.reduce((sum, g) => sum + (g.fotos?.length || 0), 0);
                document.getElementById('totalPhotos').textContent = totalPhotos;
                
                // Load stats for each gallery
                for (const gallery of galleries) {
                    try {
                        const statsResponse = await axios.get(`/gallery/${gallery.id_g}/stats`);
                        gallery.stats = statsResponse.data;
                    } catch (error) {
                        gallery.stats = { likes: 0, views: 0, comments: [] };
                    }
                }
                
                // Calculate total views
                const totalViews = galleries.reduce((sum, g) => sum + (g.stats?.views || 0), 0);
                document.getElementById('totalViews').textContent = totalViews;
                
                renderGalleries();
                document.getElementById('loadingState').classList.add('hidden');
            } catch (error) {
                console.error('Error loading galleries:', error);
                document.getElementById('loadingState').classList.add('hidden');
                document.getElementById('emptyState').classList.remove('hidden');
            }
        }

        // Render galleries based on current view
        function renderGalleries() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const sortBy = document.getElementById('sortSelect').value;
            
            // Filter galleries
            let filtered = galleries.filter(g => {
                const title = g.post?.judul || '';
                const description = g.post?.konten || '';
                return title.toLowerCase().includes(searchTerm) || description.toLowerCase().includes(searchTerm);
            });
            
            // Sort galleries
            filtered.sort((a, b) => {
                switch(sortBy) {
                    case 'newest':
                        return new Date(b.created_at) - new Date(a.created_at);
                    case 'oldest':
                        return new Date(a.created_at) - new Date(b.created_at);
                    case 'most-liked':
                        return (b.stats?.likes || 0) - (a.stats?.likes || 0);
                    case 'most-viewed':
                        return (b.stats?.views || 0) - (a.stats?.views || 0);
                    default:
                        return 0;
                }
            });
            
            // Show empty state if no results
            if (filtered.length === 0) {
                document.getElementById('emptyState').classList.remove('hidden');
                document.getElementById('gridView').innerHTML = '';
                document.getElementById('listView').innerHTML = '';
                return;
            } else {
                document.getElementById('emptyState').classList.add('hidden');
            }
            
            // Render based on view type
            if (currentView === 'grid') {
                renderGridView(filtered);
            } else {
                renderListView(filtered);
            }
        }

        // Render grid view
        function renderGridView(galleries) {
            console.log('renderGridView called with', galleries.length, 'galleries');
            const gridView = document.getElementById('gridView');
            if (!gridView) {
                console.error('gridView element not found!');
                return;
            }
            
            gridView.innerHTML = '';
            
            galleries.forEach((g, index) => {
                console.log('Creating card for gallery:', g.id_g, g.judul || g.post?.judul);
                
                const card = document.createElement('div');
                card.className = 'bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg';
                card.style.position = 'relative';
                
                // Create content with pointer-events none on all children
                const imageDiv = document.createElement('div');
                imageDiv.className = 'relative h-48 md:h-56 lg:h-64 overflow-hidden bg-gray-100';
                imageDiv.style.pointerEvents = 'none';
                
                if (g.fotos && g.fotos.length > 0) {
                    imageDiv.innerHTML = `<img src="/${g.fotos[0].file}" alt="${g.judul || g.post?.judul || 'Gallery'}" class="w-full h-full object-cover" style="pointer-events: none;">`;
                } else {
                    imageDiv.innerHTML = `
                        <div class="w-full h-full bg-oxford-navy flex items-center justify-center" style="pointer-events: none;">
                            <svg class="w-12 h-12 text-oxford-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="pointer-events: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    `;
                }
                
                const badge = document.createElement('div');
                badge.className = 'absolute top-2 left-2 bg-oxford-navy text-white px-2 py-1 rounded-full text-xs font-bold';
                badge.style.pointerEvents = 'none';
                badge.textContent = `${g.fotos?.length || 0} Photos`;
                imageDiv.appendChild(badge);
                
                const contentDiv = document.createElement('div');
                contentDiv.className = 'p-3 md:p-4';
                contentDiv.style.pointerEvents = 'none';
                contentDiv.innerHTML = `
                    <h3 class="text-base md:text-lg font-bold text-oxford-navy mb-1" style="pointer-events: none;">${g.judul || g.post?.judul || 'Untitled Gallery'}</h3>
                    <p class="text-gray-600 text-xs md:text-sm line-clamp-2 mb-3" style="pointer-events: none;">${g.deskripsi || g.post?.konten || 'No description'}</p>
                    <div class="flex items-center justify-between text-xs text-gray-500 pt-2 border-t border-gray-100 mb-3" style="pointer-events: none;">
                        <span style="pointer-events: none;">❤️ ${g.stats?.likes || 0}</span>
                        <span style="pointer-events: none;">👁️ ${g.stats?.views || 0}</span>
                    </div>
                `;
                
                // Create button - THIS WILL BE CLICKABLE
                const viewButton = document.createElement('button');
                viewButton.className = 'w-full bg-oxford-navy hover:bg-oxford-gold text-white font-bold py-2 px-4 rounded-lg transition-colors';
                viewButton.textContent = 'Lihat Selengkapnya →';
                viewButton.style.pointerEvents = 'auto';
                viewButton.style.cursor = 'pointer';
                
                viewButton.onclick = function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('BUTTON clicked for gallery:', g.id_g);
                    openGalleryModal(g.id_g);
                };
                
                contentDiv.appendChild(viewButton);
                
                card.appendChild(imageDiv);
                card.appendChild(contentDiv);
                
                console.log('Card created with button for gallery:', g.id_g);
                gridView.appendChild(card);
            });
            
            console.log('Total cards appended:', galleries.length);
            
            // IMPORTANT: Make sure loading/empty states are hidden
            document.getElementById('loadingState').classList.add('hidden');
            document.getElementById('emptyState').classList.add('hidden');
            
            // Show grid view
            document.getElementById('gridView').classList.remove('hidden');
            
            console.log('Grid view should now be visible and clickable');
        }

        // Render list view
        function renderListView(galleries) {
            const listView = document.getElementById('listView');
            listView.innerHTML = '';
            
            galleries.forEach((g, index) => {
                const card = document.createElement('div');
                card.className = 'bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg cursor-pointer flex flex-col md:flex-row';
                card.style.pointerEvents = 'auto';
                card.style.cursor = 'pointer';
                
                card.innerHTML = `
                    <div class="w-full md:w-48 h-40 md:h-48 flex-shrink-0 bg-gray-100" style="pointer-events: none;">
                        ${g.fotos && g.fotos.length > 0 ? `
                            <img src="/${g.fotos[0].file}" alt="${g.judul || g.post?.judul || 'Gallery'}" class="w-full h-full object-cover" style="pointer-events: none;">
                        ` : `
                            <div class="w-full h-full bg-oxford-navy flex items-center justify-center" style="pointer-events: none;">
                                <svg class="w-10 h-10 md:w-12 md:h-12 text-oxford-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="pointer-events: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        `}
                    </div>
                    <div class="flex-1 p-4 md:p-6" style="pointer-events: none;">
                        <h3 class="text-lg md:text-xl lg:text-2xl font-bold text-oxford-navy mb-2" style="pointer-events: none;">${g.judul || g.post?.judul || 'Untitled Gallery'}</h3>
                        <p class="text-gray-600 text-sm md:text-base mb-3 md:mb-4 line-clamp-2 md:line-clamp-3" style="pointer-events: none;">${g.deskripsi || g.post?.konten || 'No description'}</p>
                        <div class="flex items-center gap-4 md:gap-6 text-xs md:text-sm text-gray-500 mb-4" style="pointer-events: none;">
                            <span style="pointer-events: none;">📷 ${g.fotos?.length || 0} Photos</span>
                            <span style="pointer-events: none;">❤️ ${g.stats?.likes || 0}</span>
                            <span style="pointer-events: none;">👁️ ${g.stats?.views || 0}</span>
                        </div>
                    </div>
                `;
                
                // Create button for list view
                const buttonContainer = document.createElement('div');
                buttonContainer.className = 'p-4 md:p-6 pt-0';
                buttonContainer.style.pointerEvents = 'none';
                
                const viewButton = document.createElement('button');
                viewButton.className = 'w-full md:w-auto bg-oxford-navy hover:bg-oxford-gold text-white font-bold py-2 px-6 rounded-lg transition-colors';
                viewButton.textContent = 'Lihat Selengkapnya →';
                viewButton.style.pointerEvents = 'auto';
                viewButton.style.cursor = 'pointer';
                
                viewButton.onclick = function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('BUTTON clicked (list view) for gallery:', g.id_g);
                    openGalleryModal(g.id_g);
                };
                
                buttonContainer.appendChild(viewButton);
                card.appendChild(buttonContainer);
                
                listView.appendChild(card);
            });
        }

        // Set view type
        function setView(view) {
            currentView = view;
            
            // Hide all views
            document.getElementById('gridView').classList.add('hidden');
            document.getElementById('listView').classList.add('hidden');
            
            // Show selected view
            document.getElementById(view + 'View').classList.remove('hidden');
            
            // Update buttons
            document.querySelectorAll('[id$="ViewBtn"]').forEach(btn => {
                btn.classList.remove('filter-active');
                btn.classList.add('text-gray-600');
            });
            document.getElementById(view + 'ViewBtn').classList.add('filter-active');
            document.getElementById(view + 'ViewBtn').classList.remove('text-gray-600');
            
            renderGalleries();
        }
        
        // Close gallery modal
        function closeGalleryModal() {
            document.getElementById('galleryModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            currentGalleryId = null;
        }
        
        // Open image modal
        function openImageModal(imageUrl, title, description) {
            console.log('openImageModal called');
            console.log('Image URL:', imageUrl);
            console.log('Title:', title);
            console.log('Description:', description);
            
            const modal = document.getElementById('imageModal');
            const img = document.getElementById('imageModalImage');
            const titleEl = document.getElementById('imageModalTitle');
            const descEl = document.getElementById('imageModalDescription');
            
            if (!modal || !img || !titleEl || !descEl) {
                console.error('Image modal elements not found!');
                return;
            }
            
            // Set download button
            const downloadBtn = document.querySelector('#imageModal button[onclick="downloadImage()"]');
            if (downloadBtn) {
                downloadBtn.onclick = function() {
                    const link = document.createElement('a');
                    link.href = `/${imageUrl}`;
                    link.download = title || 'image';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                };
            }
            
            // Decode HTML entities
            const decodeHtml = (html) => {
                const txt = document.createElement('textarea');
                txt.innerHTML = html;
                return txt.value;
            };
            
            modal.classList.remove('hidden');
            img.src = `/${imageUrl}`;
            titleEl.textContent = decodeHtml(title || 'Image');
            descEl.textContent = decodeHtml(description || 'No description available.');
            
            console.log('Image modal opened successfully!');
        }
        
        // Close image modal
        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
        
        // Download image
        function downloadImage() {
            const img = document.getElementById('imageModalImage');
            const link = document.createElement('a');
            link.href = img.src;
            link.download = document.getElementById('imageModalTitle').textContent || 'image';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // Open gallery modal
        async function openGalleryModal(galleryId) {
            console.log('openGalleryModal called with ID:', galleryId);
            console.log('Available galleries:', galleries);
            
            const gallery = galleries.find(g => g.id_g === galleryId);
            if (!gallery) {
                console.error('Gallery not found with ID:', galleryId);
                return;
            }
            
            console.log('Found gallery:', gallery);
            console.log('Gallery has', gallery.fotos?.length || 0, 'photos');
            
            currentGalleryId = galleryId;
            
            // Record view
            if (currentUser) {
                try {
                    await axios.post(`/gallery/${galleryId}/view`);
                } catch (error) {
                    console.error('Error recording view:', error);
                }
            }
            
            document.getElementById('modalTitle').textContent = gallery.judul || gallery.post?.judul || 'Untitled Gallery';
            document.getElementById('modalDescription').textContent = gallery.deskripsi || gallery.post?.konten || 'No description';
            document.getElementById('modalLikes').textContent = gallery.stats?.likes || 0;
            document.getElementById('modalViews').textContent = gallery.stats?.views || 0;
            document.getElementById('modalComments').textContent = gallery.stats?.comments?.length || 0;
            
            const modalPhotos = document.getElementById('modalPhotos');
            modalPhotos.innerHTML = '';
            
            console.log('Rendering photos in modal...');
            
            if (!gallery.fotos || gallery.fotos.length === 0) {
                modalPhotos.innerHTML = '<p class="text-center text-gray-500 py-8">No photos in this gallery</p>';
                console.log('No photos to display');
            }
            
            (gallery.fotos || []).forEach((photo, index) => {
                console.log('Creating photo card:', index, photo.file);
                const card = document.createElement('div');
                card.className = 'bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg cursor-pointer';
                card.style.pointerEvents = 'auto';
                card.style.cursor = 'pointer';
                
                const imageContainer = document.createElement('div');
                imageContainer.className = 'relative group overflow-hidden aspect-square bg-gray-100';
                imageContainer.style.pointerEvents = 'none';
                
                const img = document.createElement('img');
                img.src = `/${photo.file}`;
                img.alt = photo.judul_foto || 'Photo';
                img.className = 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500';
                img.style.pointerEvents = 'none';
                
                const overlay = document.createElement('div');
                overlay.className = 'absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-3';
                overlay.style.pointerEvents = 'none';
                overlay.innerHTML = `
                    <div class="flex items-center gap-2 text-white" style="pointer-events: none;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="pointer-events: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                        </svg>
                        <span class="text-sm font-semibold" style="pointer-events: none;">Klik untuk Lihat Full Size</span>
                    </div>
                `;
                
                imageContainer.appendChild(img);
                imageContainer.appendChild(overlay);
                card.appendChild(imageContainer);
                
                if (photo.judul_foto) {
                    const titleDiv = document.createElement('div');
                    titleDiv.className = 'p-2 md:p-3';
                    titleDiv.style.pointerEvents = 'none';
                    const titleP = document.createElement('p');
                    titleP.className = 'text-xs md:text-sm font-semibold text-oxford-navy line-clamp-1';
                    titleP.style.pointerEvents = 'none';
                    titleP.textContent = photo.judul_foto;
                    titleDiv.appendChild(titleP);
                    card.appendChild(titleDiv);
                }
                
                // Add click event - ONLY on card
                card.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('Photo card clicked:', photo.file);
                    console.log('Opening full size image modal...');
                    openImageModal(photo.file, photo.judul_foto || 'Photo', photo.deskripsi_foto || '');
                });
                
                modalPhotos.appendChild(card);
            });
            
            console.log('All photos rendered. Opening modal...');
            
            document.getElementById('galleryModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            console.log('Modal opened successfully!');
        }
        
        // Share current gallery
        function shareCurrentGallery() {
            const gallery = galleries.find(g => g.id_g === currentGalleryId);
            if (!gallery) return;
            
            const title = gallery.post?.judul || 'Gallery';
            const url = `${window.location.origin}/gallery?open=${currentGalleryId}`;
            
            if (navigator.share) {
                navigator.share({
                    title: title,
                    text: `Check out this gallery: ${title}`,
                    url: url
                }).catch(err => console.log('Share cancelled'));
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link copied to clipboard!');
                });
            }
        }
        
        // Download current gallery
        function downloadCurrentGallery() {
            const gallery = galleries.find(g => g.id_g === currentGalleryId);
            if (!gallery || !gallery.fotos || gallery.fotos.length === 0) {
                alert('No photos to download');
                return;
            }
            
            // Download each photo
            gallery.fotos.forEach((photo, index) => {
                setTimeout(() => {
                    const link = document.createElement('a');
                    link.href = `/${photo.file}`;
                    link.download = `${gallery.post?.judul || 'gallery'}-${index + 1}.jpg`;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                }, index * 500); // Delay between downloads
            });
            
            alert(`Downloading ${gallery.fotos.length} photos...`);
        }

        // Close gallery modal
        function closeGalleryModal() {
            document.getElementById('galleryModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', async function() {
            console.log('DOM Content Loaded - Starting initialization');
            
            await checkUserLogin();
            await loadGalleries();
            
            // Setup event listeners
            document.getElementById('searchInput').addEventListener('input', renderGalleries);
            document.getElementById('sortSelect').addEventListener('change', renderGalleries);
            
            // Test: Add click listener to gridView container
            const gridView = document.getElementById('gridView');
            if (gridView) {
                console.log('gridView found, adding test listener');
                gridView.addEventListener('click', function(e) {
                    console.log('gridView clicked!', e.target);
                }, true); // Use capture phase
            } else {
                console.error('gridView NOT found!');
            }
            
            // Check if there's a gallery to open from URL parameter
            const urlParams = new URLSearchParams(window.location.search);
            const openGalleryId = urlParams.get('open');
            if (openGalleryId) {
                console.log('Opening gallery from URL:', openGalleryId);
                setTimeout(() => {
                    openGalleryModal(parseInt(openGalleryId));
                }, 500);
            }
            
            console.log('Initialization complete');
        });
    </script>
</body>
</html>
