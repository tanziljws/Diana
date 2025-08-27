<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oxford High School of Technology & Arts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --oxford-navy: #0a1f44;
            --oxford-gold: #d4af37;
            --oxford-navy-light: #1a3a5c;
            --oxford-gold-light: #e6c757;
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
        .bg-oxford-dark { background-color: var(--oxford-dark); }
        .bg-oxford-dark-light { background-color: var(--oxford-dark-light); }
        .text-oxford-navy { color: var(--oxford-navy); }
        .text-oxford-gold { color: var(--oxford-gold); }
        .text-oxford-dark { color: var(--oxford-dark); }
        .text-oxford-accent { color: var(--oxford-accent); }
        .border-oxford-gold { border-color: var(--oxford-gold); }
        .bg-oxford-navy-light { background-color: var(--oxford-navy-light); }
        .dark-gradient-bg {
            background: linear-gradient(135deg, var(--oxford-dark) 0%, var(--oxford-navy) 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .neon-glow {
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
        }
        .text-gradient {
            background: linear-gradient(135deg, var(--oxford-gold), #f59e0b, #fbbf24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .magical-sparkle {
            position: relative;
            overflow: hidden;
        }
        .magical-sparkle::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: sparkle 3s infinite;
        }
        @keyframes sparkle {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        .glitter-effect {
            position: relative;
            overflow: hidden;
        }
        .glitter-effect::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(255, 215, 0, 0.3) 2px, transparent 2px),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.3) 1px, transparent 1px),
                radial-gradient(circle at 40% 40%, rgba(212, 175, 55, 0.2) 1px, transparent 1px);
            background-size: 50px 50px, 30px 30px, 70px 70px;
            animation: glitter 4s ease-in-out infinite;
            pointer-events: none;
        }
        @keyframes glitter {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .pulse-glow {
            animation: pulseGlow 2s ease-in-out infinite alternate;
        }
        @keyframes pulseGlow {
            from { box-shadow: 0 0 20px rgba(212, 175, 55, 0.3); }
            to { box-shadow: 0 0 30px rgba(212, 175, 55, 0.6), 0 0 40px rgba(212, 175, 55, 0.3); }
        }
        .magical-border {
            position: relative;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #ffeaa7, #dda0dd);
            background-size: 400% 400%;
            animation: gradientShift 4s ease infinite;
            padding: 2px;
            border-radius: 50px;
        }
        .magical-border-inner {
            background: white;
            border-radius: 48px;
            padding: 12px 24px;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .subtle-glow {
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
        }
        .subtle-glow:hover {
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }
    </style>
</head>
<body class="dark-gradient-bg font-sans">
    <!-- Header -->
    <header class="bg-oxford-navy shadow-lg border-b-4 border-oxford-gold">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex items-center space-x-4">
                    <img src="/oxford-logo.svg" alt="Oxford High School Logo" class="h-12 w-12">
                    <div>
                        <h1 class="text-2xl font-serif font-bold text-white">Oxford High School of Technology & Arts</h1>
                        <p class="text-oxford-gold text-sm italic">Sapientia et Innovatio</p>
                    </div>
                </div>
                <nav class="flex items-center space-x-4">
                    <a href="#berita" class="group relative px-3 py-2 text-white hover:text-oxford-gold transition-all duration-300 font-medium">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                        </svg>
                        Berita
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-oxford-gold group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#galeri" class="group relative px-3 py-2 text-white hover:text-oxford-gold transition-all duration-300 font-medium">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                        </svg>
                        Galeri
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-oxford-gold group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#agenda" class="group relative px-3 py-2 text-white hover:text-oxford-gold transition-all duration-300 font-medium">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        Agenda
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-oxford-gold group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#profil" class="group relative px-3 py-2 text-white hover:text-oxford-gold transition-all duration-300 font-medium">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                        </svg>
                        Profil
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-oxford-gold group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <div class="h-6 w-px bg-oxford-gold opacity-30 mx-2"></div>
                    <a href="/" class="bg-gradient-to-r from-oxford-gold to-yellow-400 px-4 py-2 rounded-full hover:shadow-lg font-semibold transition-all duration-300 transform hover:scale-105 text-sm" style="color: #ffffff !important; text-decoration: none;">
                        <svg class="w-3 h-3 inline mr-1" fill="#ffffff" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0L3.586 10l4.707-4.707a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                        </svg>
                        Homepage
                    </a>
                </nav>
            </div>
        </div>
    </header>

        <!-- Hero Section -->
        <section class="dark-gradient-bg text-white py-20 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-oxford-dark via-oxford-navy to-gray-900 opacity-95"></div>
            <div class="container mx-auto px-6 text-center relative z-10">
                <div class="flex items-center justify-center mb-8">
                    <img src="/oxford-logo.svg" alt="Oxford Logo" class="h-20 w-20 mr-4 neon-glow self-start mt-2">
                    <div class="text-left">
                        <h1 class="text-6xl font-serif font-bold text-white mb-4">Welcome to Oxford High School</h1>
                        <p class="text-2xl text-oxford-gold font-script">of Technology & Arts</p>
                    </div>
                </div>
                <p class="text-xl mb-12 max-w-3xl mx-auto opacity-90 font-sans leading-relaxed">
                    ✨ Mengembangkan potensi siswa melalui pendidikan berkualitas tinggi dengan teknologi terdepan dan seni yang inspiratif ✨
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                    <div class="glass-effect rounded-xl p-8 hover:neon-glow transition-all duration-300 transform hover:-translate-y-1 subtle-glow">
                        <div class="text-oxford-gold mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <h4 class="font-serif font-bold text-xl mb-3 text-oxford-gold">Excellence</h4>
                        <p class="text-sm opacity-90">Keunggulan akademik dan karakter yang terintegrasi dengan standar internasional</p>
                    </div>
                    <div class="glass-effect rounded-xl p-8 hover:neon-glow transition-all duration-300 transform hover:-translate-y-1 subtle-glow">
                        <div class="text-oxford-gold mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h4 class="font-serif font-bold text-xl mb-3 text-oxford-gold">Innovation</h4>
                        <p class="text-sm opacity-90">Inovasi teknologi AI dan digital untuk masa depan yang cerah</p>
                    </div>
                    <div class="glass-effect rounded-xl p-8 hover:neon-glow transition-all duration-300 transform hover:-translate-y-1 subtle-glow">
                        <div class="text-oxford-gold mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h4 class="font-serif font-bold text-xl mb-3 text-oxford-gold">Achievement</h4>
                        <p class="text-sm opacity-90">Prestasi gemilang di berbagai kompetisi nasional dan internasional</p>
                    </div>
                </div>
            </div>
        </section>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gradient-to-b from-gray-50 to-white">
        <!-- Berita Section -->
        <section id="berita" class="mb-20">
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-oxford-gold to-yellow-500 rounded-full mb-6 shadow-2xl">
                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                        <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V9a1 1 0 00-1-1h-1v3a2 2 0 01-2 2H4.5a1.5 1.5 0 010-3H9V7H8a2 2 0 00-2 2v.5a1.5 1.5 0 11-3 0V9a5 5 0 015-5h7z"/>
                    </svg>
                </div>
                <h2 class="text-5xl font-serif font-bold text-oxford-navy mb-4 magical-sparkle">✨ Berita Terbaru ✨</h2>
                <p class="text-xl text-oxford-accent max-w-2xl mx-auto font-medium">Informasi terkini seputar kegiatan dan prestasi Oxford High School</p>
                <div class="mt-8">
                    <button onclick="loadPosts()" class="bg-gradient-to-r from-oxford-navy to-oxford-navy-light text-white px-8 py-4 rounded-full font-semibold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/>
                        </svg>
                        Refresh Berita
                    </button>
                </div>
            </div>
            <div id="postsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Posts will be loaded here -->
            </div>
        </section>

        <!-- Galeri Section -->
        <section id="galeri" class="mb-20 bg-gradient-to-br from-oxford-dark to-oxford-navy rounded-3xl p-12 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-900/20 to-purple-900/20"></div>
            <div class="relative z-10">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-oxford-gold to-yellow-500 rounded-full mb-6 shadow-2xl">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h2 class="text-5xl font-serif font-bold text-oxford-gold mb-4 magical-sparkle">✨ Galeri Foto ✨</h2>
                    <p class="text-xl opacity-90 max-w-2xl mx-auto font-medium">Dokumentasi momen-momen berharga dalam perjalanan pendidikan</p>
                    <div class="mt-8">
                        <button onclick="loadGalleries()" class="bg-gradient-to-r from-oxford-gold to-yellow-500 text-oxford-navy px-8 py-4 rounded-full font-semibold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/>
                            </svg>
                            Lihat Galeri
                        </button>
                    </div>
                </div>
                <div id="galleriesContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Galleries will be loaded here -->
                </div>
            </div>
        </section>

        <!-- Agenda Section -->
        <section id="agenda" class="mb-20">
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-oxford-navy to-blue-800 rounded-full mb-6 shadow-2xl">
                    <svg class="w-10 h-10 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h2 class="text-5xl font-serif font-bold text-oxford-navy mb-4 magical-sparkle">✨ Agenda Kegiatan ✨</h2>
                <p class="text-xl text-oxford-accent max-w-2xl mx-auto font-medium">Jadwal kegiatan dan acara penting yang akan datang</p>
                <div class="mt-8">
                    <button onclick="loadAgendas()" class="bg-gradient-to-r from-oxford-navy to-oxford-navy-light text-white px-8 py-4 rounded-full font-semibold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        Lihat Agenda
                    </button>
                </div>
            </div>
            <div id="agendasContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Agendas will be loaded here -->
            </div>
        </section>

        <!-- Profil Section -->
        <section id="profil" class="mb-20 bg-gradient-to-r from-oxford-gold to-yellow-500 rounded-3xl p-12 text-oxford-navy relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/20 to-orange-500/20"></div>
            <div class="relative z-10">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-oxford-navy rounded-full mb-6 shadow-2xl">
                        <svg class="w-10 h-10 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                    </div>
                    <h2 class="text-5xl font-serif font-bold mb-4 magical-sparkle">✨ Profil Sekolah ✨</h2>
                    <p class="text-xl opacity-90 max-w-2xl mx-auto font-medium">Mengenal lebih dekat visi, misi, dan nilai-nilai Oxford High School</p>
                    <div class="mt-8">
                        <button onclick="loadProfiles()" class="bg-oxford-navy text-oxford-gold px-8 py-4 rounded-full font-semibold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                            </svg>
                            Lihat Profil
                        </button>
                    </div>
                </div>
                <div id="profilesContainer" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Profiles will be loaded here -->
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-oxford-navy text-white py-12 border-t-4 border-oxford-gold">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-6">
                    <img src="/oxford-logo.svg" alt="Oxford High School Logo" class="h-16 w-16 mr-4">
                    <div>
                        <h3 class="font-serif font-bold text-oxford-gold text-xl">Oxford High School of Technology & Arts</h3>
                        <p class="text-oxford-gold italic">Sapientia et Innovatio</p>
                    </div>
                </div>
                <p class="text-white mb-2">&copy; 2024 Oxford High School of Technology & Arts. All rights reserved.</p>
                <p class="text-oxford-gold">Sistem Informasi Galeri Sekolah - Laravel 12</p>
            </div>
        </div>
    </footer>

    <script>
        // Set base URL for API
        axios.defaults.baseURL = window.location.origin;

        // Load data on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadData();
        });

        // Load all data
        async function loadData() {
            await Promise.all([
                loadPosts(),
                loadGalleries(),
                loadAgendas(),
                loadProfiles()
            ]);
        }

        // Load posts
        async function loadPosts() {
            try {
                const response = await axios.get('/api/posts');
                const posts = response.data.data;
                
                const postsHtml = posts.map(post => `
                    <div class="bg-white rounded-2xl shadow-2xl border-t-4 border-oxford-gold overflow-hidden hover:shadow-3xl transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 group">
                        <div class="relative">
                            ${post.gambar ? `<img src="${post.gambar}" alt="${post.judul}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">` : `<div class="w-full h-48 bg-gradient-to-br from-oxford-navy to-oxford-gold flex items-center justify-center"><svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/></svg></div>`}
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 text-xs font-bold rounded-full ${post.status === 'published' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white'} shadow-lg">
                                    ${post.status === 'published' ? 'PUBLISHED' : 'DRAFT'}
                                </span>
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center mb-4">
                                <svg class="w-5 h-5 text-oxford-gold mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-semibold text-oxford-gold bg-oxford-gold bg-opacity-10 px-3 py-1 rounded-full">${post.kategori ? post.kategori.kategori : 'Uncategorized'}</span>
                            </div>
                            <h3 class="text-2xl font-serif font-bold text-oxford-navy mb-4 group-hover:text-oxford-gold transition-colors">${post.judul}</h3>
                            <p class="text-gray-700 mb-6 leading-relaxed line-clamp-3">${post.konten.substring(0, 150)}...</p>
                            <a href="/" class="bg-gradient-to-r from-oxford-gold to-yellow-400 px-4 py-2 rounded-full hover:shadow-lg font-semibold transition-all duration-300 transform hover:scale-105 text-sm" style="color: #ffffff !important; text-decoration: none;">
                        <svg class="w-3 h-3 inline mr-1" fill="#ffffff" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0L3.586 10l4.707-4.707a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                        </svg>
                        Homepage
                    </a>
                            <button class="bg-gradient-to-r from-oxford-navy to-oxford-navy-light text-white px-6 py-3 rounded-full font-semibold text-sm hover:shadow-xl transform hover:scale-105 transition-all duration-300 w-full">
                                <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10 9.586l3.707 3.707a1 1 0 011.414 0l4-4a1 1 0 010-1.414l-4-4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Baca Selengkapnya
                            </button>
                        </div>
                    </div>
                `).join('');
                
                document.getElementById('postsContainer').innerHTML = postsHtml;
            } catch (error) {
                console.error('Error loading posts:', error);
                document.getElementById('postsContainer').innerHTML = '<p class="text-gray-500">Gagal memuat berita</p>';
            }
        }

        // Load galleries
        async function loadGalleries() {
            try {
                const response = await axios.get('/api/galleries');
                const galleries = response.data.data;
                
                const galleriesHtml = galleries.map(gallery => `
                    <div class="bg-white rounded-2xl shadow-2xl border-t-4 border-oxford-gold overflow-hidden hover:shadow-3xl transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 group">
                        <div class="relative">
                            ${gallery.cover_image ? `<img src="${gallery.cover_image}" alt="Gallery ${gallery.id_g}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">` : `<div class="w-full h-48 bg-gradient-to-br from-purple-600 to-blue-600 flex items-center justify-center"><svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg></div>`}
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 text-xs font-bold rounded-full ${gallery.status === 'active' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'} shadow-lg">
                                    ${gallery.status === 'active' ? 'ACTIVE' : 'INACTIVE'}
                                </span>
                            </div>
                            <div class="absolute bottom-4 left-4">
                                <div class="flex items-center bg-black bg-opacity-50 text-white px-3 py-1 rounded-full text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                    </svg>
                                    ${gallery.fotos ? gallery.fotos.length : 0} photos
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center mb-4">
                                <svg class="w-5 h-5 text-oxford-gold mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-semibold text-oxford-gold bg-oxford-gold bg-opacity-10 px-3 py-1 rounded-full">Gallery Collection</span>
                            </div>
                            <h3 class="text-2xl font-serif font-bold text-oxford-navy mb-4 group-hover:text-oxford-gold transition-colors">${gallery.judul || `Gallery #${gallery.id_g}`}</h3>
                            <p class="text-gray-700 mb-6 leading-relaxed">${gallery.deskripsi || (gallery.post ? gallery.post.judul : 'Koleksi foto kegiatan sekolah')}</p>
                            <button class="bg-gradient-to-r from-oxford-gold to-yellow-500 text-oxford-navy px-6 py-3 rounded-full font-semibold text-sm hover:shadow-xl transform hover:scale-105 transition-all duration-300 w-full">
                                <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                </svg>
                                Lihat Galeri
                            </button>
                        </div>
                    </div>
                `).join('');
                
                document.getElementById('galleriesContainer').innerHTML = galleriesHtml;
            } catch (error) {
                console.error('Error loading galleries:', error);
                document.getElementById('galleriesContainer').innerHTML = '<p class="text-gray-500">Gagal memuat galeri</p>';
            }
        }

        // Load agendas
        async function loadAgendas() {
            try {
                const response = await axios.get('/api/agendas');
                const agendas = response.data.data;
                
                const agendasHtml = agendas.map(agenda => `
                    <div class="bg-white rounded-2xl shadow-2xl border-t-4 border-oxford-gold overflow-hidden hover:shadow-3xl transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 group">
                        <div class="relative">
                            <div class="w-full h-48 bg-gradient-to-br from-oxford-navy to-blue-800 flex items-center justify-center">
                                <div class="text-center text-white">
                                    <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                    <div class="text-2xl font-bold">${new Date(agenda.tanggal).getDate()}</div>
                                    <div class="text-sm opacity-90">${new Date(agenda.tanggal).toLocaleDateString('id-ID', { month: 'short', year: 'numeric' })}</div>
                                </div>
                            </div>
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 text-xs font-bold rounded-full ${agenda.status === 'active' ? 'bg-green-500 text-white' : agenda.status === 'completed' ? 'bg-blue-500 text-white' : 'bg-red-500 text-white'} shadow-lg">
                                    ${agenda.status === 'active' ? 'ACTIVE' : agenda.status === 'completed' ? 'COMPLETED' : 'CANCELLED'}
                                </span>
                            </div>
                            ${agenda.waktu ? `<div class="absolute bottom-4 left-4"><div class="flex items-center bg-black bg-opacity-50 text-white px-3 py-1 rounded-full text-sm"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>${agenda.waktu}</div></div>` : ''}
                        </div>
                        <div class="p-8">
                            <div class="flex items-center mb-4">
                                <svg class="w-5 h-5 text-oxford-gold mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-semibold text-oxford-gold bg-oxford-gold bg-opacity-10 px-3 py-1 rounded-full">${agenda.lokasi || 'Oxford High School'}</span>
                            </div>
                            <h3 class="text-2xl font-serif font-bold text-oxford-navy mb-4 group-hover:text-oxford-gold transition-colors">${agenda.judul}</h3>
                            <p class="text-gray-700 mb-6 leading-relaxed line-clamp-3">${agenda.deskripsi}</p>
                            <button class="bg-gradient-to-r from-oxford-navy to-oxford-navy-light text-white px-6 py-3 rounded-full font-semibold text-sm hover:shadow-xl transform hover:scale-105 transition-all duration-300 w-full">
                                <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                Detail Agenda
                            </button>
                        </div>
                    </div>
                `).join('');
                
                document.getElementById('agendasContainer').innerHTML = agendasHtml;
            } catch (error) {
                console.error('Error loading agendas:', error);
                document.getElementById('agendasContainer').innerHTML = '<p class="text-gray-500">Gagal memuat agenda</p>';
            }
        }

        // Load profiles
        async function loadProfiles() {
            try {
                const response = await axios.get('/api/profiles');
                const profiles = response.data.data;
                
                const profilesHtml = profiles.map(profile => `
                    <div class="bg-white rounded-2xl shadow-2xl border-t-4 border-oxford-gold overflow-hidden hover:shadow-3xl transform hover:-translate-y-2 hover:scale-105 transition-all duration-300 group">
                        <div class="relative">
                            <div class="w-full h-48 bg-gradient-to-br from-oxford-gold to-yellow-500 flex items-center justify-center">
                                <svg class="w-20 h-20 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-oxford-navy text-oxford-gold shadow-lg">
                                    PROFILE
                                </span>
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center mb-4">
                                <svg class="w-5 h-5 text-oxford-gold mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-semibold text-oxford-gold bg-oxford-gold bg-opacity-10 px-3 py-1 rounded-full">Staff Profile</span>
                            </div>
                            <h3 class="text-2xl font-serif font-bold text-oxford-navy mb-4 group-hover:text-oxford-gold transition-colors">${profile.nama}</h3>
                            <div class="flex items-center text-gray-600 mb-6">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                </svg>
                                ${profile.email}
                            </div>
                            <button class="bg-gradient-to-r from-oxford-gold to-yellow-500 text-oxford-navy px-6 py-3 rounded-full font-semibold text-sm hover:shadow-xl transform hover:scale-105 transition-all duration-300 w-full">
                                <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                `).join('');
                
                document.getElementById('profilesContainer').innerHTML = profilesHtml;
            } catch (error) {
                console.error('Error loading profiles:', error);
                document.getElementById('profilesContainer').innerHTML = '<p class="text-gray-500">Gagal memuat profil</p>';
            }
        }

        // Back to home function
        function goHome() {
            window.location.href = '/';
        }
    </script>
</body>
</html>
