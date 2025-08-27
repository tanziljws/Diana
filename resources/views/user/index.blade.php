<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oxford High School - Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --oxford-navy: #0a1f44;
            --oxford-gold: #d4af37;
            --oxford-navy-light: #1a3a5c;
            --oxford-gold-light: #e6c757;
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
        .font-script { font-family: 'Dancing Script', cursive; }
        .bg-oxford-navy { background-color: var(--oxford-navy); }
        .bg-oxford-gold { background-color: var(--oxford-gold); }
        .text-oxford-navy { color: var(--oxford-navy); }
        .text-oxford-gold { color: var(--oxford-gold); }
        .border-oxford-gold { border-color: var(--oxford-gold); }
        .gallery-item {
            transition: all 0.3s ease;
        }
        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Header -->
    <header class="bg-oxford-navy text-white shadow-lg border-b-4 border-oxford-gold">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <img src="/oxford-logo.svg" alt="Oxford High School Logo" class="h-12 w-12">
                    <div>
                        <h1 class="text-2xl font-serif font-bold text-white">Oxford High School</h1>
                        <p class="text-oxford-gold font-medium italic text-sm">Gallery & Information System</p>
                    </div>
                </div>
                <nav class="hidden md:flex items-center space-x-6">
                    <a href="/" class="bg-oxford-gold text-oxford-navy px-4 py-2 rounded-full font-semibold hover:bg-opacity-90 transition-colors">Home</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Hero Section -->
        <section class="bg-white rounded-lg shadow-xl border-t-4 border-oxford-gold p-8 mb-8">
            <div class="text-center">
                <h2 id="hero-title" class="text-4xl font-serif font-bold text-oxford-navy mb-4">Welcome to Our Gallery</h2>
                <p id="hero-subtitle" class="text-xl text-oxford-gold font-script mb-6">Discover the vibrant life at Oxford High School</p>
                <div class="max-w-3xl mx-auto">
                    <p id="hero-description" class="text-gray-600 leading-relaxed">
                        Explore our comprehensive collection of school activities, events, and achievements. 
                        From academic excellence to artistic endeavors, witness the dynamic community that makes Oxford High School special.
                    </p>
                </div>
            </div>
        </section>

        <!-- Navigation Tabs -->
        <div class="bg-white rounded-lg shadow-lg mb-8">
            <div class="border-b border-gray-200">
                <div class="flex space-x-1 bg-white rounded-lg p-1 shadow-lg">
                <button onclick="showTab('galleries')" class="tab-btn px-6 py-3 rounded-lg font-semibold transition-colors bg-oxford-navy text-white" data-tab="galleries">
                    Galleries
                </button>
                <button onclick="showTab('news')" class="tab-btn px-6 py-3 rounded-lg font-semibold transition-colors bg-gray-200 text-gray-700" data-tab="news">
                    News
                </button>
                <button onclick="showTab('agenda')" class="tab-btn px-6 py-3 rounded-lg font-semibold transition-colors bg-gray-200 text-gray-700" data-tab="agenda">
                    Agenda
                </button>
                <button onclick="showTab('categories')" class="tab-btn px-6 py-3 rounded-lg font-semibold transition-colors bg-gray-200 text-gray-700" data-tab="categories">
                    Categories
                </button>
            </div>    
            </div>
        </div>

        <!-- Galleries Section -->
        <section id="galleries-section" class="tab-content">
            <div class="mb-6">
                <h3 class="text-2xl font-serif font-bold text-oxford-navy mb-4">Photo Galleries</h3>
                <div class="flex flex-wrap gap-4 mb-6">
                    <button onclick="filterGalleries('all')" class="filter-btn active bg-oxford-navy text-white px-4 py-2 rounded-full">All</button>
                    <button onclick="filterGalleries('academic')" class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-oxford-gold hover:text-white">Academic</button>
                    <button onclick="filterGalleries('sports')" class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-oxford-gold hover:text-white">Sports</button>
                    <button onclick="filterGalleries('arts')" class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-oxford-gold hover:text-white">Arts</button>
                    <button onclick="filterGalleries('events')" class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-full hover:bg-oxford-gold hover:text-white">Events</button>
                </div>
            </div>
            <div id="galleries-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Galleries will be loaded here -->
            </div>
        </section>

        <!-- News Section -->
        <section id="news-section" class="tab-content hidden">
            <div class="mb-6">
                <h3 class="text-2xl font-serif font-bold text-oxford-navy mb-4">Latest News & Updates</h3>
            </div>
            <div id="news-grid" class="space-y-6">
                <!-- News will be loaded here -->
            </div>
        </section>

        <!-- Agenda Section -->
        <section id="agenda-section" class="tab-content hidden">
            <div class="mb-6">
                <h3 class="text-2xl font-serif font-bold text-oxford-navy mb-4">School Agenda</h3>
            </div>
            <div id="agenda-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Agenda will be loaded here -->
            </div>
        </section>

        <!-- Categories Section -->
        <section id="categories-section" class="tab-content hidden">
            <div class="mb-6">
                <h3 class="text-2xl font-serif font-bold text-oxford-navy mb-4">Content Categories</h3>
                <p class="text-gray-600">Browse content by category to find specific topics and themes.</p>
            </div>
            <div id="categories-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Categories will be loaded here -->
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-oxford-navy text-white py-8 border-t-4 border-oxford-gold">
        <div class="container mx-auto px-6 text-center">
            <div class="flex items-center justify-center mb-4">
                <img src="/oxford-logo.svg" alt="Oxford High School Logo" class="h-10 w-10 mr-3">
                <div>
                    <h3 class="font-serif font-bold text-oxford-gold text-lg">Oxford High School of Technology & Arts</h3>
                    <p class="text-sm text-oxford-gold italic">Sapientia et Innovatio</p>
                </div>
            </div>
            <p class="text-white">&copy; 2024 Oxford High School of Technology & Arts. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Data will be loaded from database
        let galleries = [];
        let news = [];
        let agendas = [];
        let categories = [];

        // Hero content for different tabs
        const heroContent = {
            galleries: {
                title: "Photo Galleries",
                subtitle: "Capturing memorable moments at Oxford High School",
                description: "Browse through our extensive collection of photographs showcasing student life, academic achievements, sports events, and artistic performances. Each gallery tells a unique story of our vibrant school community."
            },
            news: {
                title: "Latest News & Updates",
                subtitle: "Stay informed about upcoming events and activities",
                description: "Keep up with the latest announcements, achievements, and important updates from Oxford High School. From academic milestones to upcoming events, stay connected with our school community."
            },
            agenda: {
                title: "School Agenda",
                subtitle: "Stay informed about upcoming events and activities",
                description: "Keep track of important dates, meetings, and school events. Our agenda helps students, parents, and staff stay organized and never miss important school activities."
            },
            categories: {
                title: "Content Categories",
                subtitle: "Organize and explore content by topic",
                description: "Browse our content organized by categories to easily find specific topics, themes, and subjects that interest you. Each category contains related posts and information."
            }
        };

        // Tab functionality
        function showTab(tabName) {
            // Update hero content
            const content = heroContent[tabName];
            if (content) {
                document.getElementById('hero-title').textContent = content.title;
                document.getElementById('hero-subtitle').textContent = content.subtitle;
                document.getElementById('hero-description').textContent = content.description;
            }
            
            // Hide all sections
            document.querySelectorAll('.tab-content').forEach(section => {
                section.classList.add('hidden');
            });
            
            // Show selected section
            document.getElementById(tabName + '-section').classList.remove('hidden');
            
            // Update tab buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-oxford-navy', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            
            // Add active class to selected tab
            const activeTab = document.querySelector(`[data-tab="${tabName}"]`);
            if (activeTab) {
                activeTab.classList.add('bg-oxford-navy', 'text-white');
                activeTab.classList.remove('bg-gray-200', 'text-gray-700');
            }
        }

        // Filter functionality
        function filterGalleries(category) {
            // Update filter buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-oxford-navy', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            
            event.target.classList.add('active', 'bg-oxford-navy', 'text-white');
            event.target.classList.remove('bg-gray-200', 'text-gray-700');
            
            // Filter galleries
            loadGalleries(category);
        }

        // Load data from API
        async function loadData() {
            try {
                const [galleriesRes, newsRes, agendasRes, categoriesRes] = await Promise.all([
                    fetch('/api/galleries'),
                    fetch('/api/posts'),
                    fetch('/api/agendas'),
                    fetch('/api/kategoris')
                ]);

                galleries = await galleriesRes.json();
                news = await newsRes.json();
                agendas = await agendasRes.json();
                categories = await categoriesRes.json();

                loadGalleries();
                loadNews();
                loadAgenda();
                loadCategories();
            } catch (error) {
                console.error('Error loading data:', error);
                // Show fallback message
                document.getElementById('galleries-grid').innerHTML = '<p class="text-center text-gray-500">Unable to load galleries</p>';
                document.getElementById('news-grid').innerHTML = '<p class="text-center text-gray-500">Unable to load news</p>';
                document.getElementById('agenda-grid').innerHTML = '<p class="text-center text-gray-500">Unable to load agenda</p>';
            }
        }

        // Load galleries
        function loadGalleries(filter = 'all') {
            const galleriesGrid = document.getElementById('galleries-grid');
            const filteredGalleries = filter === 'all' ? galleries : galleries.filter(g => g.category === filter);
            
            if (filteredGalleries.length === 0) {
                galleriesGrid.innerHTML = '<p class="text-center text-gray-500 col-span-full">No galleries found</p>';
                return;
            }

            galleriesGrid.innerHTML = filteredGalleries.map(gallery => `
                <div class="gallery-item bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="${gallery.cover_image || 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=400&h=300&fit=crop'}" alt="${gallery.judul}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h4 class="text-xl font-serif font-bold text-oxford-navy mb-2">${gallery.judul}</h4>
                        <p class="text-gray-600 mb-3">${gallery.deskripsi || 'No description available'}</p>
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span>${new Date(gallery.tanggal).toLocaleDateString()}</span>
                            <span>Gallery</span>
                        </div>
                        <button class="w-full bg-oxford-gold text-oxford-navy py-2 px-4 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                            View Gallery
                        </button>
                    </div>
                </div>
            `).join('');
        }

        // Load news
        function loadNews() {
            const newsGrid = document.getElementById('news-grid');
            
            if (news.length === 0) {
                newsGrid.innerHTML = '<p class="text-center text-gray-500">No news found</p>';
                return;
            }

            newsGrid.innerHTML = news.map(post => `
                <article class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="${post.gambar || post.image || 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=600&h=300&fit=crop'}" alt="${post.judul || post.title}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-oxford-gold text-oxford-navy px-3 py-1 rounded-full text-sm font-semibold">${post.nama_kategori || 'General'}</span>
                            <span class="text-gray-500 text-sm">${new Date(post.created_at).toLocaleDateString()}</span>
                        </div>
                        <h4 class="text-xl font-serif font-bold text-oxford-navy mb-3">${post.judul || post.title}</h4>
                        <p class="text-gray-600">${post.isi || post.content}</p>
                    </div>
                </article>
            `).join('');
        }

        // Load agenda
        function loadAgenda() {
            const agendaGrid = document.getElementById('agenda-grid');
            
            if (agendas.length === 0) {
                agendaGrid.innerHTML = '<p class="text-center text-gray-500">No agenda found</p>';
                return;
            }

            agendaGrid.innerHTML = agendas.map(agenda => `
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-oxford-navy text-white px-3 py-1 rounded-full text-sm font-semibold">Active</span>
                        <span class="text-gray-500 text-sm">${new Date(agenda.tanggal).toLocaleDateString()}</span>
                    </div>
                    <h4 class="text-xl font-serif font-bold text-oxford-navy mb-2">${agenda.judul}</h4>
                    <p class="text-gray-600 mb-4">${agenda.deskripsi || 'No description available'}</p>
                    <div class="space-y-2 text-sm text-gray-500">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
                            </svg>
                            ${agenda.waktu}
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/>
                            </svg>
                            ${agenda.tempat}
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Load categories
        function loadCategories() {
            const categoriesGrid = document.getElementById('categories-grid');
            
            if (categories.length === 0) {
                categoriesGrid.innerHTML = '<p class="text-center text-gray-500">No categories found</p>';
                return;
            }

            categoriesGrid.innerHTML = categories.map(category => `
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-oxford-gold rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"/>
                            </svg>
                        </div>
                        <span class="text-sm text-gray-500">Category</span>
                    </div>
                    <h4 class="text-xl font-serif font-bold text-oxford-navy mb-2">${category.nama_kategori}</h4>
                    <p class="text-gray-600 mb-4">${category.deskripsi || 'No description available'}</p>
                    <button class="w-full bg-oxford-navy text-white py-2 px-4 rounded-lg font-semibold hover:bg-opacity-90 transition-colors">
                        View Posts
                    </button>
                </div>
            `).join('');
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadData();
        });
    </script>
</body>
</html>
