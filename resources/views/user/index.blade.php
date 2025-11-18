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
        .bg-oxford-navy-light { background-color: var(--oxford-navy-light); }
        
        .gallery-item {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }
        .gallery-item:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(10, 31, 68, 0.25);
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, var(--oxford-navy) 0%, var(--oxford-navy-light) 50%, var(--oxford-gold) 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .tab-btn.active {
            background: linear-gradient(135deg, var(--oxford-navy), var(--oxford-navy-light));
            color: var(--oxford-gold);
            box-shadow: 0 8px 25px rgba(10, 31, 68, 0.3);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .sparkle {
            position: relative;
            overflow: hidden;
        }
        
        .sparkle::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(212, 175, 55, 0.1), transparent);
            transform: rotate(45deg);
            animation: sparkle 3s linear infinite;
        }
        
        @keyframes sparkle {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
    </style>
</head>
<body class="font-sans bg-gradient-to-br from-gray-50 via-white to-gray-100 min-h-screen">
    <!-- Header -->
    <header class="hero-gradient text-white shadow-2xl relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="container mx-auto px-6 py-6 relative z-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <div class="w-16 h-16 bg-oxford-gold rounded-full flex items-center justify-center shadow-xl floating-animation">
                            <svg class="w-8 h-8 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-6 h-6 bg-white rounded-full flex items-center justify-center">
                            <div class="w-3 h-3 bg-oxford-gold rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-3xl font-serif font-bold text-white mb-1">Oxford High School</h1>
                        <p class="text-oxford-gold font-medium italic text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                            </svg>
                            Gallery & Information System
                        </p>
                    </div>
                </div>
                <nav class="hidden md:flex items-center space-x-4">
                    <a href="/" class="glass-effect text-oxford-navy px-6 py-3 rounded-full font-semibold hover:bg-white transition-all duration-300 transform hover:scale-105 shadow-lg sparkle">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Home
                    </a>
                </nav>
            </div>
        </div>
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-oxford-gold/10 rounded-full -translate-y-32 translate-x-32"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-24 -translate-x-24"></div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12">
        <!-- Hero Section -->
        <section class="glass-effect rounded-3xl shadow-2xl p-12 mb-12 relative overflow-hidden sparkle">
            <div class="absolute inset-0 bg-gradient-to-br from-oxford-navy/5 via-transparent to-oxford-gold/5"></div>
            <div class="text-center relative z-10">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-oxford-navy to-oxford-navy-light rounded-full mb-6 floating-animation">
                    <svg class="w-10 h-10 text-oxford-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h2 id="hero-title" class="text-5xl font-serif font-bold text-oxford-navy mb-6">Welcome to Our Gallery</h2>
                <p id="hero-subtitle" class="text-2xl text-oxford-gold font-script mb-8">Discover the vibrant life at Oxford High School</p>
                <div class="max-w-4xl mx-auto">
                    <p id="hero-description" class="text-lg text-gray-600 leading-relaxed">
                        Explore our comprehensive collection of school activities, events, and achievements. 
                        From academic excellence to artistic endeavors, witness the dynamic community that makes Oxford High School special.
                    </p>
                </div>
            </div>
            <!-- Decorative elements -->
            <div class="absolute top-4 right-4 w-32 h-32 bg-oxford-gold/10 rounded-full"></div>
            <div class="absolute bottom-4 left-4 w-24 h-24 bg-oxford-navy/5 rounded-full"></div>
        </section>

        <!-- Navigation Tabs -->
        <div class="glass-effect rounded-2xl shadow-xl mb-12 overflow-hidden">
            <div class="p-2">
                <div class="flex flex-wrap gap-2 justify-center">
                    <button onclick="showTab('galleries')" class="tab-btn px-8 py-4 rounded-xl font-bold transition-all duration-300 transform hover:scale-105 active flex items-center space-x-3" data-tab="galleries">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                        </svg>
                        <span>Galleries</span>
                    </button>
                    <button onclick="showTab('news')" class="tab-btn px-8 py-4 rounded-xl font-bold transition-all duration-300 transform hover:scale-105 bg-white/50 text-oxford-navy hover:bg-oxford-gold/20 flex items-center space-x-3" data-tab="news">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"></path>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                        </svg>
                        <span>News</span>
                    </button>
                    <button onclick="showTab('agenda')" class="tab-btn px-8 py-4 rounded-xl font-bold transition-all duration-300 transform hover:scale-105 bg-white/50 text-oxford-navy hover:bg-oxford-gold/20 flex items-center space-x-3" data-tab="agenda">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"></path>
                        </svg>
                        <span>Agenda</span>
                    </button>
                    <button onclick="showTab('categories')" class="tab-btn px-8 py-4 rounded-xl font-bold transition-all duration-300 transform hover:scale-105 bg-white/50 text-oxford-navy hover:bg-oxford-gold/20 flex items-center space-x-3" data-tab="categories">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                        </svg>
                        <span>Categories</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Galleries Section -->
        <section id="galleries-section" class="tab-content">
            <div class="glass-effect rounded-2xl p-8 mb-8 shadow-xl">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-oxford-navy to-oxford-navy-light rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-serif font-bold text-oxford-navy">Photo Galleries</h3>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3 mb-8">
                    <button onclick="filterGalleries('all')" class="filter-btn active bg-gradient-to-r from-oxford-navy to-oxford-navy-light text-oxford-gold px-6 py-3 rounded-full font-semibold shadow-lg transform hover:scale-105 transition-all duration-300">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path>
                        </svg>
                        All
                    </button>
                    <button onclick="filterGalleries('academic')" class="filter-btn glass-effect text-oxford-navy px-6 py-3 rounded-full font-semibold hover:bg-oxford-gold hover:text-white transition-all duration-300 transform hover:scale-105">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                        </svg>
                        Academic
                    </button>
                    <button onclick="filterGalleries('sports')" class="filter-btn glass-effect text-oxford-navy px-6 py-3 rounded-full font-semibold hover:bg-oxford-gold hover:text-white transition-all duration-300 transform hover:scale-105">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path>
                        </svg>
                        Sports
                    </button>
                    <button onclick="filterGalleries('arts')" class="filter-btn glass-effect text-oxford-navy px-6 py-3 rounded-full font-semibold hover:bg-oxford-gold hover:text-white transition-all duration-300 transform hover:scale-105">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                        </svg>
                        Arts
                    </button>
                    <button onclick="filterGalleries('events')" class="filter-btn glass-effect text-oxford-navy px-6 py-3 rounded-full font-semibold hover:bg-oxford-gold hover:text-white transition-all duration-300 transform hover:scale-105">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"></path>
                        </svg>
                        Events
                    </button>
                </div>
            </div>
            <div id="galleries-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Galleries will be loaded here -->
            </div>
        </section>

        <!-- News Section -->
        <section id="news-section" class="tab-content hidden">
            <div class="glass-effect rounded-2xl p-8 mb-8 shadow-xl">
                <div class="flex items-center space-x-4 mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-oxford-navy to-oxford-navy-light rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"></path>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-serif font-bold text-oxford-navy">Latest News & Updates</h3>
                </div>
            </div>
            <div id="news-grid" class="space-y-8">
                <!-- News will be loaded here -->
            </div>
        </section>

        <!-- Agenda Section -->
        <section id="agenda-section" class="tab-content hidden">
            <div class="glass-effect rounded-2xl p-8 mb-8 shadow-xl">
                <div class="flex items-center space-x-4 mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-oxford-navy to-oxford-navy-light rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-3xl font-serif font-bold text-oxford-navy">School Agenda</h3>
                        <p class="text-oxford-gold font-medium">Upcoming events and important dates</p>
                    </div>
                </div>
            </div>
            <div id="agenda-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Agenda will be loaded here -->
            </div>
        </section>

        <!-- Categories Section -->
        <section id="categories-section" class="tab-content hidden">
            <div class="glass-effect rounded-2xl p-8 mb-8 shadow-xl">
                <div class="flex items-center space-x-4 mb-8">
                    <div class="w-12 h-12 bg-gradient-to-br from-oxford-navy to-oxford-navy-light rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-3xl font-serif font-bold text-oxford-navy">Content Categories</h3>
                        <p class="text-oxford-gold font-medium">Browse content by topic and theme</p>
                    </div>
                </div>
            </div>
            <div id="categories-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Categories will be loaded here -->
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="hero-gradient text-white py-12 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="flex items-center justify-center mb-6">
                <div class="w-16 h-16 bg-oxford-gold rounded-full flex items-center justify-center shadow-xl mr-4 floating-animation">
                    <svg class="w-8 h-8 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="font-serif font-bold text-white text-2xl mb-1">Oxford High School of Technology & Arts</h3>
                    <p class="text-oxford-gold font-medium italic">Sapientia et Innovatio</p>
                </div>
            </div>
            <div class="glass-effect rounded-2xl p-6 max-w-2xl mx-auto mb-6">
                <p class="text-oxford-navy font-medium">Empowering minds, inspiring innovation, building tomorrow's leaders through excellence in education and character development.</p>
            </div>
            <p class="text-white/80">&copy; 2024 Oxford High School of Technology & Arts. All rights reserved.</p>
        </div>
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-48 h-48 bg-oxford-gold/10 rounded-full -translate-y-24 -translate-x-24"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/5 rounded-full translate-y-32 translate-x-32"></div>
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
                btn.classList.remove('active');
                btn.className = 'tab-btn px-8 py-4 rounded-xl font-bold transition-all duration-300 transform hover:scale-105 bg-white/50 text-oxford-navy hover:bg-oxford-gold/20 flex items-center space-x-3';
            });
            
            // Add active class to selected tab
            const activeTab = document.querySelector(`[data-tab="${tabName}"]`);
            if (activeTab) {
                activeTab.classList.add('active');
                activeTab.className = 'tab-btn px-8 py-4 rounded-xl font-bold transition-all duration-300 transform hover:scale-105 active flex items-center space-x-3';
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

            newsGrid.innerHTML = news.map(post => {
                // Construct proper image URL
                let imageUrl = 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=600&h=300&fit=crop';
                if (post.gambar || post.image) {
                    const imagePath = post.gambar || post.image;
                    // Check if it's already a full URL
                    if (imagePath.startsWith('http')) {
                        imageUrl = imagePath;
                    } else {
                        // Construct URL for uploaded images
                        imageUrl = `/uploads/posts/${imagePath}`;
                    }
                }
                
                return `
                <article class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="${imageUrl}" alt="${post.judul || post.title}" class="w-full h-48 object-cover" onerror="this.src='https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=600&h=300&fit=crop'">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-oxford-gold text-oxford-navy px-3 py-1 rounded-full text-sm font-semibold">${post.nama_kategori || 'General'}</span>
                            <span class="text-gray-500 text-sm">${new Date(post.created_at).toLocaleDateString()}</span>
                        </div>
                        <h4 class="text-xl font-serif font-bold text-oxford-navy mb-3">${post.judul || post.title}</h4>
                        <p class="text-gray-600">${post.isi || post.content}</p>
                    </div>
                </article>
                `;
            }).join('');
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
