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
        body {
            background-image: url('/images/bg.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: -1;
        }
    </style>
</head>
<body class="font-sans">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-oxford-navy text-white shadow-lg border-b-4 border-oxford-gold relative z-10">
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
                        <a href="/admin/login" 
                           class="relative inline-flex items-center gap-2 px-6 py-3 rounded-full font-semibold 
                                  text-oxford-navy border-2 border-oxford-gold bg-white
                                  shadow-md hover:shadow-lg hover:bg-oxford-gold hover:text-white 
                                  transition-all duration-300 ease-in-out transform hover:scale-105">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" 
                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" 
                                      clip-rule="evenodd"/>
                            </svg>
                            <span>Admin Login</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="relative">
            <!-- Content -->
            <div class="relative container mx-auto px-6 py-16">
                <!-- Hero Section -->
                <div class="bg-white/40 backdrop-blur-md rounded-2xl shadow-2xl border border-white/30 p-12 mb-12">
                    <div class="text-center">
                        <h2 class="text-6xl font-serif font-bold text-oxford-navy mb-4 text-center">
                            Welcome to Oxford High School
                        </h2>
                        <h3 class="text-3xl text-oxford-gold font-script mb-6 text-center">
                            of Technology & Arts
                        </h3>
                        <p class="text-2xl text-oxford-gold font-serif italic mb-8 text-center">
                            "Sapientia et Innovatio"
                        </p>

                        <div class="max-w-3xl mx-auto">
                            <!-- Highlight Box -->
                            <div class="bg-gradient-to-r from-oxford-navy to-blue-900 text-white p-8 rounded-lg mb-8 shadow-lg">
                                <h3 class="font-serif font-bold text-2xl mb-4 text-oxford-gold">Welcome!</h3>
                                <p class="text-lg mb-4">
                                    Sistem Informasi Galeri Sekolah Oxford High School of Technology & Arts
                                </p>
                                <p class="text-sm opacity-90">
                                    Klik tombol "Explore Website" di bawah untuk mengakses galeri dan informasi sekolah
                                </p>
                            </div>

                            <!-- Explore Button -->
                            <div class="text-center mb-12">
                                <a href="/user" 
                                   class="bg-oxford-gold text-oxford-navy px-10 py-3 rounded-full font-semibold 
                                          hover:bg-opacity-90 shadow-md hover:shadow-xl transition-all inline-flex items-center">
                                    Explore Website
                                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>

                            <!-- Features Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                                <!-- Academic -->
                                <div class="bg-oxford-navy text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="text-oxford-gold mb-3">
                                        <svg class="w-12 h-12 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
                                        </svg>
                                    </div>
                                    <h4 class="font-serif font-bold text-lg mb-2 text-oxford-gold">Academic Excellence</h4>
                                    <p class="text-sm opacity-90">Program akademik berkualitas tinggi dengan standar internasional</p>
                                </div>

                                <!-- Arts & Tech -->
                                <div class="bg-oxford-gold text-oxford-navy p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                    <div class="text-oxford-navy mb-3">
                                        <svg class="w-12 h-12 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <h4 class="font-serif font-bold text-lg mb-2">Arts & Technology</h4>
                                    <p class="text-sm">Pengembangan kreativitas melalui seni dan teknologi modern</p>
                                </div>

                                <!-- Achievement -->
                                <div class="bg-oxford-navy text-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
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
            </div>
        </main>

        <!-- Google Maps Section -->
        <section class="w-full py-8 relative -mt-8">
            <div class="relative z-10 max-w-7xl mx-auto px-6">
                <div class="bg-white/40 backdrop-blur-md rounded-2xl shadow-2xl border border-white/30 p-8 relative -top-8">
                    <h2 class="text-4xl font-serif font-bold text-oxford-navy text-center mb-8">Lokasi Kami</h2>
                    <div class="aspect-w-16 aspect-h-9 w-full h-96">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.687214909832!2d-1.2545179!3d51.75704289999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876c6a9ef8c485b%3A0xd2ff1883a001afed!2sUniversitas%20Oxford!5e0!3m2!1sid!2sid!4v1762823226979!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy"
                            class="w-full h-full">
                        </iframe>
                    </div>
                    <div class="p-6 bg-oxford-navy text-white text-center">
                        <h3 class="text-xl font-serif font-bold text-oxford-gold mb-2">Oxford High School of Technology & Arts</h3>
                        <p class="text-white">𓍙 Wellington Square, Oxford OX1 2JD, Inggris Raya</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="w-full bg-oxford-navy text-white py-8 border-t-4 border-oxford-gold mt-auto">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center mb-4">
                        <img src="/oxford-logo.svg" alt="Oxford High School Logo" class="h-12 w-12 mr-3">
                        <div>
                            <h3 class="font-serif font-bold text-oxford-gold text-lg">Oxford High School of Technology & Arts</h3>
                            <p class="text-sm text-oxford-gold italic">Sapientia et Innovatio</p>
                        </div>
                    </div>
                    <!-- Social Media Links -->
                    <div class="flex justify-center space-x-6 my-4">
                        <a href="https://www.instagram.com/oxford_uni?igsh=MXMycW5oOTI3dDljbg==" target="_blank" class="text-white hover:text-oxford-gold transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.415-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="https://www.tiktok.com/@uni.of.oxford?_r=1&_t=ZS-91IVMrLiOI6" target="_blank" class="text-white hover:text-oxford-gold transition-colors duration-300 font-semibold">
                            TikTok
                        </a>
                        <a href="https://youtube.com/@oxforduniversity?si=OcRPIr5H3gjNXiWH" target="_blank" class="text-white hover:text-oxford-gold transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    <p class="text-white">&copy; 2025 Oxford High School of Technology & Arts. All rights reserved.</p>
                    <p class="text-sm text-oxford-gold mt-2">|Sistem Informasi Galeri Sekolah|</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
