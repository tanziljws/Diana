<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Oxford High School of Technology & Arts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Hide scrollbar but keep functionality */
        .hide-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;  /* Chrome, Safari and Opera */
            width: 0 !important;
            height: 0 !important;
        }
        
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
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(20px, -50px) scale(1.1); }
            50% { transform: translate(-20px, 20px) scale(0.9); }
            75% { transform: translate(50px, 50px) scale(1.05); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</head>
<body class="dark-gradient-bg font-sans">
    <!-- Login/Register Modal - ULTRA MODERN GLASSMORPHISM -->
    <div id="loginModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-3 md:p-4 hide-scrollbar">
        <!-- Animated Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-oxford-navy via-purple-900 to-oxford-navy">
            <div class="absolute inset-0 opacity-30">
                <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-oxford-gold rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
                <div class="absolute top-1/3 right-1/4 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
                <div class="absolute bottom-1/4 left-1/3 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
            </div>
        </div>
        
        <!-- Glassmorphism Card -->
        <div class="relative bg-white/10 backdrop-blur-2xl rounded-2xl md:rounded-3xl max-w-md w-full shadow-2xl border border-white/20 transform transition-all duration-500 hover:scale-[1.02] max-h-[95vh] overflow-hidden">
            <!-- Gradient Border Effect -->
            <div class="absolute -inset-0.5 bg-gradient-to-r from-oxford-gold via-purple-500 to-blue-500 rounded-2xl md:rounded-3xl opacity-75 blur group-hover:opacity-100 transition duration-1000"></div>
            
            <div class="relative bg-gradient-to-br from-white/95 to-white/90 backdrop-blur-xl rounded-3xl md:rounded-4xl p-5 md:p-8 overflow-y-auto max-h-[95vh] hide-scrollbar">
                <!-- Close Button -->
                <button onclick="closeLoginModal()" class="absolute top-4 right-4 md:top-6 md:right-6 text-oxford-navy hover:text-red-500 transition-colors z-10">
                    <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                
                <!-- Logo/Icon -->
                <div class="text-center mb-6 md:mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-oxford-navy to-purple-900 rounded-xl md:rounded-2xl shadow-lg mb-3 md:mb-4 transform hover:rotate-6 transition-transform duration-300">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-oxford-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl md:text-3xl font-bold text-oxford-navy mb-1 md:mb-2" id="authModalTitle">Welcome Back</h2>
                    <p class="text-sm md:text-base text-gray-600" id="authModalSubtitle">Sign in to continue</p>
                </div>
                
                <!-- Tab Buttons -->
                <div class="flex gap-1.5 md:gap-2 mb-5 md:mb-6 bg-gray-100 p-1 rounded-lg md:rounded-xl">
                    <button onclick="showLoginForm()" id="loginTab" 
                        class="flex-1 py-2 md:py-2.5 text-xs md:text-sm font-semibold rounded-md md:rounded-lg transition-all duration-300 text-white shadow-md" 
                        style="background-color: #0a1f44;">
                        Sign In
                    </button>
                    <button onclick="showRegisterForm()" id="registerTab" 
                        class="flex-1 py-2 md:py-2.5 text-xs md:text-sm font-semibold rounded-md md:rounded-lg transition-all duration-300 text-gray-600 hover:text-oxford-navy">
                        Sign Up
                    </button>
                </div>
            
                <!-- Login Form -->
                <div id="loginFormContainer">
                    <form id="loginForm" onsubmit="handleLogin(event)" class="space-y-4">
                        <div id="loginError" class="hidden mb-4 p-3 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg text-sm">
                            <span id="loginErrorText"></span>
                        </div>
                        
                        <div class="space-y-1.5 md:space-y-2">
                            <label class="text-xs md:text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="loginEmail" required 
                                class="w-full px-3 py-2.5 md:px-4 md:py-3 text-sm md:text-base bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl focus:ring-2 focus:ring-oxford-gold focus:border-transparent outline-none transition-all"
                                placeholder="name@example.com">
                        </div>
                        
                        <div class="space-y-1.5 md:space-y-2">
                            <label class="text-xs md:text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="loginPassword" required 
                                class="w-full px-3 py-2.5 md:px-4 md:py-3 text-sm md:text-base bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl focus:ring-2 focus:ring-oxford-gold focus:border-transparent outline-none transition-all"
                                placeholder="••••••••">
                        </div>
                        
                        <button type="submit" id="loginBtn"
                            class="w-full bg-gradient-to-r from-oxford-navy to-purple-900 text-oxford-navy py-2.5 md:py-3 text-sm md:text-base rounded-lg md:rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            Sign In
                        </button>
                    </form>
                </div>

                <!-- Register Form -->
                <div id="registerFormContainer" class="hidden">
                    <form id="registerForm" onsubmit="handleRegister(event)" class="space-y-4">
                        <div id="registerError" class="hidden mb-4 p-3 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg text-sm">
                            <span id="registerErrorText"></span>
                        </div>
                        
                        <div class="space-y-1.5 md:space-y-2">
                            <label class="text-xs md:text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" id="registerName" required 
                                class="w-full px-3 py-2.5 md:px-4 md:py-3 text-sm md:text-base bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl focus:ring-2 focus:ring-oxford-gold focus:border-transparent outline-none transition-all"
                                placeholder="John Doe">
                        </div>
                        
                        <div class="space-y-1.5 md:space-y-2">
                            <label class="text-xs md:text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="registerEmail" required 
                                class="w-full px-3 py-2.5 md:px-4 md:py-3 text-sm md:text-base bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl focus:ring-2 focus:ring-oxford-gold focus:border-transparent outline-none transition-all"
                                placeholder="name@example.com">
                        </div>
                        
                        <div class="space-y-1.5 md:space-y-2">
                            <label class="text-xs md:text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="registerPassword" required minlength="6"
                                class="w-full px-3 py-2.5 md:px-4 md:py-3 text-sm md:text-base bg-gray-50 border border-gray-200 rounded-lg md:rounded-xl focus:ring-2 focus:ring-oxford-gold focus:border-transparent outline-none transition-all"
                                placeholder="••••••••">
                            <p class="text-xs text-gray-500">Minimum 6 characters</p>
                        </div>
                        
                        <button type="submit" id="registerBtn"
                            class="w-full bg-gradient-to-r from-oxford-gold to-yellow-500 text-oxford-navy py-2.5 md:py-3 text-sm md:text-base rounded-lg md:rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                            Create Account
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- User Info Bar (shown when logged in) -->
    <div id="userInfoBar" class="hidden bg-oxford-gold text-oxford-navy py-2 px-4 shadow-lg">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-oxford-navy rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm">Logged in as: <span id="userDisplayName"></span></p>
                    <p class="text-xs opacity-75" id="userDisplayEmail"></p>
                </div>
            </div>
            <button onclick="handleLogout()" 
                class="bg-oxford-navy text-oxford-gold px-4 py-2 rounded-lg font-semibold text-sm hover:bg-blue-900 transition-colors">
                Logout
            </button>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-oxford-navy shadow-lg border-b-4 border-oxford-gold">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4 md:py-6">
                <!-- Logo & Title -->
                <div class="flex items-center space-x-2 md:space-x-4">
                    <img src="/oxford-logo.svg" alt="Oxford High School Logo" class="h-10 w-10 md:h-12 md:w-12">
                    <div>
                        <h1 class="text-base md:text-xl lg:text-2xl font-serif font-bold text-white">Oxford High School</h1>
                        <p class="text-oxford-gold text-xs md:text-sm italic hidden sm:block">Sapientia et Innovatio</p>
                    </div>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="lg:hidden text-white p-2 hover:text-oxford-gold transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                
                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-4">
                    <a href="#profil" class="group relative px-3 py-2 text-white hover:text-oxford-gold transition-all duration-300 font-medium">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                        </svg>
                        Profil
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-oxford-gold group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#berita" class="group relative px-3 py-2 text-white hover:text-oxford-gold transition-all duration-300 font-medium">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                        </svg>
                        Berita
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-oxford-gold group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="#agenda" class="group relative px-3 py-2 text-white hover:text-oxford-gold transition-all duration-300 font-medium">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        Agenda
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-oxford-gold group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <button onclick="viewAllGalleries()" class="group relative px-3 py-2 text-white hover:text-oxford-gold transition-all duration-300 font-medium">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                        </svg>
                        Galeri
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-oxford-gold group-hover:w-full transition-all duration-300"></span>
                    </button>
                    <div class="h-6 w-px bg-oxford-gold opacity-30 mx-2"></div>
<a href="/" 
   class="px-4 py-2 rounded-full hover:shadow-lg font-semibold transition-all duration-300 transform hover:scale-105 text-sm" 
   style="background-color: #c5a572; color: #0a1f44 !important; text-decoration: none;">
    <svg class="w-3 h-3 inline mr-1" fill="#0a1f44" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0L3.586 10l4.707-4.707a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
    </svg>
    Homepage
</a>

                </nav>
            </div>
            
            <!-- Mobile Navigation -->
            <nav id="mobileMenu" class="hidden lg:hidden pb-4 space-y-2">
                <a href="#profil" class="block px-4 py-2 text-white hover:bg-oxford-gold hover:text-oxford-navy rounded-lg transition-colors">
                    <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                    </svg>
                    Profil
                </a>
                <a href="#berita" class="block px-4 py-2 text-white hover:bg-oxford-gold hover:text-oxford-navy rounded-lg transition-colors">
                    <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                    </svg>
                    Berita
                </a>
                <a href="#agenda" class="block px-4 py-2 text-white hover:bg-oxford-gold hover:text-oxford-navy rounded-lg transition-colors">
                    <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                    Agenda
                </a>
                <button onclick="viewAllGalleries()" class="block w-full text-left px-4 py-2 text-white hover:bg-oxford-gold hover:text-oxford-navy rounded-lg transition-colors">
                    <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                    </svg>
                    Galeri
                </button>
                <a href="/" class="block px-4 py-2 bg-oxford-gold text-oxford-navy rounded-lg font-semibold hover:bg-yellow-500 transition-colors">
                    <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0L3.586 10l4.707-4.707a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                    </svg>
                    Homepage
                </a>
            </nav>
        </div>
    </header>

        <!-- Hero Section -->
        <section class="dark-gradient-bg text-white py-12 md:py-20 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-oxford-dark via-oxford-navy to-gray-900 opacity-95"></div>
            <div class="container mx-auto px-4 sm:px-6 text-center relative z-10">
            <div class="flex flex-col items-center justify-center mb-6 md:mb-8 text-center">
    <!-- Logo di tengah atas -->
    <img src="/oxford-logo.svg" alt="Oxford Logo" class="h-16 w-16 md:h-20 md:w-20 mb-4 neon-glow">

    <!-- Teks utama -->
    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white mb-2">
        Welcome to Oxford High School
    </h1>

    <!-- Subteks di bawah judul -->
    <p class="text-lg sm:text-xl md:text-2xl text-oxford-gold font-script">
        of Technology & Arts
    </p>
</div>

                <div class="grid grid-cols-3 gap-3 md:gap-6 lg:gap-8 max-w-5xl mx-auto">
                    <div class="glass-effect rounded-lg md:rounded-xl p-4 md:p-6 lg:p-8 hover:neon-glow transition-all duration-300 transform hover:-translate-y-1 subtle-glow">
                        <div class="text-oxford-gold mb-2 md:mb-4">
                            <svg class="w-8 h-8 md:w-12 lg:w-16 md:h-12 lg:h-16 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z"/>
                            </svg>
                        </div>
                        <h4 class="font-serif font-bold text-sm md:text-lg lg:text-xl mb-1 md:mb-2 lg:mb-3 text-oxford-gold">Excellence</h4>
                        <p class="text-xs md:text-sm opacity-90 leading-tight md:leading-normal">Keunggulan akademik dan karakter yang terintegrasi dengan standar internasional</p>
                    </div>
                    <div class="glass-effect rounded-lg md:rounded-xl p-4 md:p-6 lg:p-8 hover:neon-glow transition-all duration-300 transform hover:-translate-y-1 subtle-glow">
                        <div class="text-oxford-gold mb-2 md:mb-4">
                            <svg class="w-8 h-8 md:w-12 lg:w-16 md:h-12 lg:h-16 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8Z"/>
                            </svg>
                        </div>
                        <h4 class="font-serif font-bold text-sm md:text-lg lg:text-xl mb-1 md:mb-2 lg:mb-3 text-oxford-gold">Innovation</h4>
                        <p class="text-xs md:text-sm opacity-90 leading-tight md:leading-normal">Inovasi teknologi AI dan digital untuk masa depan yang cerah</p>
                    </div>
                    <div class="glass-effect rounded-lg md:rounded-xl p-4 md:p-6 lg:p-8 hover:neon-glow transition-all duration-300 transform hover:-translate-y-1 subtle-glow">
                        <div class="text-oxford-gold mb-2 md:mb-4">
                            <svg class="w-8 h-8 md:w-12 lg:w-16 md:h-12 lg:h-16 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M5,16L3,14L5,12L4,11L2,13L4,15L5,16M9,10L7,8L9,6L8,5L6,7L8,9L9,10M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10Z"/>
                            </svg>
                        </div>
                        <h4 class="font-serif font-bold text-sm md:text-lg lg:text-xl mb-1 md:mb-2 lg:mb-3 text-oxford-gold">Achievement</h4>
                        <p class="text-xs md:text-sm opacity-90 leading-tight md:leading-normal">Prestasi gemilang di berbagai kompetisi nasional dan internasional</p>
                    </div>
                </div>
            </div>
        </section>

    <!-- Main Content -->
<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Profil Section -->
    <section id="profil" class="mb-12 md:mb-20 rounded-3xl md:rounded-4xl p-8 md:p-12 text-oxford-navy relative overflow-hidden bg-white shadow-lg">
        <!-- Decorative Background Pattern -->
        <div class="absolute inset-0 rounded-3xl md:rounded-4xl overflow-hidden" style="background-image: radial-gradient(circle at 20% 50%, rgba(197, 165, 114, 0.05) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(10, 31, 68, 0.03) 0%, transparent 50%); background-size: 100% 100%;"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 right-10 w-72 h-72 bg-oxford-gold rounded-full filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-10 left-10 w-96 h-96 bg-oxford-navy rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>
        
        <div class="relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-8 md:mb-12">
                <div class="inline-block group">
                    <div class="relative inline-block mb-4 md:mb-6">
                        <div class="w-14 h-14 md:w-20 md:h-20 bg-gradient-to-br from-oxford-navy to-blue-600 rounded-xl md:rounded-2xl flex items-center justify-center shadow-lg md:shadow-xl transform transition-all duration-300 group-hover:scale-110 group-hover:rotate-3">
                            <svg class="w-7 h-7 md:w-10 md:h-10 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-serif font-bold text-oxford-navy mb-2 md:mb-3 tracking-tight">Profil Sekolah</h2>
                    <p class="text-sm md:text-base lg:text-lg text-gray-600 mb-3 md:mb-4">Mengenal Lebih Dekat Oxford High School</p>
                    <div class="w-16 md:w-20 h-0.5 md:h-1 bg-oxford-gold rounded-full mx-auto"></div>
                </div>
            </div>
            
            <!-- View Profile Button -->
            <div class="text-center mb-6 md:mb-8">
                <button onclick="openProfileModal()" 
                    class="group inline-flex items-center gap-2 md:gap-3 bg-gradient-to-r from-oxford-navy to-blue-900 hover:from-oxford-gold hover:to-yellow-500 text-oxford-navy hover:text-oxford-navy px-6 py-3 md:px-8 md:py-4 rounded-xl md:rounded-2xl font-bold text-sm md:text-base lg:text-lg shadow-lg md:shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-oxford-navy group-hover:text-oxford-navy">Lihat Profil Lengkap</span>
                    <svg class="w-4 h-4 md:w-5 md:h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </button>
            </div>
            
            <div id="profilesContainer" class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 lg:gap-8">
                <!-- Profiles will be loaded here -->
            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section id="berita" class="mb-12 md:mb-20 rounded-3xl md:rounded-4xl p-8 md:p-12 relative overflow-hidden bg-white shadow-lg">
        <!-- Decorative Background Pattern -->
        <div class="absolute inset-0 rounded-3xl md:rounded-4xl overflow-hidden" style="background-image: radial-gradient(circle at 20% 50%, rgba(197, 165, 114, 0.05) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(10, 31, 68, 0.03) 0%, transparent 50%); background-size: 100% 100%;"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-72 h-72 bg-oxford-navy rounded-full filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-oxford-gold rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>
        
        <div class="relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-block group">
                    <div class="relative inline-block mb-4 md:mb-6">
                        <div class="w-14 h-14 md:w-20 md:h-20 bg-gradient-to-br from-oxford-gold to-yellow-500 rounded-xl md:rounded-2xl flex items-center justify-center shadow-lg md:shadow-xl transform transition-all duration-300 group-hover:scale-110 group-hover:rotate-3">
                            <svg class="w-7 h-7 md:w-10 md:h-10 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                                <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-serif font-bold text-oxford-navy mb-2 md:mb-3 tracking-tight">Berita Terbaru</h2>
                    <p class="text-sm md:text-base lg:text-lg text-gray-600 mb-3 md:mb-4">Informasi & Pengumuman Sekolah</p>
                    <div class="w-16 md:w-20 h-0.5 md:h-1 bg-oxford-gold rounded-full mx-auto"></div>
                </div>
            </div>

            <div id="postsContainer" class="grid grid-cols-3 gap-3 md:gap-6 lg:gap-8">
                <!-- Posts akan muncul di sini -->
            </div>
        </div>
    </section>

    <!-- Agenda Section -->
    <section id="agenda" class="mb-12 md:mb-20 rounded-3xl md:rounded-4xl p-8 md:p-12 relative overflow-hidden bg-white shadow-lg">
        <!-- Decorative Background Pattern -->
        <div class="absolute inset-0 rounded-3xl md:rounded-4xl overflow-hidden" style="background-image: radial-gradient(circle at 20% 50%, rgba(197, 165, 114, 0.05) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(10, 31, 68, 0.03) 0%, transparent 50%); background-size: 100% 100%;"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 right-10 w-72 h-72 bg-oxford-gold rounded-full filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-10 left-10 w-96 h-96 bg-oxford-navy rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>
        
        <div class="relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-block group">
                    <div class="relative inline-block mb-4 md:mb-6">
                        <div class="w-14 h-14 md:w-20 md:h-20 bg-gradient-to-br from-oxford-navy to-blue-600 rounded-xl md:rounded-2xl flex items-center justify-center shadow-lg md:shadow-xl transform transition-all duration-300 group-hover:scale-110 group-hover:rotate-3">
                            <svg class="w-7 h-7 md:w-10 md:h-10 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-serif font-bold text-oxford-navy mb-2 md:mb-3 tracking-tight">Agenda Kegiatan</h2>
                    <p class="text-sm md:text-base lg:text-lg text-gray-600 mb-3 md:mb-4">Jadwal & Acara Mendatang</p>
                    <div class="w-16 md:w-20 h-0.5 md:h-1 bg-oxford-gold rounded-full mx-auto"></div>
                </div>
            </div>
            
            <div id="agendasContainer" class="grid grid-cols-3 gap-3 md:gap-6 lg:gap-8">
                <!-- Agendas will be loaded here -->
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
    <section id="galeri" class="mb-12 md:mb-20 rounded-3xl md:rounded-4xl p-8 md:p-12 text-oxford-navy relative overflow-hidden bg-white shadow-lg">
        <!-- Decorative Background Pattern -->
        <div class="absolute inset-0 rounded-3xl md:rounded-4xl overflow-hidden" style="background-image: radial-gradient(circle at 20% 50%, rgba(197, 165, 114, 0.05) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(10, 31, 68, 0.03) 0%, transparent 50%); background-size: 100% 100%;"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-72 h-72 bg-oxford-navy rounded-full filter blur-3xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-oxford-gold rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>
        
        <div class="relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-block group">
                    <div class="relative inline-block mb-4 md:mb-6">
                        <div class="w-14 h-14 md:w-20 md:h-20 bg-gradient-to-br from-oxford-gold to-yellow-500 rounded-xl md:rounded-2xl flex items-center justify-center shadow-lg md:shadow-xl transform transition-all duration-300 group-hover:scale-110 group-hover:rotate-3">
                            <svg class="w-7 h-7 md:w-10 md:h-10 text-oxford-navy" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-serif font-bold text-oxford-navy mb-2 md:mb-3 tracking-tight">Gallery Showcase</h2>
                    <p class="text-sm md:text-base lg:text-lg text-gray-600 mb-3 md:mb-4">Koleksi Momen Berharga Kami</p>
                    <div class="w-16 md:w-20 h-0.5 md:h-1 bg-oxford-gold rounded-full mx-auto"></div>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div id="galleriesContainer" class="grid grid-cols-3 gap-3 md:gap-6 lg:gap-8 mb-8 md:mb-12">
                <!-- Galleries will be loaded here -->
            </div>
            
            <!-- View All Button -->
            <div class="text-center">
                <button onclick="viewAllGalleries()" class="inline-flex items-center gap-2 md:gap-3 bg-gradient-to-r from-oxford-navy to-blue-900 hover:from-oxford-gold hover:to-yellow-500 text-oxford-navy hover:text-oxford-navy px-6 py-3 md:px-8 md:py-4 rounded-xl md:rounded-2xl font-bold text-sm md:text-base lg:text-lg shadow-lg md:shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                    <span class="text-oxford-navy hover:text-oxford-navy">View All Galleries</span>
                    <svg class="w-5 h-5 md:w-6 md:h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </button>
                <p class="text-gray-600 mt-3 md:mt-4 text-xs md:text-sm">Explore our complete collection of school memories</p>
            </div>
        </div>
    </section>
</main>

    <!-- Profile Modal -->
    <div id="profileModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-3 md:p-4 hide-scrollbar">
        <div class="bg-white rounded-3xl md:rounded-4xl shadow-2xl max-w-6xl w-full max-h-[95vh] overflow-y-auto hide-scrollbar relative">
            <!-- Back Button -->
            <button onclick="closeProfileModal()" class="absolute top-6 left-6 z-50 text-oxford-navy hover:text-oxford-gold transition-colors bg-white/80 hover:bg-white/90 rounded-full p-2 shadow-md">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-oxford-navy to-blue-900 text-white pt-16 pb-6 md:pt-20 md:pb-8 lg:pt-24 lg:pb-10 px-6 md:px-8 lg:px-10 rounded-t-3xl md:rounded-t-4xl">
                <div class="text-center">
                            <h1 class="text-2xl md:text-3xl lg:text-4xl font-serif font-bold text-oxford-navy mb-1 md:mb-2">WELCOME</h1>
                </div>
            
            <!-- Modal Content -->
            <div class="p-4 md:p-6 lg:p-8">
                <!-- Hero Section -->
                <div class="mb-8 md:mb-12 text-center">
                    <div class="bg-[#1a3a5c]/50 backdrop-blur-sm p-6 md:p-8 rounded-2xl border border-white/20 shadow-lg">
                        <div class="inline-block p-1 bg-gradient-to-r from-oxford-gold to-yellow-500 rounded-full mb-4 md:mb-6">
                            <div class="bg-white p-1 rounded-full">
                                <img src="/oxford-logo.svg" alt="Oxford Logo" class="h-16 w-16 md:h-20 lg:h-24 md:w-20 lg:w-24">
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="text-2xl md:text-3xl lg:text-4xl font-serif font-bold text-oxford-navy mb-1 md:mb-2">Oxford High School</h1>
                            <p class="text-sm md:text-lg lg:text-xl text-oxford-navy font-script">of Technology & Arts</p>
                        </div>
                    </div>
                </div>

                <!-- About Us with Image -->
                <div class="mb-8 md:mb-12 bg-gradient-to-br from-gray-50 to-blue-50 p-4 md:p-6 lg:p-8 rounded-xl md:rounded-2xl border border-gray-100">
                    <h3 class="text-xl md:text-2xl lg:text-3xl font-serif font-bold text-oxford-navy mb-4 md:mb-6 text-center">Tentang Kami</h3>
                    <div class="grid md:grid-cols-2 gap-6 md:gap-8 lg:gap-12 items-center">
                        <div>
                            <p class="text-sm md:text-base lg:text-lg text-gray-700 mb-4 md:mb-6 leading-relaxed">
                                Oxford High School of Technology & Arts adalah institusi pendidikan terkemuka yang menggabungkan keunggulan akademis, pengembangan seni, dan penerapan teknologi terkini. Dengan pengalaman lebih dari satu abad dalam mendidik generasi muda, kami bangga menjadi pelopor dalam pendidikan holistik yang mempersiapkan siswa untuk menghadapi tantangan masa depan.
                            </p>
                            <div class="grid grid-cols-2 gap-3 md:gap-4">
                                <div class="bg-white p-3 md:p-4 rounded-lg shadow-sm border border-gray-100">
                                    <div class="text-xl md:text-2xl lg:text-3xl font-bold text-oxford-navy">1,200+</div>
                                    <div class="text-xs md:text-sm text-gray-600">Siswa Aktif</div>
                                </div>
                                <div class="bg-white p-3 md:p-4 rounded-lg shadow-sm border border-gray-100">
                                    <div class="text-xl md:text-2xl lg:text-3xl font-bold text-oxford-navy">150+</div>
                                    <div class="text-xs md:text-sm text-gray-600">Tenaga Pendidik</div>
                                </div>
                            </div>
                        </div>
                        <div class="h-64 md:h-80 lg:h-96 rounded-xl overflow-hidden shadow-lg">
                            <img src="/images/bg.jpg" alt="Oxford Build" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <!-- Vision & Mission -->
                <div class="mb-8 md:mb-12">
                    <h3 class="text-xl md:text-2xl lg:text-3xl font-serif font-bold text-oxford-navy mb-6 md:mb-8 text-center">Visi & Misi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 lg:gap-8">
                        <div class="bg-gradient-to-br from-oxford-navy to-blue-900 text-white p-6 md:p-8 rounded-xl md:rounded-2xl shadow-lg">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-oxford-gold/20 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-oxford-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl md:text-2xl font-serif font-bold text-oxford-gold">Visi</h3>
                            </div>
                            <p class="text-sm md:text-base lg:text-lg leading-relaxed text-oxford-gold">
                                Menjadi lembaga pendidikan terdepan yang mencetak generasi unggul, berkarakter, dan berdaya saing global melalui penguasaan teknologi dan seni.
                            </p>
                        </div>
                        <div class="bg-gradient-to-br from-oxford-gold to-yellow-500 text-oxford-navy p-6 md:p-8 rounded-xl md:rounded-2xl shadow-lg">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-oxford-navy/10 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-oxford-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <h3 class="text-xl md:text-2xl font-serif font-bold text-oxford-navy">Misi</h3>
                            </div>
                            <ol class="space-y-2 text-sm md:text-base lg:text-lg pl-13">
                                <li class="flex items-start">
                                    <span class="inline-block w-6 h-6 bg-oxford-navy/10 rounded-full flex-shrink-0 flex items-center justify-center mr-2 mt-0.5">1</span>
                                    <span>Menyelenggarakan pendidikan berkualitas tinggi yang mengintegrasikan kurikulum nasional dengan standar internasional</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="inline-block w-6 h-6 bg-oxford-navy/10 rounded-full flex-shrink-0 flex items-center justify-center mr-2 mt-0.5">2</span>
                                    <span>Mengembangkan potensi siswa dalam bidang akademik, teknologi, dan seni secara optimal</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="inline-block w-6 h-6 bg-oxford-navy/10 rounded-full flex-shrink-0 flex items-center justify-center mr-2 mt-0.5">3</span>
                                    <span>Membentuk karakter siswa yang berakhlak mulia, mandiri, dan bertanggung jawab</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="inline-block w-6 h-6 bg-oxford-navy/10 rounded-full flex-shrink-0 flex items-center justify-center mr-2 mt-0.5">4</span>
                                    <span>Menyediakan fasilitas pendidikan yang modern dan berstandar internasional</span>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Keunggulan -->
                <div class="mb-8 md:mb-12">
                    <h3 class="text-xl md:text-2xl lg:text-3xl font-serif font-bold text-oxford-navy mb-4 md:mb-6 lg:mb-8 text-center">Keunggulan Kami</h3>
                    <div class="grid md:grid-cols-3 gap-4 md:gap-6">
                        <div class="bg-white p-4 md:p-6 rounded-lg md:rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 border-t-4 border-oxford-gold">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-oxford-gold/10 rounded-full flex items-center justify-center mb-3 md:mb-4">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-oxford-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <h4 class="text-base md:text-lg lg:text-xl font-semibold text-oxford-navy mb-2">Akademik Unggul</h4>
                            <p class="text-xs md:text-sm lg:text-base text-gray-600">Kurikulum internasional yang dirancang untuk mengasah potensi akademik dan intelektual siswa.</p>
                        </div>
                        <div class="bg-white p-4 md:p-6 rounded-lg md:rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 border-t-4 border-blue-500">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-blue-500/10 rounded-full flex items-center justify-center mb-3 md:mb-4">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path>
                                </svg>
                            </div>
                            <h4 class="text-base md:text-lg lg:text-xl font-semibold text-oxford-navy mb-2">Teknologi Mutakhir</h4>
                            <p class="text-xs md:text-sm lg:text-base text-gray-600">Fasilitas teknologi terkini untuk mendukung pembelajaran abad ke-21 dan pengembangan keterampilan digital.</p>
                        </div>
                        <div class="bg-white p-4 md:p-6 rounded-lg md:rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 border-t-4 border-yellow-500">
                            <div class="w-10 h-10 md:w-12 md:h-12 bg-yellow-500/10 rounded-full flex items-center justify-center mb-3 md:mb-4">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="text-base md:text-lg lg:text-xl font-semibold text-oxford-navy mb-2">Pengembangan Karakter</h4>
                            <p class="text-xs md:text-sm lg:text-base text-gray-600">Program pembentukan karakter dan kepemimpinan yang terintegrasi dalam setiap aspek pembelajaran.</p>
                        </div>
                    </div>
                </div>

                <!-- History Section with Timeline -->
                <div class="mb-8 md:mb-12 lg:mb-16">
                    <h3 class="text-xl md:text-2xl lg:text-3xl font-serif font-bold text-oxford-navy text-center mb-6 md:mb-8 lg:mb-12">Perjalanan Kami</h3>
                    
                    <div class="relative hidden md:block">
                        <!-- Timeline line -->
                        <div class="absolute left-1/2 w-1 h-full bg-gradient-to-b from-oxford-gold to-blue-500 transform -translate-x-1/2"></div>
                        
                        <!-- Timeline items -->
                        <div class="space-y-12 md:space-y-16">
                            <!-- Item 1 -->
                            <div class="relative flex items-center">
                                <div class="w-1/2 pr-8 md:pr-12 lg:pr-16 text-right">
                                    <div class="inline-block bg-gradient-to-r from-oxford-navy to-blue-900 text-white p-4 md:p-6 rounded-lg md:rounded-xl shadow-lg max-w-md">
                                        <div class="absolute right-0 top-1/2 w-5 h-5 md:w-6 md:h-6 bg-oxford-gold rounded-full transform translate-x-1/2 -translate-y-1/2 border-4 border-white"></div>
                                        <h4 class="text-lg md:text-xl lg:text-2xl font-semibold text-oxford-gold mb-2">1905 - Awal Berdiri</h4>
                                        <p class="text-sm md:text-base text-oxford-gold mb-2">Oxford High School of Technology & Arts didirikan dengan visi revolusioner untuk menggabungkan keunggulan akademik, seni, dan teknologi dalam satu wadah pendidikan.</p>
                                    </div>
                                </div>
                                <div class="w-1/2 pl-16">
                                    <div class="h-64 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl overflow-hidden shadow-md">
                                        <img src="/images/class.jpeg" alt="Old School Building" class="w-full h-full object-cover">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Item 2 -->
                            <div class="relative flex items-center">
                                <div class="w-1/2 pr-16 text-right">
                                    <div class="h-64 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl overflow-hidden shadow-md">
                                        <img src="/images/lab.jpeg" alt="Science Lab" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <div class="w-1/2 pl-16">
                                    <div class="inline-block bg-gradient-to-r from-oxford-gold to-yellow-500 text-oxford-navy p-6 rounded-xl shadow-lg max-w-md">
                                        <div class="absolute left-0 top-1/2 w-6 h-6 bg-oxford-navy rounded-full transform -translate-x-1/2 -translate-y-1/2 border-4 border-white"></div>
                                        <h4 class="text-2xl font-semibold mb-2">1950 - Era Modernisasi</h4>
                                        <p>Pembangunan fasilitas modern dimulai, termasuk laboratorium sains dan studio seni pertama. Oxford High School menjadi pelopor dalam penggabungan seni dan teknologi dalam kurikulum.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Item 3 -->
                            <div class="relative flex items-center">
                                <div class="w-1/2 pr-16 text-right">
                                    <div class="inline-block bg-gradient-to-r from-oxford-navy to-blue-900 text-white p-6 rounded-xl shadow-lg max-w-md">
                                        <div class="absolute right-0 top-1/2 w-6 h-6 bg-oxford-gold rounded-full transform translate-x-1/2 -translate-y-1/2 border-4 border-white"></div>
                                        <h4 class="text-2xl font-semibold text-oxford-gold mb-2">2000 - Revolusi Digital</h4>
                                        <p class="text-oxford-gold mb-2">Mengadopsi teknologi digital dalam pembelajaran, termasuk perpustakaan digital dan ruang kelas berbasis teknologi. Memperkenalkan program STEM pertama di kawasan ini.</p>
                                    </div>
                                </div>
                                <div class="w-1/2 pl-16">
                                    <div class="h-64 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl overflow-hidden shadow-md">
                                        <img src="/images/room.jpeg" alt="Digital Classroom" class="w-full h-full object-cover">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Item 4 -->
                            <div class="relative flex items-center">
                                <div class="w-1/2 pr-16 text-right">
                                    <div class="h-64 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl overflow-hidden shadow-md">
                                        <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80" alt="Graduation" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                <div class="w-1/2 pl-16">
                                    <div class="inline-block bg-gradient-to-r from-oxford-gold to-yellow-500 text-oxford-navy p-6 rounded-xl shadow-lg max-w-md">
                                        <div class="absolute left-0 top-1/2 w-6 h-6 bg-oxford-navy rounded-full transform -translate-x-1/2 -translate-y-1/2 border-4 border-white"></div>
                                        <h4 class="text-2xl font-semibold mb-2">Sekarang - Masa Depan</h4>
                                        <p>Terus berinovasi dalam pendidikan dengan fokus pada pengembangan karakter, kepemimpinan, dan keterampilan abad ke-21. Mempersiapkan generasi masa depan yang siap menghadapi tantangan global.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Mobile Timeline (Simplified) -->
                    <div class="md:hidden space-y-6">
                        <div class="bg-gradient-to-r from-oxford-navy to-blue-900 text-white p-4 rounded-lg shadow-lg">
                            <h4 class="text-base font-semibold text-oxford-gold mb-2">1905 - Awal Berdiri</h4>
                            <p class="text-xs text-oxford-gold">Oxford High School of Technology & Arts didirikan dengan visi revolusioner untuk menggabungkan keunggulan akademik, seni, dan teknologi dalam satu wadah pendidikan.</p>
                        </div>
                        <div class="bg-gradient-to-r from-oxford-gold to-yellow-500 text-oxford-navy p-4 rounded-lg shadow-lg">
                            <h4 class="text-base font-semibold mb-2">1950 - Era Modernisasi</h4>
                            <p class="text-xs">Pembangunan fasilitas modern dimulai, termasuk laboratorium sains dan studio seni pertama. Oxford High School menjadi pelopor dalam penggabungan seni dan teknologi dalam kurikulum.</p>
                        </div>
                        <div class="bg-gradient-to-r from-oxford-navy to-blue-900 text-white p-4 rounded-lg shadow-lg">
                            <h4 class="text-base font-semibold text-oxford-gold mb-2">2000 - Revolusi Digital</h4>
                            <p class="text-xs text-oxford-gold">Mengadopsi teknologi digital dalam pembelajaran, termasuk perpustakaan digital dan ruang kelas berbasis teknologi. Memperkenalkan program STEM pertama di kawasan ini.</p>
                        </div>
                        <div class="bg-gradient-to-r from-oxford-gold to-yellow-500 text-oxford-navy p-4 rounded-lg shadow-lg">
                            <h4 class="text-base font-semibold mb-2">Sekarang - Masa Depan</h4>
                            <p class="text-xs">Terus berinovasi dalam pendidikan dengan fokus pada pengembangan karakter, kepemimpinan, dan keterampilan abad ke-21. Mempersiapkan generasi masa depan yang siap menghadapi tantangan global.</p>
                        </div>
                    </div>
                </div>
                <!-- Facilities Section -->
                <div class="mb-8 md:mb-12 lg:mb-16">
                    <h3 class="text-xl md:text-2xl lg:text-3xl font-serif font-bold text-oxford-navy text-center mb-6 md:mb-8 lg:mb-12">Fasilitas Modern</h3>
                    
                    <div class="grid md:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
                        <!-- Facility 1 -->
                        <div class="group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl hover:shadow-xl md:hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 md:hover:-translate-y-2">
                            <div class="h-40 md:h-48 bg-gradient-to-br from-blue-50 to-blue-100 relative overflow-hidden">
                                <img src="images/class.jpeg" alt="Modern Classroom" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-3 md:p-4 lg:p-6">
                                    <h4 class="text-base md:text-lg lg:text-xl font-bold text-white">Ruang Kelas Modern</h4>
                                </div>
                            </div>
                            <div class="p-4 md:p-5 lg:p-6">
                                <p class="text-xs md:text-sm lg:text-base text-gray-600">Ruang belajar yang nyaman dengan teknologi terkini, dilengkapi dengan proyektor interaktif dan sistem pendingin ruangan.</p>
                            </div>
                        </div>
                        
                        <div class="group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl hover:shadow-xl md:hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 md:hover:-translate-y-2">
                            <div class="h-40 md:h-48 bg-gradient-to-br from-green-50 to-green-100 relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=735&q=80" alt="Science Lab" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-3 md:p-4 lg:p-6">
                                    <h4 class="text-base md:text-lg lg:text-xl font-bold text-white">Laboratorium Sains</h4>
                                </div>
                            </div>
                            <div class="p-4 md:p-5 lg:p-6">
                                <p class="text-xs md:text-sm lg:text-base text-gray-600">Laboratorium lengkap untuk praktikum fisika, kimia, dan biologi dengan peralatan standar internasional.</p>
                            </div>
                        </div>
                        
                        <!-- Facility 3 -->
                        <div class="group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl hover:shadow-xl md:hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 md:hover:-translate-y-2">
                            <div class="h-40 md:h-48 bg-gradient-to-br from-purple-50 to-purple-100 relative overflow-hidden">
                                <img src="/images/perpus.jpeg" alt="Library" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-3 md:p-4 lg:p-6">
                                    <h4 class="text-base md:text-lg lg:text-xl font-bold text-white">Perpustakaan Digital</h4>
                                </div>
                            </div>
                            <div class="p-4 md:p-5 lg:p-6">
                                <p class="text-xs md:text-sm lg:text-base text-gray-600">Koleksi buku dan jurnal digital yang dapat diakses kapan saja, serta ruang baca yang nyaman dan tenang.</p>
                            </div>
                        </div>
                        
                        <!-- Facility 4 -->
                        <div class="group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl hover:shadow-xl md:hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 md:hover:-translate-y-2">
                            <div class="h-40 md:h-48 bg-gradient-to-br from-yellow-50 to-yellow-100 relative overflow-hidden">
                                <img src="/images/lapangan.jpeg" alt="Sports Facility" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-3 md:p-4 lg:p-6">
                                    <h4 class="text-base md:text-lg lg:text-xl font-bold text-white">Fasilitas Olahraga</h4>
                                </div>
                            </div>
                            <div class="p-4 md:p-5 lg:p-6">
                                <p class="text-xs md:text-sm lg:text-base text-gray-600">Lapangan olahraga lengkap termasuk lapangan sepak bola, basket, tenis, dan kolam renang standar olimpiade.</p>
                            </div>
                        </div>
                        
                        <!-- Facility 5 -->
                        <div class="group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl hover:shadow-xl md:hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 md:hover:-translate-y-2">
                            <div class="h-40 md:h-48 bg-gradient-to-br from-red-50 to-red-100 relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1169&q=80" alt="Computer Lab" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-3 md:p-4 lg:p-6">
                                    <h4 class="text-base md:text-lg lg:text-xl font-bold text-white">Laboratorium Komputer</h4>
                                </div>
                            </div>
                            <div class="p-4 md:p-5 lg:p-6">
                                <p class="text-xs md:text-sm lg:text-base text-gray-600">Dilengkapi dengan komputer terbaru, akses internet berkecepatan tinggi, dan perangkat lunak terkini untuk mendukung pembelajaran teknologi informasi.</p>
                            </div>
                        </div>
                        
                        <!-- Facility 6 -->
                        <div class="group overflow-hidden rounded-xl md:rounded-2xl shadow-lg md:shadow-xl hover:shadow-xl md:hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 md:hover:-translate-y-2">
                            <div class="h-40 md:h-48 bg-gradient-to-br from-pink-50 to-pink-100 relative overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1606761568499-6d2451b23c66?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Auditorium" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 p-3 md:p-4 lg:p-6">
                                    <h4 class="text-base md:text-lg lg:text-xl font-bold text-white">Auditorium & Teater</h4>
                                </div>
                            </div>
                            <div class="p-4 md:p-5 lg:p-6">
                                <p class="text-xs md:text-sm lg:text-base text-gray-600">Auditorium berkapasitas 500 orang dengan tata suara dan pencahayaan profesional untuk berbagai acara dan pertunjukan seni.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vision & Mission -->
                </div>
            </div>
        </div>
    </div>

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

    <script>
        // Show notification if exists
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('notification');
            if (notification) {
                // Show notification
                setTimeout(() => {
                    notification.classList.remove('translate-x-full');
                    notification.classList.add('translate-x-0');
                    
                    // Auto hide after 5 seconds
                    setTimeout(() => {
                        notification.classList.remove('translate-x-0');
                        notification.classList.add('translate-x-full');
                    }, 5000);
                }, 300);
                
                // Close button handler
                const closeButtons = notification.querySelectorAll('button[onclick*="this.parentElement.remove()"]');
                closeButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        notification.classList.remove('translate-x-0');
                        notification.classList.add('translate-x-full');
                    });
                });
            }
        });
        
        // Set base URL for API
        axios.defaults.baseURL = window.location.origin;
        
        // Setup CSRF token for all axios requests
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        
        // Enable credentials for session-based auth
        axios.defaults.withCredentials = true;

        // Load data on page load
        document.addEventListener('DOMContentLoaded', function() {
            checkUserLogin(); // Check if user is already logged in
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
                // Use PHP data passed from controller instead of API
                const posts = @json($posts ?? []);
                
                const postsHtml = posts.map(post => {
                    const safeTitle = (post.judul || '').replace(/'/g, "\\'").replace(/"/g, '\\"');
                    const safeContent = (post.konten || '');
                    const safeCategory = post.kategori ? post.kategori.kategori : 'Uncategorized';
                    const safeImage = post.image || '';
                    
                    return `
                    <div class="bg-white rounded-lg md:rounded-xl lg:rounded-2xl shadow-lg md:shadow-xl lg:shadow-2xl border-t-2 md:border-t-4 border-oxford-gold overflow-hidden hover:shadow-2xl md:hover:shadow-3xl transform hover:-translate-y-1 md:hover:-translate-y-2 hover:scale-105 transition-all duration-300 group">
                        <div class="relative">
                            ${post.image ? `<img src="/${post.image}" alt="${post.judul}" class="w-full h-32 md:h-40 lg:h-48 object-cover group-hover:scale-110 transition-transform duration-300">` : `<div class="w-full h-32 md:h-40 lg:h-48 bg-gradient-to-br from-oxford-navy to-oxford-gold flex items-center justify-center"><svg class="w-8 h-8 md:w-12 lg:w-16 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/></svg></div>`}
                            <div class="absolute top-2 right-2 md:top-4 md:right-4">
                                <span class="px-2 py-0.5 md:px-3 md:py-1 text-xs font-bold rounded-full ${post.status === 'published' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white'} shadow-lg">
                                    ${post.status === 'published' ? 'PUBLISHED' : 'DRAFT'}
                                </span>
                            </div>
                        </div>
                        <div class="p-3 md:p-5 lg:p-8">
                            <div class="flex items-center mb-2 md:mb-3 lg:mb-4">
                                <svg class="w-3 h-3 md:w-4 lg:w-5 md:h-4 lg:h-5 text-oxford-gold mr-1 md:mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-xs md:text-sm font-semibold text-white bg-oxford-gold px-2 py-0.5 md:px-3 md:py-1 rounded-full">${post.kategori ? post.kategori.kategori : 'Uncategorized'}</span>
                            </div>
                            <h3 class="text-sm md:text-lg lg:text-2xl font-serif font-bold text-oxford-navy mb-2 md:mb-3 lg:mb-4 group-hover:text-oxford-gold transition-colors line-clamp-2">${post.judul}</h3>
                            <p class="text-xs md:text-sm text-gray-700 mb-3 md:mb-4 lg:mb-6 leading-tight md:leading-relaxed line-clamp-2 md:line-clamp-3">${post.konten.length > 100 ? post.konten.substring(0, 100) + '...' : post.konten}</p>
                           <button onclick="openPostModal(this)" 
    data-id="${post.id_p}" 
    data-title="${post.judul}" 
    data-content="${post.konten}" 
    data-category="${safeCategory}" 
    data-image="${safeImage}" 
    class="bg-gradient-to-r from-oxford-gold to-yellow-500 
    text-oxford-navy px-3 py-2 md:px-4 md:py-2.5 lg:px-6 lg:py-3 rounded-lg md:rounded-xl lg:rounded-full font-bold text-xs md:text-sm shadow-md md:shadow-lg 
    transform transition-all duration-300 w-full 
    hover:bg-[#c5a572] hover:from-[#c5a572] hover:to-[#c5a572]
    hover:text-white hover:shadow-xl md:hover:shadow-2xl hover:scale-105
    active:bg-[#c5a572] active:text-white active:scale-95">
    
    <svg class="w-3 h-3 md:w-4 md:h-4 inline mr-1 md:mr-2 transition-colors duration-300 group-hover:text-white" 
        fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" 
              d="M7.293 14.707a1 1 0 010-1.414L10 9.586l3.707 3.707a1 1 0 011.414 0l4-4a1 1 0 010-1.414l-4-4a1 1 0 01-1.414 0z" 
              clip-rule="evenodd"/>
    </svg>
    <span class="hidden md:inline">Baca Selengkapnya</span>
    <span class="md:hidden">Baca</span>
</button>
                        </div>
                    </div>
                    `;
                }).join('');
                
                document.getElementById('postsContainer').innerHTML = postsHtml;
            } catch (error) {
                console.error('Error loading posts:', error);
                document.getElementById('postsContainer').innerHTML = '<p class="text-gray-500">Gagal memuat berita</p>';
            }
        }

        // Load galleries
        // User Authentication State
        let currentUser = null;

        // Check if user is logged in on page load
        async function checkUserLogin() {
            try {
                const response = await axios.get('/auth/user');
                if (response.data.success && response.data.user) {
                    currentUser = response.data.user;
                    showUserInfo();
                }
            } catch (error) {
                console.log('No user logged in');
            }
        }

        // Show user info bar
        function showUserInfo() {
            document.getElementById('userDisplayName').textContent = currentUser.name;
            document.getElementById('userDisplayEmail').textContent = currentUser.email;
            document.getElementById('userInfoBar').classList.remove('hidden');
        }

        // Show Login Form
        function showLoginForm() {
            document.getElementById('loginFormContainer').classList.remove('hidden');
            document.getElementById('registerFormContainer').classList.add('hidden');
            
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');
            
            loginTab.classList.add('bg-oxford-navy', 'text-white', 'shadow-md');
            loginTab.classList.remove('text-gray-600');
            
            registerTab.classList.add('text-gray-600');
            registerTab.classList.remove('bg-oxford-navy', 'text-white', 'shadow-md');
            
            document.getElementById('authModalTitle').textContent = 'Welcome Back';
            document.getElementById('authModalSubtitle').textContent = 'Sign in to continue';
        }

        // Show Register Form
        function showRegisterForm() {
            document.getElementById('loginFormContainer').classList.add('hidden');
            document.getElementById('registerFormContainer').classList.remove('hidden');
            
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');
            
            registerTab.classList.add('bg-oxford-navy', 'text-white', 'shadow-md');
            registerTab.classList.remove('text-gray-600');
            
            loginTab.classList.add('text-gray-600');
            loginTab.classList.remove('bg-oxford-navy', 'text-white', 'shadow-md');
            
            document.getElementById('authModalTitle').textContent = 'Create Account';
            document.getElementById('authModalSubtitle').textContent = 'Join our community';
        }

        // Handle Login
        async function handleLogin(event) {
            event.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            const errorElement = document.getElementById('loginError');

            try {
                const response = await axios.post('/auth/login', {
                    email: email,
                    password: password
                });

                // Store the token and user data
                localStorage.setItem('token', response.data.token);
                currentUser = response.data.user;

                // Check for intended URL
                const intendedUrl = localStorage.getItem('intendedUrl');
                
                // Close the login modal
                closeLoginModal();

                // Update UI for logged-in user
                document.getElementById('userInfoBar').classList.remove('hidden');
                document.getElementById('userDisplayName').textContent = currentUser.name || currentUser.email;
                document.getElementById('userDisplayEmail').textContent = currentUser.email;

                // Hide login button and show user avatar in header
                document.getElementById('loginButton').classList.add('hidden');
                document.getElementById('userAvatar').classList.remove('hidden');
                document.getElementById('userAvatar').src = currentUser.avatar || 'https://ui-avatars.com/api/?name=' + encodeURIComponent(currentUser.name || currentUser.email) + '&background=0a1f44&color=fff';
                
                // Update UI for logged-in user
                updateUIForUser(currentUser);
                await loadGalleries();
                
                // Redirect if needed
                if (intendedUrl) {
                    localStorage.removeItem('intendedUrl');
                    window.location.href = intendedUrl;
                }
            } catch (error) {
                console.error('Login failed:', error);
                const errorMessage = error.response?.data?.message || 'Login failed. Please check your credentials.';
                errorElement.textContent = errorMessage;
                errorElement.classList.remove('hidden');
            } finally {
                btn.disabled = false;
                btn.textContent = 'Login';
            }
        }

        // Handle Register
        async function handleRegister(event) {
            event.preventDefault();
            const name = document.getElementById('registerName').value;
            const email = document.getElementById('registerEmail').value;
            const password = document.getElementById('registerPassword').value;
            const btn = document.getElementById('registerBtn');
            const errorDiv = document.getElementById('registerError');
            
            btn.disabled = true;
            btn.textContent = 'Creating account...';
            errorDiv.classList.add('hidden');
            
            try {
                const response = await axios.post('/auth/register', { name, email, password });
                
                if (response.data.success) {
                    currentUser = response.data.user;
                    closeLoginModal();
                    showUserInfo();
                    alert(`Welcome, ${currentUser.name}! Your account has been created successfully.`);
                    // Reload galleries to show updated stats
                    loadGalleries();
                }
            } catch (error) {
                const errorText = document.getElementById('registerErrorText') || errorDiv;
                const errors = error.response?.data?.errors;
                if (errors) {
                    const errorMessages = Object.values(errors).flat().join(', ');
                    errorText.textContent = errorMessages;
                } else {
                    errorText.textContent = error.response?.data?.message || 'Registration failed. Please try again.';
                }
                errorDiv.classList.remove('hidden');
            } finally {
                btn.disabled = false;
                btn.textContent = 'Create Account';
            }
        }

        // Handle Logout
        async function handleLogout() {
            if (confirm('Are you sure you want to logout?')) {
                try {
                    await axios.post('/auth/logout');
                    currentUser = null;
                    document.getElementById('userInfoBar').classList.add('hidden');
                    alert('You have been logged out successfully.');
                    // Reload galleries to reset stats
                    loadGalleries();
                } catch (error) {
                    console.error('Logout error:', error);
                }
            }
        }

        // Open Login Modal
        function openLoginModal() {
            showLoginForm(); // Default to login form
            document.getElementById('loginModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Close Login Modal
        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.getElementById('loginError').classList.add('hidden');
            document.getElementById('registerError').classList.add('hidden');
            document.getElementById('loginForm').reset();
            document.getElementById('registerForm').reset();
            document.body.style.overflow = 'auto';
        }

        // Check if user is authenticated
        function requireAuth(action) {
            if (!currentUser) {
                openLoginModal();
                return false;
            }
            return true;
        }

        // Gallery stats cache
        const galleryStats = {};

        async function loadGalleries() {
            try {
                const galleries = @json($galleries ?? []);
                
                // Load stats for each gallery from database
                for (const gallery of galleries) {
                    try {
                        const statsResponse = await axios.get(`/gallery/${gallery.id_g}/stats`);
                        if (statsResponse.data.success) {
                            galleryStats[gallery.id_g] = statsResponse.data;
                        }
                    } catch (error) {
                        console.error(`Error loading stats for gallery ${gallery.id_g}:`, error);
                        galleryStats[gallery.id_g] = {
                            likes: 0,
                            views: 0,
                            comments: [],
                            user_liked: false
                        };
                    }
                }
                
                const galleriesHtml = galleries.map((gallery, index) => {
                    const stats = galleryStats[gallery.id_g] || { likes: 0, views: 0, comments: [], user_liked: false };
                    const photoCount = gallery.fotos?.length || 0;
                    
                    // Debug: Check gallery data
                    console.log('Gallery data:', {
                        id: gallery.id_g,
                        judul: gallery.judul,
                        deskripsi: gallery.deskripsi,
                        kategori: gallery.kategori,
                        post: gallery.post
                    });
                    
                    return `
                    <div class="bg-white rounded-lg md:rounded-2xl lg:rounded-3xl shadow-lg md:shadow-xl overflow-hidden hover:shadow-xl md:hover:shadow-2xl transform hover:-translate-y-1 md:hover:-translate-y-2 transition-all duration-300 group">
                        <!-- Single Image Preview -->
                        <div class="relative overflow-hidden h-40 md:h-56 lg:h-80">
                            ${gallery.fotos && gallery.fotos.length > 0 ? `
                                <img src="/${gallery.fotos[0].file}" alt="${gallery.judul || gallery.post?.judul || 'Gallery'}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            ` : `
                                <div class="w-full h-full bg-gradient-to-br from-oxford-navy to-blue-900 flex items-center justify-center">
                                    <svg class="w-10 h-10 md:w-16 lg:w-20 md:h-16 lg:h-20 text-oxford-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            `}
                            
                            <!-- Gallery Title Overlay -->
                            <div class="absolute bottom-0 left-0 right-0 p-2 md:p-4 lg:p-6 text-white">
                                <h3 class="text-sm md:text-lg lg:text-2xl font-bold mb-1 md:mb-2 line-clamp-1 md:line-clamp-2 drop-shadow-lg">
                                    ${gallery.judul || gallery.post?.judul || 'Gallery Collection'}
                                </h3>
                                <div class="flex items-center gap-1.5 md:gap-3">
                                    <!-- Photo Count -->
                                    <div class="flex items-center gap-1 md:gap-1.5 bg-white/20 backdrop-blur-sm px-2 py-0.5 md:px-3 md:py-1 rounded-full text-xs md:text-sm font-semibold">
                                        <svg class="w-3 h-3 md:w-4 md:h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="hidden md:inline">${photoCount} Photos</span>
                                        <span class="md:hidden">${photoCount}</span>
                                    </div>
                                    <!-- Category -->
                                    ${gallery.kategori?.kategori || gallery.post?.kategori?.nama ? `
                                        <div class="bg-oxford-gold/90 backdrop-blur-sm text-oxford-navy px-2 py-0.5 md:px-3 md:py-1 rounded-full text-xs md:text-sm font-bold truncate max-w-[100px] md:max-w-none">
                                            ${gallery.kategori?.kategori || gallery.post.kategori.nama}
                                        </div>
                                    ` : ''}
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3 md:p-4 lg:p-6">
                            <!-- Title -->
                            <h3 class="text-sm md:text-base lg:text-xl font-bold text-oxford-navy mb-1 md:mb-2 line-clamp-1">
                                ${gallery.judul || gallery.post?.judul || 'Gallery Collection'}
                            </h3>
                            
                            <!-- Description -->
                            <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4 line-clamp-1 md:line-clamp-2">
                                ${gallery.deskripsi || (gallery.post?.konten ? gallery.post.konten.substring(0, 100) + '...' : 'Explore our collection of memorable moments')}
                            </p>

                            <!-- View Details Button -->
                            <button onclick="viewGalleryDetails(${gallery.id_g})" 
                                class="block w-full bg-gradient-to-r from-oxford-navy to-blue-900 hover:from-oxford-gold hover:to-yellow-500 text-oxford-navy hover:text-oxford-navy px-3 py-2 md:px-4 md:py-2.5 lg:py-3 rounded-lg md:rounded-xl font-bold text-xs md:text-sm text-center shadow-md md:shadow-lg hover:shadow-lg md:hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                                <span class="hidden md:inline text-oxford-navy hover:text-oxford-navy">View Details</span>
                                <span class="md:hidden text-oxford-navy hover:text-oxford-navy">View</span>
                            </button>
                        </div>
                    </div>
                `}).join('');
                
                document.getElementById('galleriesContainer').innerHTML = galleriesHtml;
            } catch (error) {
                console.error('Error loading galleries:', error);
                document.getElementById('galleriesContainer').innerHTML = '<p class="text-gray-500">Failed to load galleries</p>';
            }
        }

        // View All Galleries (Requires Auth)
        function viewAllGalleries() {
            const galleryUrl = "{{ route('gallery.index') }}";

            // Check if user is logged in
            if (!currentUser) {
                // Simpan URL yang ingin dituju, supaya setelah login bisa diarahkan ke sana
                localStorage.setItem('intendedUrl', galleryUrl);

                // If not logged in, show login modal
                alert('Silakan login untuk melihat galeri');
                openLoginModal();
                return;
            }

            // If logged in, redirect directly to gallery page
            window.location.href = galleryUrl;
            
            // After successful login, the page will reload and check for intended URL
            // The login success handler will handle the redirection to the intended URL
        }

        // View Gallery Details (Requires Auth)
        async function viewGalleryDetails(galleryId) {
            if (!currentUser) {
                alert('Please login to view gallery details');
                openLoginModal();
                return;
            }
            
            try {
                // Record the view before redirecting
                await axios.post(`/api/galleries/${galleryId}/view`);
                
                // Then redirect to gallery page
                window.location.href = `/gallery/${galleryId}`;
            } catch (error) {
                console.error('Error recording view:', error);
                // Still redirect even if view recording fails
                window.location.href = `/gallery/${galleryId}`;
            }
        }

        async function toggleLike(galleryId, button) {
            
            const icon = document.getElementById(`like-icon-${galleryId}`);
            const count = document.getElementById(`like-count-${galleryId}`);
            
            try {
                const response = await axios.post(`/gallery/${galleryId}/like`);
                
                if (response.data.success) {
                    // Update UI based on response
                    if (response.data.liked) {
                        icon.classList.add('fill-current', 'text-red-500');
                        // Animation
                        icon.style.transform = 'scale(1.3)';
                        setTimeout(() => icon.style.transform = 'scale(1)', 200);
                    } else {
                        icon.classList.remove('fill-current', 'text-red-500');
                    }
                    
                    count.textContent = response.data.total_likes;
                    
                    // Update cache
                    if (galleryStats[galleryId]) {
                        galleryStats[galleryId].likes = response.data.total_likes;
                        galleryStats[galleryId].user_liked = response.data.liked;
                    }
                }
            } catch (error) {
                console.error('Error toggling like:', error);
                if (error.response?.status === 401) {
                    alert('Please login to like this gallery');
                    openLoginModal();
                }
            }
        }

        // Share Gallery Function
        function shareGallery(galleryId, title) {
            if (navigator.share) {
                navigator.share({
                    title: title,
                    text: `Check out this gallery: ${title}`,
                    url: window.location.href
                }).catch(err => console.log('Share cancelled'));
            } else {
                // Fallback: Copy to clipboard
                navigator.clipboard.writeText(window.location.href);
                alert('Link copied to clipboard!');
            }
        }

        // Download Gallery Function
        function downloadGallery(galleryId) {
            alert('Download feature will be implemented soon!');
            // In production, this would trigger a zip download of all gallery images
        }

        // Open Comments Modal (Requires Auth)
        async function openComments(galleryId) {
            if (!requireAuth('comment')) return;
            
            try {
                // Fetch latest comments from database
                const response = await axios.get(`/gallery/${galleryId}/stats`);
                const comments = response.data.comments || [];
                
                // Create comments modal
                const modal = document.createElement('div');
                modal.id = 'commentsModal';
                modal.className = 'fixed inset-0 bg-black bg-opacity-70 z-[100] flex items-center justify-center p-4';
                
                const commentsHtml = comments.map(c => `
                    <div class="bg-gray-50 rounded-lg p-4 mb-3">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-oxford-navy rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-oxford-gold font-bold text-sm">${c.user.name.charAt(0).toUpperCase()}</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <p class="font-bold text-oxford-navy">${c.user.name}</p>
                                    <span class="text-xs text-gray-500">${new Date(c.created_at).toLocaleString()}</span>
                                </div>
                                <p class="text-gray-700">${c.comment}</p>
                            </div>
                        </div>
                    </div>
                `).join('');
                
                modal.innerHTML = `
                    <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[80vh] overflow-hidden shadow-2xl">
                        <div class="bg-gradient-to-r from-oxford-navy to-blue-900 p-6 text-white">
                            <div class="flex justify-between items-center">
                                <h3 class="text-2xl font-serif font-bold">Comments (${comments.length})</h3>
                                <button onclick="closeCommentsModal()" class="text-white hover:text-oxford-gold transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-6 max-h-96 overflow-y-auto" id="commentsListContainer">
                            ${comments.length > 0 ? commentsHtml : '<p class="text-gray-500 text-center py-8">No comments yet. Be the first to comment!</p>'}
                        </div>
                        <div class="p-6 border-t border-gray-200">
                            <form onsubmit="addComment(event, ${galleryId})" class="flex gap-3">
                                <input type="text" id="commentInput" required placeholder="Write a comment..." 
                                    class="flex-1 px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-oxford-gold focus:outline-none">
                                <button type="submit" id="commentSubmitBtn" class="bg-oxford-navy text-white px-6 py-3 rounded-xl font-bold hover:bg-oxford-gold hover:text-oxford-navy transition-colors">
                                    Post
                                </button>
                            </form>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(modal);
                document.body.style.overflow = 'hidden';
            } catch (error) {
                console.error('Error loading comments:', error);
                alert('Failed to load comments. Please try again.');
            }
        }

        // Close Comments Modal
        function closeCommentsModal() {
            const modal = document.getElementById('commentsModal');
            if (modal) {
                modal.remove();
                document.body.style.overflow = 'auto';
            }
        }

        // Add Comment Function
        async function addComment(event, galleryId) {
            event.preventDefault();
            const input = document.getElementById('commentInput');
            const text = input.value.trim();
            const btn = document.getElementById('commentSubmitBtn');
            
            if (text) {
                btn.disabled = true;
                btn.textContent = 'Posting...';
                
                try {
                    const response = await axios.post(`/gallery/${galleryId}/comment`, {
                        comment: text
                    });
                    
                    if (response.data.success) {
                        // Update comment count
                        const countEl = document.getElementById(`comment-count-${galleryId}`);
                        if (countEl) {
                            const currentCount = parseInt(countEl.textContent);
                            countEl.textContent = currentCount + 1;
                        }
                        
                        // Update cache
                        if (galleryStats[galleryId]) {
                            galleryStats[galleryId].comments.push(response.data.comment);
                        }
                        
                        // Reopen modal to show new comment
                        closeCommentsModal();
                        openComments(galleryId);
                    }
                } catch (error) {
                    console.error('Error adding comment:', error);
                    alert('Failed to add comment. Please try again.');
                } finally {
                    btn.disabled = false;
                    btn.textContent = 'Post';
                }
            }
        }

        // Load agendas
        async function loadAgendas() {
            try {
                const agendas = @json($agendas ?? []);
                
                const agendasHtml = agendas.map(agenda => {
                    const agendaDate = new Date(agenda.tanggal);
                    const statusColor = agenda.status === 'upcoming' ? 'bg-blue-500' : 
                                      agenda.status === 'ongoing' ? 'bg-green-500' : 'bg-gray-500';
                    const statusText = agenda.status === 'upcoming' ? 'AKAN DATANG' : 
                                     agenda.status === 'ongoing' ? 'BERLANGSUNG' : 'SELESAI';
                    
                    return `
                    <div class="bg-white rounded-lg md:rounded-xl lg:rounded-2xl shadow-md md:shadow-lg border border-gray-100 overflow-hidden hover:shadow-lg md:hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 group">
                        <!-- Header dengan tanggal -->
                        <div class="bg-gradient-to-r from-oxford-navy to-oxford-navy-light p-3 md:p-4 lg:p-6 relative">
                            <div class="flex items-center justify-between">
                                <div class="text-white">
                                    <div class="flex items-center space-x-2 md:space-x-3">
                                        <div class="bg-oxford-gold rounded-full p-2 md:p-3">
                                            <svg class="w-4 h-4 md:w-5 lg:w-6 md:h-5 lg:h-6 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-lg md:text-xl lg:text-2xl font-bold text-oxford-gold">${agendaDate.getDate()}</div>
                                            <div class="text-xs md:text-sm text-oxford-gold opacity-90 hidden md:block">${agendaDate.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' })}</div>
                                            <div class="text-xs text-oxford-gold opacity-90 md:hidden">${agendaDate.toLocaleDateString('id-ID', { month: 'short' })}</div>
                                        </div>
                                    </div>
                                </div>
                                <span class="px-2 py-0.5 md:px-3 md:py-1 text-xs font-bold rounded-full ${statusColor} text-white shadow-lg">
                                    ${statusText}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-3 md:p-4 lg:p-6">
                            <!-- Waktu dan Lokasi -->
                            <div class="flex flex-col md:flex-row md:flex-wrap gap-1.5 md:gap-3 mb-3 md:mb-4">
                                ${agenda.waktu ? `
                                <div class="flex items-center text-gray-600 bg-gray-50 px-2 py-1 md:px-3 rounded-full text-xs md:text-sm">
                                    <svg class="w-3 h-3 md:w-4 md:h-4 mr-1 md:mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    ${agenda.waktu}
                                </div>
                                ` : ''}
                                <div class="flex items-center text-gray-600 bg-gray-50 px-2 py-1 md:px-3 rounded-full text-xs md:text-sm">
                                    <svg class="w-3 h-3 md:w-4 md:h-4 mr-1 md:mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="truncate">${agenda.lokasi || 'Oxford High School'}</span>
                                </div>
                            </div>
                            
                            <!-- Judul -->
                            <h3 class="text-sm md:text-base lg:text-xl font-serif font-bold text-oxford-navy mb-3 md:mb-4 lg:mb-6 group-hover:text-oxford-gold transition-colors leading-tight line-clamp-2">
                                ${agenda.judul}
                            </h3>
                            
                            <!-- Button -->
                            <button class="agenda-detail-btn w-full 
    bg-gradient-to-r from-oxford-gold to-yellow-500 
    text-oxford-navy px-3 py-2 md:px-4 md:py-2.5 lg:py-3 rounded-lg md:rounded-xl font-semibold text-xs md:text-sm 
    transition-all duration-300 transform hover:scale-105 active:scale-95 
    shadow-sm md:shadow-md hover:shadow-lg md:hover:shadow-2xl
    hover:bg-[#c5a572] hover:from-[#c5a572] hover:to-[#c5a572]
    hover:text-white active:bg-[#c5a572] active:text-white"
    
    data-title="${agenda.judul}"
    data-description="${agenda.deskripsi}"
    data-date="${agendaDate.toLocaleDateString('id-ID')}"
    data-time="${agenda.waktu || ''}"
    data-location="${agenda.lokasi || 'Oxford High School'}"
    data-status="${statusText}">
    
    <svg class="w-3 h-3 md:w-4 md:h-4 inline mr-1 md:mr-2 transition-colors duration-300 group-hover:text-white" 
        fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" 
              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" 
              clip-rule="evenodd"/>
    </svg>
    <span class="hidden md:inline">Lihat Detail</span>
    <span class="md:hidden">Detail</span>
</button>

                        </div>
                    </div>
                `}).join('');
                
                document.getElementById('agendasContainer').innerHTML = agendasHtml;
                
                // Add event listeners to agenda detail buttons
                document.querySelectorAll('.agenda-detail-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const title = this.getAttribute('data-title');
                        const description = this.getAttribute('data-description');
                        const date = this.getAttribute('data-date');
                        const time = this.getAttribute('data-time');
                        const location = this.getAttribute('data-location');
                        const status = this.getAttribute('data-status');
                        
                        openAgendaModal(title, description, date, time, location, status);
                    });
                });
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
                                Detail Agenda
                            </button>
                        </div>
                    </div>
                `).join('');
                
                document.getElementById('profilesContainer').innerHTML = profilesHtml;
            } catch (error) {
                console.error('Error loading profiles:', error);
                document.getElementById('profilesContainer').innerHTML = '';
            }
        }

        // Back to home function
        function goHome() {
            window.location.href = '/';
        }

        // Open post modal function (Requires Auth)
        function openPostModal(buttonElement) {
            if (!requireAuth('view post')) return;
            
            try {
                let title = buttonElement.getAttribute('data-title') || '';
                let content = buttonElement.getAttribute('data-content') || '';
                let category = buttonElement.getAttribute('data-category') || '';
                let image = buttonElement.getAttribute('data-image') || '';
                
                // Clean and preserve formatting
                title = title || '';
                content = content || '';
                
                // Convert newlines to HTML breaks and preserve HTML formatting
                content = content.replace(/\n/g, '<br>')
                    .replace(/&lt;/g, '<')
                    .replace(/&gt;/g, '>')
                    .replace(/&amp;/g, '&');
                
                document.getElementById('modalTitle').textContent = title;
                document.getElementById('modalCategory').textContent = category;
                document.getElementById('modalContent').innerHTML = content;
                
                const modalImage = document.getElementById('modalImage');
                if (image && image !== '' && image !== 'undefined') {
                    modalImage.src = '/' + image;
                    modalImage.style.display = 'block';
                } else {
                    modalImage.style.display = 'none';
                }
                
                document.getElementById('postModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } catch (error) {
                console.error('Error opening modal:', error);
                console.log('Button element:', buttonElement);
                console.log('Data attributes:', {
                    title: buttonElement.getAttribute('data-title'),
                    content: buttonElement.getAttribute('data-content'),
                    category: buttonElement.getAttribute('data-category'),
                    image: buttonElement.getAttribute('data-image')
                });
            }
        }

        // Close post modal function
        function closePostModal() {
            const modal = document.getElementById('postModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
            document.body.style.position = 'static';
            document.body.style.height = 'auto';
            document.body.style.width = '100%';
            document.body.style.top = 'auto';
        }

        // Profile modal functions
        function openProfileModal() {
            document.getElementById('profileModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeProfileModal() {
            document.getElementById('profileModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.id === 'postModal') {
                closePostModal();
            }
            if (e.target.id === 'galleryModal') {
                closeGalleryModal();
            }
            if (e.target.id === 'imageModal') {
                closeImageModal();
            }
            if (e.target.id === 'profileModal') {
                closeProfileModal();
            }
        });

        // Open gallery modal function
        function openGalleryModal(title, description, photos) {
            try {
                document.getElementById('galleryModalTitle').textContent = title;
                document.getElementById('galleryModalDescription').textContent = description;
                
                const photosContainer = document.getElementById('galleryPhotosContainer');
                
                if (photos && photos.length > 0) {
                    const photosHtml = photos.map(photo => `
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="relative group cursor-pointer" onclick="openImageModal('/${photo.file}', '${photo.judul && !photo.judul.includes('.jpeg') && !photo.judul.includes('.jpg') && !photo.judul.includes('.png') ? photo.judul : ''}', '')"> 
                                <img src="/${photo.file}" 
                                     alt="${photo.judul}" 
                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zM12 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1V4zM12 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-3z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-4">
                                ${photo.judul && !photo.judul.includes('.jpeg') && !photo.judul.includes('.jpg') && !photo.judul.includes('.png') ? `<h4 class="font-serif font-bold text-lg text-oxford-navy mb-2">${photo.judul}</h4>` : ''}
                            </div>
                        </div>
                    `).join('');
                    photosContainer.innerHTML = photosHtml;
                } else {
                    photosContainer.innerHTML = `
                        <div class="col-span-full text-center py-12">
                            <svg class="w-24 h-24 mx-auto text-gray-300 mb-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                            </svg>
                            <h3 class="text-2xl font-serif font-bold text-gray-400 mb-2">Belum Ada Foto</h3>
                            <p class="text-gray-500">Galeri ini belum memiliki foto yang dapat ditampilkan.</p>
                        </div>
                    `;
                }
                
                document.getElementById('galleryModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } catch (error) {
                console.error('Error opening gallery modal:', error);
            }
        }

        // Close gallery modal function
        function closeGalleryModal() {
            document.getElementById('galleryModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Enhanced Gallery Modal Function (Requires Auth)
        async function openEnhancedGalleryModal(galleryId, title, description, photos) {
            if (!requireAuth('view gallery')) return;
            
            // Record view in database
            try {
                const response = await axios.post(`/gallery/${galleryId}/view`);
                if (response.data.success) {
                    // Update view count in UI
                    const viewCountEl = document.getElementById(`view-count-${galleryId}`);
                    if (viewCountEl) {
                        viewCountEl.textContent = response.data.total_views;
                    }
                    
                    // Update cache
                    if (galleryStats[galleryId]) {
                        galleryStats[galleryId].views = response.data.total_views;
                    }
                }
            } catch (error) {
                console.error('Error recording view:', error);
            }
            
            // Use the existing modal but with enhanced content
            openGalleryModal(title, description, photos);
        }

        // Open image modal function
        function openImageModal(src, title, description) {
            document.getElementById('imageModalImg').src = src;
            document.getElementById('imageModalTitle').textContent = title;
            document.getElementById('imageModalDescription').textContent = description || '';
            document.getElementById('imageModal').classList.remove('hidden');
        }

        // Close image modal function
        function closeImageModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }

        // Open agenda modal function (Requires Auth)
        function openAgendaModal(title, description, date, time, location, status) {
            if (!requireAuth('view agenda')) return;
            
            document.getElementById('agendaModalTitle').textContent = title;
            document.getElementById('agendaModalDescription').textContent = description;
            document.getElementById('agendaModalDate').textContent = date;
            document.getElementById('agendaModalTime').textContent = time || 'Tidak ditentukan';
            document.getElementById('agendaModalLocation').textContent = location;
            document.getElementById('agendaModalStatus').textContent = status;
            
            // Set status color
            const statusElement = document.getElementById('agendaModalStatus');
            statusElement.className = 'inline-block px-4 py-2 rounded-full text-sm font-bold text-white shadow-lg ';
            if (status === 'AKAN DATANG') {
                statusElement.className += 'bg-blue-500';
            } else if (status === 'BERLANGSUNG') {
                statusElement.className += 'bg-green-500';
            } else {
                statusElement.className += 'bg-gray-500';
            }
            
            // Show modal with animation
            const modal = document.getElementById('agendaModal');
            const modalContent = document.getElementById('agendaModalContent');
            
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            
            // Trigger animation
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        // Close agenda modal function
        function closeAgendaModal() {
            const modal = document.getElementById('agendaModal');
            const modalContent = document.getElementById('agendaModalContent');
            
            // Animate out
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            
            // Hide modal after animation
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }
    </script>

    <!-- Post Modal -->
    <div id="postModal" class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4 hide-scrollbar">
        <div class="bg-white rounded-3xl md:rounded-4xl max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl hide-scrollbar relative">
            <!-- Back Button -->
            <button onclick="closePostModal()" class="absolute top-6 left-6 z-50 text-oxford-navy hover:text-oxford-gold transition-colors bg-white/90 hover:bg-white rounded-full p-2.5 shadow-lg transform hover:scale-105">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <div class="bg-gradient-to-r from-oxford-navy to-oxford-navy-light p-6 text-white rounded-t-2xl pl-16 pt-16">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 id="modalTitle" class="text-2xl font-serif font-bold mb-2 text-oxford-gold"></h2>
                        <span id="modalCategory" class="inline-block bg-oxford-gold text-oxford-navy px-3 py-1 rounded-full text-sm font-bold"></span>
                    </div>
                    <button onclick="closePostModal()" class="text-white hover:text-oxford-gold transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <img id="modalImage" class="w-full h-64 object-cover rounded-xl mb-6" alt="Post image">
                <div id="modalContent" class="text-gray-800 leading-relaxed text-lg prose prose-lg max-w-none" style="white-space: pre-wrap; word-wrap: break-word;"></div>
            </div>
        </div>
    </div>

    <!-- Gallery Modal -->
    <div id="galleryModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hide-scrollbar">
        <div class="bg-white rounded-3xl md:rounded-4xl max-w-6xl w-full max-h-[90vh] overflow-y-auto shadow-2xl hide-scrollbar">
            <div class="bg-gradient-to-r from-oxford-navy to-oxford-navy-light p-6 text-white rounded-t-3xl md:rounded-t-4xl">
                <!-- Back Button -->
                <button onclick="document.getElementById('galleryModal').classList.add('hidden')" class="absolute top-6 left-6 text-oxford-gold hover:text-white transition-colors">
                    <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <!-- Close Button -->
                <div class="flex justify-between items-start">
                    <div>
                        <h2 id="galleryModalTitle" class="text-2xl font-serif font-bold mb-2 text-oxford-gold"></h2>
                        <span class="inline-block bg-oxford-gold text-white px-3 py-1 rounded-full text-sm font-bold">Gallery Collection</span>
                    </div>
                    <button onclick="closeGalleryModal()" class="text-white hover:text-oxford-gold transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <p id="galleryModalDescription" class="text-gray-600 text-lg mb-6 leading-relaxed"></p>
                <div id="galleryPhotosContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Photos will be loaded here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Agenda Modal -->
    <div id="agendaModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hide-scrollbar">
        <div class="bg-white rounded-3xl md:rounded-4xl max-w-3xl w-full max-h-[90vh] overflow-y-auto shadow-2xl transform transition-all duration-300 scale-95 opacity-0 relative hide-scrollbar" id="agendaModalContent">
            <!-- Back Button -->
            <button onclick="closeAgendaModal()" class="absolute top-6 left-6 z-50 text-oxford-navy hover:text-oxford-gold transition-colors bg-white/80 hover:bg-white/90 rounded-full p-2 shadow-md">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <!-- Header dengan gradient dan pattern -->
            <div class="relative bg-gradient-to-br from-oxford-navy via-oxford-navy-light to-blue-900 pt-20 pb-8 px-8 overflow-hidden">
                <!-- Background pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px), radial-gradient(circle at 75% 75%, white 1px, transparent 1px); background-size: 50px 50px, 25px 25px;"></div>
                </div>
                
                <div class="relative z-10">
                    <!-- Title -->
                    <h2 id="agendaModalTitle" class="text-3xl font-serif font-bold mb-3 text-oxford-gold leading-tight drop-shadow-lg"></h2>
                    
                    <!-- Status -->
                    <span id="agendaModalStatus" class="inline-block px-4 py-2 rounded-full text-sm font-bold text-white bg-blue-500 shadow-lg"></span>
                </div>
            </div>
            
            <!-- Content -->
            <div class="p-8">
                <!-- Event Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Date Card -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border border-blue-200">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-blue-800">Tanggal</h4>
                        </div>
                        <p id="agendaModalDate" class="text-blue-800 font-semibold text-lg"></p>
                    </div>
                    
                    <!-- Time Card -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 border border-green-200">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-green-800">Waktu</h4>
                        </div>
                        <p id="agendaModalTime" class="text-green-800 font-semibold text-lg"></p>
                    </div>
                    
                    <!-- Location Card -->
                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 border border-orange-200">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h4 class="font-semibold text-orange-800">Lokasi</h4>
                        </div>
                        <p id="agendaModalLocation" class="text-orange-800 font-semibold text-lg"></p>
                    </div>
                </div>
                
                <!-- Description Section -->
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 border border-gray-200 mb-8">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-oxford-navy rounded-full flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-serif font-bold text-oxford-navy">Deskripsi Kegiatan</h3>
                    </div>
                    <p id="agendaModalDescription" class="text-gray-800 leading-relaxed text-lg font-medium"></p>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4 hide-scrollbar">
        <div class="relative max-w-4xl w-full bg-white rounded-3xl md:rounded-4xl overflow-y-auto hide-scrollbar shadow-2xl">
            <!-- Back Button -->
            <button onclick="document.getElementById('imageModal').classList.add('hidden')" class="absolute top-6 left-6 z-10 text-white hover:text-oxford-gold transition-colors">
                <svg class="w-6 h-6 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white hover:text-oxford-gold z-10 bg-black bg-opacity-50 rounded-full p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div class="relative">
                <img id="imageModalImg" class="w-full h-auto" alt="Full size image">
            </div>
            <div class="bg-white p-6">
                <h3 id="imageModalTitle" class="text-2xl font-serif font-bold text-oxford-navy mb-2"></h3>
                <p id="imageModalDescription" class="text-gray-600"></p>
            </div>
        </div>
    </div>

    <script>
        // Mobile Menu Toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobileMenu a, #mobileMenu button').forEach(item => {
            item.addEventListener('click', function() {
                document.getElementById('mobileMenu').classList.add('hidden');
            });
        });
    </script>
</body>
</html>
