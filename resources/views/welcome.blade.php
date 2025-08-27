<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oxford High School - Galeri Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        .text-oxford-navy { color: var(--oxford-navy); }
        .text-oxford-gold { color: var(--oxford-gold); }
        .border-oxford-gold { border-color: var(--oxford-gold); }
        .bg-oxford-navy-light { background-color: var(--oxford-navy-light); }
        .text-gradient {
            background: linear-gradient(135deg, var(--oxford-gold), #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .neon-glow {
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.4);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .subtle-glow {
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
        }
        .subtle-glow:hover {
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }
    </style>
</head>
<body class="font-sans">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-oxford-navy text-white shadow-lg border-b-4 border-oxford-gold">
            <div class="container mx-auto px-6 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <img src="/oxford-logo.svg" alt="Oxford High School Logo" class="h-16 w-16">
                        <div>
                            <h1 class="text-3xl font-serif font-bold text-white">Oxford High School of Technology & Arts</h1>
                            <p class="text-oxford-gold font-medium italic">Sapientia et Innovatio</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="/admin/login" class="bg-white hover:bg-gray-50 px-6 py-3 rounded-full transition-all duration-300 font-semibold border-2 border-oxford-gold shadow-lg hover:shadow-xl transform hover:scale-105" style="color: #0a1f44 !important; text-decoration: none;">
                            <svg class="w-4 h-4 inline mr-2" fill="#0a1f44" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                            </svg>
                            Admin Login
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto px-6 py-8">
            <!-- Hero Section -->
            <div class="bg-white rounded-lg shadow-xl border-t-4 border-oxford-gold p-12 mb-8">
                <div class="text-center">
                    <h2 class="text-6xl font-serif font-bold text-oxford-navy mb-6">Welcome to Oxford High School</h2>
                    <p class="text-3xl text-oxford-gold font-script mb-2">of Technology & Arts</p>
                    <p class="text-2xl text-oxford-gold font-serif italic mb-8">"Sapientia et Innovatio"</p>
                    <div class="max-w-3xl mx-auto">
                        <div class="bg-gradient-to-r from-oxford-navy to-blue-900 text-white p-8 rounded-lg mb-8 shadow-lg">
                            <h3 class="font-serif font-bold text-2xl mb-4 text-oxford-gold">Welcome!</h3>
                            <p class="text-lg mb-4">Sistem Informasi Galeri Sekolah Oxford High School of Technology & Arts</p>
                            <p class="text-sm opacity-90">Klik tombol "Masuk ke Website" di header untuk mengakses galeri dan informasi sekolah</p>
                        </div>
                        <div class="text-center mb-8">
                            <a href="/user" class="bg-oxford-gold text-oxford-navy px-8 py-3 rounded-full font-semibold hover:bg-opacity-90 transition-colors inline-flex items-center">
                                Explore Website
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                            <div class="bg-oxford-navy text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 subtle-glow">
                                <div class="text-oxford-gold mb-3">
                                    <svg class="w-12 h-12 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                                    </svg>
                                </div>
                                <h4 class="font-serif font-bold text-lg mb-2 text-oxford-gold">Academic Excellence</h4>
                                <p class="text-sm opacity-90">Program akademik berkualitas tinggi dengan standar internasional</p>
                            </div>
                            <div class="bg-oxford-gold text-oxford-navy p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <div class="text-oxford-navy mb-3">
                                    <svg class="w-12 h-12 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <h4 class="font-serif font-bold text-lg mb-2">Arts & Technology</h4>
                                <p class="text-sm">Pengembangan kreativitas melalui seni dan teknologi modern</p>
                            </div>
                            <div class="bg-oxford-navy text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 subtle-glow">
                                <div class="text-oxford-gold mb-3">
                                    <svg class="w-12 h-12 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <h4 class="font-serif font-bold text-lg mb-2 text-oxford-gold">Achievement</h4>
                                <p class="text-sm opacity-90">Prestasi gemilang di berbagai kompetisi nasional dan internasional</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>

        <!-- Footer -->
        <footer class="bg-oxford-navy text-white py-8 border-t-4 border-oxford-gold">
            <div class="container mx-auto px-6 text-center">
                <div class="flex items-center justify-center mb-4">
                    <img src="/oxford-logo.svg" alt="Oxford High School Logo" class="h-12 w-12 mr-3">
                    <div>
                        <h3 class="font-serif font-bold text-oxford-gold text-lg">Oxford High School of Technology & Arts</h3>
                        <p class="text-sm text-oxford-gold italic">Sapientia et Innovatio</p>
                    </div>
                </div>
                <p class="text-white">&copy; 2024 Oxford High School of Technology & Arts. All rights reserved.</p>
                <p class="text-sm text-oxford-gold mt-2">Laravel 12 API - Sistem Informasi Galeri Sekolah</p>
            </div>
        </footer>
    </div>

    <script>
        // Add smooth scrolling and modern interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll for navigation links
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });

            // Add hover effects to cards
            const cards = document.querySelectorAll('.hover\\:bg-opacity-20');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>
