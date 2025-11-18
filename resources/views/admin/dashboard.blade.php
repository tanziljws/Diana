<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Oxford High School</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --oxford-navy: #002147;
            --oxford-blue: #0f4c75;
            --oxford-gold: #c5a572;
            --oxford-cream: #f7f5f3;
            --oxford-dark-blue: #001a35;
            --oxford-light-blue: #4a90a4;
            --oxford-accent: #8b9dc3;
            --oxford-silver: #9b9b9b;
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
        .font-script { font-family: 'Dancing Script', cursive; }
        .bg-oxford-navy { background-color: var(--oxford-navy); }
        .bg-oxford-blue { background-color: var(--oxford-blue); }
        .bg-oxford-gold { background-color: var(--oxford-gold); }
        .bg-oxford-cream { background-color: var(--oxford-cream); }
        .text-oxford-navy { color: var(--oxford-navy); }
        .text-oxford-gold { color: var(--oxford-gold); }
        .text-oxford-cream { color: var(--oxford-cream); }
        .text-oxford-blue { color: var(--oxford-blue); }
        .border-oxford-gold { border-color: var(--oxford-gold); }
        .border-oxford-navy { border-color: var(--oxford-navy); }
        
        .oxford-gradient {
            background: linear-gradient(135deg, var(--oxford-navy) 0%, var(--oxford-blue) 100%);
        }
        
        .oxford-card {
            background: var(--oxford-cream);
            border: 2px solid var(--oxford-gold);
            box-shadow: 0 8px 32px rgba(0, 33, 71, 0.1);
        }
        
        .oxford-btn-primary {
            background: var(--oxford-navy);
            color: var(--oxford-cream);
            border: 2px solid var(--oxford-gold);
            transition: all 0.3s ease;
        }
        
        .oxford-btn-primary:hover {
            background: var(--oxford-gold);
            color: var(--oxford-navy);
        }
        
        .oxford-sidebar {
            background: linear-gradient(180deg, var(--oxford-navy) 0%, var(--oxford-dark-blue) 100%);
            border-right: 4px solid var(--oxford-gold);
        }
        
        .oxford-logo-bg {
            background-image: url('/oxford-logo.svg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 200px;
            background-attachment: fixed;
            opacity: 0.03;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
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
        
        .subtle-glow {
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
        }
        .subtle-glow:hover {
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }
    </style>
</head>
<body class="bg-oxford-cream font-sans relative">
    <!-- Oxford Logo Background -->
    <div class="oxford-logo-bg"></div>
    
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="oxford-sidebar text-oxford-cream w-72 h-screen fixed left-0 top-0 p-6 overflow-y-auto">
            <div class="flex items-center mb-8 pb-6 border-b border-oxford-gold border-opacity-30">
                <img src="/oxford-logo.svg" alt="Oxford Logo" class="h-12 w-12 mr-4">
                <div>
                    <h1 class="text-3xl font-serif font-bold text-white">Oxford High School</h1>
                    <p class="text-oxford-gold font-medium font-script">Admin Dashboard</p>
                </div>
            </div>
            
            <nav class="space-y-2">
                <a href="#" onclick="showSection('dashboard')" class="flex items-center px-4 py-3 bg-oxford-gold text-oxford-navy rounded-lg font-semibold shadow-lg" id="nav-dashboard">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                    Dashboard
                </a>
                <a href="#" onclick="showSection('posts')" class="flex items-center px-4 py-3 hover:bg-oxford-blue hover:bg-opacity-30 rounded-lg transition-all duration-200" id="nav-posts">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z"/>
                    </svg>
                    Posts & News
                </a>
                <a href="#" onclick="showSection('categories')" class="flex items-center px-4 py-3 hover:bg-oxford-blue hover:bg-opacity-30 rounded-lg transition-all duration-200" id="nav-categories">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                    </svg>
                    Categories
                </a>
                <a href="#" onclick="showSection('galleries')" class="flex items-center px-4 py-3 hover:bg-oxford-blue hover:bg-opacity-30 rounded-lg transition-all duration-200" id="nav-galleries">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                    </svg>
                    Galleries
                </a>
                <a href="#" onclick="showSection('agendas')" class="flex items-center px-4 py-3 hover:bg-oxford-blue hover:bg-opacity-30 rounded-lg transition-all duration-200" id="nav-agendas">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/>
                    </svg>
                    Agendas
                </a>
            </nav>
            
            <div class="mt-auto pt-8">
                <button onclick="logout()" class="bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white px-4 py-2 rounded-full transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:scale-105">
                    <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                    </svg>
                    Logout
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-72">
            <header class="oxford-card rounded-none border-l-0 border-r-0 border-t-0 px-8 py-6 mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-serif font-bold text-oxford-navy" id="pageTitle">Dashboard</h2>
                        <p class="text-oxford-gold italic font-medium font-script">Oxford High School Administration</p>
                    </div>
                    <div class="relative">
                        <div class="absolute -inset-2 bg-gradient-to-r from-oxford-gold to-yellow-500 rounded-full opacity-20 blur-lg"></div>
                        <div class="relative bg-gradient-to-br from-oxford-navy to-blue-900 p-4 rounded-2xl shadow-xl">
                            <svg class="w-10 h-10 text-oxford-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </header>

            <main class="p-8">
                <!-- Dashboard Overview -->
                <div id="dashboardSection">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="oxford-card rounded-xl p-6 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-oxford-navy text-sm font-semibold uppercase tracking-wide mb-2">Posts</p>
                                    <p class="text-4xl font-bold text-oxford-navy" id="totalPosts">{{ $totalPosts ?? 0 }}</p>
                                </div>
                                <div class="bg-oxford-navy p-4 rounded-xl shadow-lg">
                                    <svg class="w-8 h-8 text-oxford-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="oxford-card rounded-xl p-6 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-oxford-navy text-sm font-semibold uppercase tracking-wide mb-2">Categories</p>
                                    <p class="text-4xl font-bold text-oxford-navy" id="totalCategories">{{ $totalCategories ?? 0 }}</p>
                                </div>
                                <div class="bg-oxford-gold p-4 rounded-xl shadow-lg">
                                    <svg class="w-8 h-8 text-oxford-navy" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="oxford-card rounded-xl p-6 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-oxford-navy text-sm font-semibold uppercase tracking-wide mb-2">Galleries</p>
                                    <p class="text-4xl font-bold text-oxford-navy" id="totalGalleries">{{ $totalGalleries ?? 0 }}</p>
                                </div>
                                <div class="bg-oxford-navy p-4 rounded-xl shadow-lg">
                                    <svg class="w-8 h-8 text-oxford-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="oxford-card rounded-xl p-6 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-oxford-navy text-sm font-semibold uppercase tracking-wide mb-2">Agendas</p>
                                    <p class="text-4xl font-bold text-oxford-navy" id="totalAgendas">{{ $totalAgendas ?? 0 }}</p>
                                </div>
                                <div class="bg-oxford-gold p-4 rounded-xl shadow-lg">
                                    <svg class="w-8 h-8 text-oxford-navy" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions & Recent Activity -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                        <!-- Quick Actions -->
                        <div class="oxford-card rounded-xl p-6">
                            <div class="flex items-center mb-6">
                                <div class="bg-oxford-navy p-3 rounded-lg mr-4">
                                    <svg class="w-6 h-6 text-oxford-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-serif font-bold text-oxford-navy">Quick Actions</h3>
                            </div>
                            <div class="space-y-3">
                                <a href="{{ route('admin.posts.create') }}" class="flex items-center justify-between p-4 bg-oxford-cream hover:bg-oxford-gold hover:bg-opacity-20 rounded-lg transition-all duration-300 group">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-oxford-navy mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                        </svg>
                                        <span class="font-semibold text-oxford-navy">Create New Post</span>
                                    </div>
                                    <svg class="w-5 h-5 text-oxford-gold transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.galleries.create') }}" class="flex items-center justify-between p-4 bg-oxford-cream hover:bg-oxford-gold hover:bg-opacity-20 rounded-lg transition-all duration-300 group">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-oxford-navy mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                        </svg>
                                        <span class="font-semibold text-oxford-navy">Create New Gallery</span>
                                    </div>
                                    <svg class="w-5 h-5 text-oxford-gold transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.agendas.create') }}" class="flex items-center justify-between p-4 bg-oxford-cream hover:bg-oxford-gold hover:bg-opacity-20 rounded-lg transition-all duration-300 group">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-oxford-navy mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                        </svg>
                                        <span class="font-semibold text-oxford-navy">Create New Agenda</span>
                                    </div>
                                    <svg class="w-5 h-5 text-oxford-gold transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.kategoris.create') }}" class="flex items-center justify-between p-4 bg-oxford-cream hover:bg-oxford-gold hover:bg-opacity-20 rounded-lg transition-all duration-300 group">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-oxford-navy mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                        </svg>
                                        <span class="font-semibold text-oxford-navy">Create New Category</span>
                                    </div>
                                    <svg class="w-5 h-5 text-oxford-gold transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- System Info -->
                        <div class="oxford-card rounded-xl p-6">
                            <div class="flex items-center mb-6">
                                <div class="bg-oxford-gold p-3 rounded-lg mr-4">
                                    <svg class="w-6 h-6 text-oxford-navy" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-serif font-bold text-oxford-navy">System Information</h3>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 bg-oxford-cream rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-oxford-navy mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="text-oxford-navy font-medium">System Status</span>
                                    </div>
                                    <span class="px-3 py-1 bg-green-500 text-white text-sm font-bold rounded-full">Active</span>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-oxford-cream rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-oxford-navy mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="text-oxford-navy font-medium">Last Updated</span>
                                    </div>
                                    <span class="text-oxford-gold font-semibold">{{ date('d M Y') }}</span>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-oxford-cream rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-oxford-navy mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/>
                                        </svg>
                                        <span class="text-oxford-navy font-medium">Total Content</span>
                                    </div>
                                    <span class="text-oxford-gold font-semibold">{{ $totalPosts + $totalGalleries + $totalAgendas }} Items</span>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-oxford-cream rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-oxford-navy mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span class="text-oxford-navy font-medium">Version</span>
                                    </div>
                                    <span class="text-oxford-gold font-semibold">v1.0.0</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Line Chart -->
                    <div class="oxford-card rounded-xl p-6">
                        <div class="flex items-center mb-6">
                            <div class="bg-oxford-navy p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-oxford-gold" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-serif font-bold text-oxford-navy">Content Statistics</h3>
                        </div>
                        
                        <!-- Line Chart Canvas -->
                        <div class="relative bg-oxford-cream rounded-xl p-6" style="height: 300px;">
                            <canvas id="contentChart"></canvas>
                        </div>

                        <!-- Legend -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                            <div class="flex items-center justify-center p-3 bg-oxford-cream rounded-lg">
                                <div class="w-4 h-4 bg-oxford-navy rounded-full mr-2"></div>
                                <span class="text-oxford-navy font-semibold text-sm">Posts: {{ $totalPosts }}</span>
                            </div>
                            <div class="flex items-center justify-center p-3 bg-oxford-cream rounded-lg">
                                <div class="w-4 h-4 bg-oxford-gold rounded-full mr-2"></div>
                                <span class="text-oxford-navy font-semibold text-sm">Categories: {{ $totalCategories }}</span>
                            </div>
                            <div class="flex items-center justify-center p-3 bg-oxford-cream rounded-lg">
                                <div class="w-4 h-4 rounded-full mr-2" style="background: #8b9dc3;"></div>
                                <span class="text-oxford-navy font-semibold text-sm">Galleries: {{ $totalGalleries }}</span>
                            </div>
                            <div class="flex items-center justify-center p-3 bg-oxford-cream rounded-lg">
                                <div class="w-4 h-4 rounded-full mr-2" style="background: #0f4c75;"></div>
                                <span class="text-oxford-navy font-semibold text-sm">Agendas: {{ $totalAgendas }}</span>
                            </div>
                        </div>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        // Create line chart
                        const ctx = document.getElementById('contentChart').getContext('2d');
                        const contentChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['Posts', 'Categories', 'Galleries', 'Agendas'],
                                datasets: [{
                                    label: 'Content Count',
                                    data: [{{ $totalPosts }}, {{ $totalCategories }}, {{ $totalGalleries }}, {{ $totalAgendas }}],
                                    borderColor: '#002147',
                                    backgroundColor: 'rgba(0, 33, 71, 0.1)',
                                    borderWidth: 3,
                                    fill: true,
                                    tension: 0.4,
                                    pointBackgroundColor: ['#002147', '#c5a572', '#8b9dc3', '#0f4c75'],
                                    pointBorderColor: '#fff',
                                    pointBorderWidth: 2,
                                    pointRadius: 6,
                                    pointHoverRadius: 8
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    tooltip: {
                                        backgroundColor: '#002147',
                                        titleColor: '#c5a572',
                                        bodyColor: '#fff',
                                        borderColor: '#c5a572',
                                        borderWidth: 1,
                                        padding: 12,
                                        displayColors: false,
                                        callbacks: {
                                            label: function(context) {
                                                return context.parsed.y + ' items';
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            color: '#002147',
                                            font: {
                                                weight: 'bold'
                                            },
                                            stepSize: 1
                                        },
                                        grid: {
                                            color: 'rgba(0, 33, 71, 0.1)'
                                        }
                                    },
                                    x: {
                                        ticks: {
                                            color: '#002147',
                                            font: {
                                                weight: 'bold'
                                            }
                                        },
                                        grid: {
                                            display: false
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                </div>

                <!-- Posts Section -->
                <div id="postsSection" class="hidden">
                    <div class="oxford-card rounded-xl">
                        <div class="px-8 py-6 border-b-2 border-oxford-gold border-opacity-20 flex items-center justify-between">
                            <div>
                                <h3 class="text-2xl font-serif font-bold text-oxford-navy">Manage Posts & News</h3>
                                <p class="text-oxford-gold text-sm">Create and manage school posts and news articles</p>
                            </div>
                            <a href="{{ route('admin.posts.create') }}" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                                </svg>
                                Create New Post
                            </a>
                        </div>
                        <div class="p-8">
                            <!-- Create Post Form -->
                            <div id="createPostForm" class="hidden mb-8 oxford-card rounded-lg p-6">
                                <h4 class="text-xl font-serif font-bold text-oxford-navy mb-4">Create New Post</h4>
                                <form id="postForm" class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Title</label>
                                            <input type="text" id="postTitle" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Category</label>
                                            <select id="postCategory" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                                <option value="">Select Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-oxford-navy mb-2">Content</label>
                                        <textarea id="postContent" rows="6" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-oxford-navy mb-2">Featured Image URL</label>
                                        <input type="url" id="postImage" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                    </div>
                                    <div class="flex space-x-4">
                                        <button type="submit" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold">
                                            Save Post
                                        </button>
                                        <button type="button" onclick="hideCreatePostForm()" class="bg-oxford-silver text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Posts List -->
                            <div id="postsList"></div>
                        </div>
                    </div>
                </div>

                <!-- Categories Section -->
                <div id="categoriesSection" class="hidden">
                    <div class="oxford-card rounded-xl">
                        <div class="px-8 py-6 border-b-2 border-oxford-gold border-opacity-20 flex items-center justify-between">
                            <div>
                                <h3 class="text-2xl font-serif font-bold text-oxford-navy">Manage Categories</h3>
                                <p class="text-oxford-gold text-sm">Organize content with categories</p>
                            </div>
                            <a href="{{ route('admin.kategoris.create') }}" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                                </svg>
                                Create Category
                            </a>
                        </div>
                        <div class="p-8">
                            <!-- Create Category Form -->
                            <div id="createCategoryForm" class="hidden mb-8 oxford-card rounded-lg p-6">
                                <h4 class="text-xl font-serif font-bold text-oxford-navy mb-4">Create New Category</h4>
                                <form id="categoryForm" class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-oxford-navy mb-2">Category Name</label>
                                        <input type="text" id="categoryName" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-oxford-navy mb-2">Description</label>
                                        <textarea id="categoryDescription" rows="3" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none"></textarea>
                                    </div>
                                    <div class="flex space-x-4">
                                        <button type="submit" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold">Save Category</button>
                                        <button type="button" onclick="hideCreateCategoryForm()" class="bg-oxford-silver text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div id="categoriesList"></div>
                        </div>
                    </div>
                </div>

                <!-- Galleries Section -->
                <div id="galleriesSection" class="hidden">
                    <div class="oxford-card rounded-xl">
                        <div class="px-8 py-6 border-b-2 border-oxford-gold border-opacity-20 flex items-center justify-between">
                            <div>
                                <h3 class="text-2xl font-serif font-bold text-oxford-navy">Manage Galleries</h3>
                                <p class="text-oxford-gold text-sm">Upload and organize photo galleries</p>
                            </div>
                            <a href="{{ route('admin.galleries.create') }}" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                                </svg>
                                Create Gallery
                            </a>
                        </div>
                        <div class="p-8">
                            <!-- Create Gallery Form -->
                            <div id="createGalleryForm" class="hidden mb-8 oxford-card rounded-lg p-6">
                                <h4 class="text-xl font-serif font-bold text-oxford-navy mb-4">Create New Gallery</h4>
                                <form id="galleryForm" class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Gallery Title</label>
                                            <input type="text" id="galleryTitle" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Event Date</label>
                                            <input type="date" id="galleryDate" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-oxford-navy mb-2">Description</label>
                                        <textarea id="galleryDescription" rows="4" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none"></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-oxford-navy mb-2">Cover Image URL</label>
                                        <input type="url" id="galleryCover" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                    </div>
                                    <div class="flex space-x-4">
                                        <button type="submit" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold">Save Gallery</button>
                                        <button type="button" onclick="hideCreateGalleryForm()" class="bg-oxford-silver text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div id="galleriesList"></div>
                        </div>
                    </div>
                </div>

                <!-- Agendas Section -->
                <div id="agendasSection" class="hidden">
                    <div class="oxford-card rounded-xl">
                        <div class="px-8 py-6 border-b-2 border-oxford-gold border-opacity-20 flex items-center justify-between">
                            <div>
                                <h3 class="text-2xl font-serif font-bold text-oxford-navy">Manage Agendas</h3>
                                <p class="text-oxford-gold text-sm">Schedule and manage school events</p>
                            </div>
                            <a href="{{ route('admin.agendas.create') }}" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/>
                                </svg>
                                Create Agenda
                            </a>
                        </div>
                        <div class="p-8">
                            <!-- Create Agenda Form -->
                            <div id="createAgendaForm" class="hidden mb-8 oxford-card rounded-lg p-6">
                                <h4 class="text-xl font-serif font-bold text-oxford-navy mb-4">Create New Agenda</h4>
                                <form id="agendaForm" class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Event Title</label>
                                            <input type="text" id="agendaTitle" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Event Date</label>
                                            <input type="date" id="agendaDate" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Start Time</label>
                                            <input type="time" id="agendaTime" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Location</label>
                                            <input type="text" id="agendaLocation" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-oxford-navy mb-2">Description</label>
                                        <textarea id="agendaDescription" rows="4" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none"></textarea>
                                    </div>
                                    <div class="flex space-x-4">
                                        <button type="submit" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold">Save Agenda</button>
                                        <button type="button" onclick="hideCreateAgendaForm()" class="bg-oxford-silver text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div id="agendasList"></div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
        axios.defaults.baseURL = window.location.origin;

        document.addEventListener('DOMContentLoaded', function() {
            // Dashboard data is already loaded from server-side (Blade)
            // No need to fetch via API
        });

        function checkAuth() {
            // No authentication check - demo mode
            return true;
        }

        function showSection(section) {
            document.getElementById('dashboardSection').classList.add('hidden');
            document.getElementById('postsSection').classList.add('hidden');
            document.getElementById('categoriesSection').classList.add('hidden');
            document.getElementById('galleriesSection').classList.add('hidden');
            document.getElementById('agendasSection').classList.add('hidden');
            
            document.querySelectorAll('nav a').forEach(link => {
                link.classList.remove('bg-oxford-gold', 'text-oxford-navy');
                link.classList.add('hover:bg-oxford-blue', 'hover:bg-opacity-30');
            });
            
            document.getElementById(section + 'Section').classList.remove('hidden');
            document.getElementById('nav-' + section).classList.add('bg-oxford-gold', 'text-oxford-navy');
            document.getElementById('nav-' + section).classList.remove('hover:bg-oxford-blue', 'hover:bg-opacity-30');

            const titles = {
                'dashboard': 'Dashboard',
                'posts': 'Posts & News Management',
                'categories': 'Categories Management',
                'galleries': 'Galleries Management',
                'agendas': 'Agendas Management'
            };
            document.getElementById('pageTitle').textContent = titles[section];

            switch(section) {
                case 'posts':
                    loadPosts();
                    break;
                case 'categories':
                    loadCategories();
                    break;
                case 'galleries':
                    loadGalleries();
                    break;
                case 'agendas':
                    loadAgendas();
                    break;
            }
        }

        // Form Management Functions
        function showCreatePostForm() {
            document.getElementById('createPostForm').classList.remove('hidden');
            loadCategoriesForSelect();
        }
        
        function hideCreatePostForm() {
            document.getElementById('createPostForm').classList.add('hidden');
            document.getElementById('postForm').reset();
        }
        
        function showCreateCategoryForm() {
            document.getElementById('createCategoryForm').classList.remove('hidden');
        }
        
        function hideCreateCategoryForm() {
            document.getElementById('createCategoryForm').classList.add('hidden');
            document.getElementById('categoryForm').reset();
        }
        
        function showCreateGalleryForm() {
            document.getElementById('createGalleryForm').classList.remove('hidden');
        }
        
        function hideCreateGalleryForm() {
            document.getElementById('createGalleryForm').classList.add('hidden');
            document.getElementById('galleryForm').reset();
        }
        
        function showCreateAgendaForm() {
            document.getElementById('createAgendaForm').classList.remove('hidden');
        }
        
        function hideCreateAgendaForm() {
            document.getElementById('createAgendaForm').classList.add('hidden');
            document.getElementById('agendaForm').reset();
        }

        // CRUD Operations for Posts
        async function createPost() {
            const formData = {
                title: document.getElementById('postTitle').value,
                content: document.getElementById('postContent').value,
                kategori_id: document.getElementById('postCategory').value,
                image: document.getElementById('postImage').value
            };

            try {
                const response = await axios.post('/api/posts', formData);
                hideCreatePostForm();
                loadPosts();
                showNotification('Post created successfully!', 'success');
            } catch (error) {
                showNotification('Error creating post: ' + (error.response?.data?.error || error.message), 'error');
            }
        }

        // CRUD Operations for Categories
        async function createCategory() {
            const formData = {
                nama_kategori: document.getElementById('categoryName').value,
                deskripsi: document.getElementById('categoryDescription').value
            };

            try {
                const response = await axios.post('/api/kategoris', formData);
                hideCreateCategoryForm();
                loadCategories();
                showNotification('Category created successfully!', 'success');
            } catch (error) {
                showNotification('Error creating category: ' + (error.response?.data?.error || error.message), 'error');
            }
        }

        // CRUD Operations for Galleries
        async function createGallery() {
            const formData = {
                judul: document.getElementById('galleryTitle').value,
                deskripsi: document.getElementById('galleryDescription').value,
                tanggal: document.getElementById('galleryDate').value,
                cover_image: document.getElementById('galleryCover').value
            };

            try {
                const response = await axios.post('/api/galleries', formData);
                hideCreateGalleryForm();
                loadGalleries();
                showNotification('Gallery created successfully!', 'success');
            } catch (error) {
                showNotification('Error creating gallery: ' + (error.response?.data?.error || error.message), 'error');
            }
        }

        // CRUD Operations for Agendas
        async function createAgenda() {
            const formData = {
                judul: document.getElementById('agendaTitle').value,
                deskripsi: document.getElementById('agendaDescription').value,
                tanggal: document.getElementById('agendaDate').value,
                waktu: document.getElementById('agendaTime').value,
                tempat: document.getElementById('agendaLocation').value
            };

            try {
                const response = await axios.post('/api/agendas', formData);
                hideCreateAgendaForm();
                loadAgendas();
                showNotification('Agenda created successfully!', 'success');
            } catch (error) {
                showNotification('Error creating agenda: ' + (error.response?.data?.error || error.message), 'error');
            }
        }

        // Load categories for post form
        async function loadCategoriesForSelect() {
            try {
                const response = await axios.get('/api/kategoris');
                const select = document.getElementById('postCategory');
                select.innerHTML = '<option value="">Select Category</option>';
                
                response.data.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.nama_kategori;
                    select.appendChild(option);
                });
            } catch (error) {
                console.error('Error loading categories:', error);
            }
        }

        // Notification system
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg ${
                type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
            }`;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Form submissions
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('postForm').addEventListener('submit', function(e) {
                e.preventDefault();
                createPost();
            });
            
            document.getElementById('categoryForm').addEventListener('submit', function(e) {
                e.preventDefault();
                createCategory();
            });
            
            document.getElementById('galleryForm').addEventListener('submit', function(e) {
                e.preventDefault();
                createGallery();
            });
            
            document.getElementById('agendaForm').addEventListener('submit', function(e) {
                e.preventDefault();
                createAgenda();
            });
        });

        // API Testing Functions
        function displayResponse(data) {
            const responseDiv = document.getElementById('response');
            responseDiv.innerHTML = `<pre class="text-sm overflow-auto text-green-300">${JSON.stringify(data, null, 2)}</pre>`;
        }

        async function testLogin() {
            try {
                const response = await axios.post('/api/login', {
                    email: 'admin@sekolah.com',
                    password: 'password123'
                });
                displayResponse(response.data);
                
                if (response.data.data && response.data.data.token) {
                    localStorage.setItem('auth_token', response.data.data.token);
                    axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.data.token}`;
                }
            } catch (error) {
                displayResponse(error.response?.data || error.message);
            }
        }

        async function testRegister() {
            try {
                const response = await axios.post('/api/register', {
                    name: 'Test User',
                    email: 'test@example.com',
                    password: 'password123',
                    password_confirmation: 'password123'
                });
                displayResponse(response.data);
            } catch (error) {
                displayResponse(error.response?.data || error.message);
            }
        }

        async function getPosts() {
            try {
                const response = await axios.get('/api/posts');
                displayResponse(response.data);
            } catch (error) {
                displayResponse(error.response?.data || error.message);
            }
        }

        async function getCategories() {
            try {
                const response = await axios.get('/api/kategoris');
                displayResponse(response.data);
            } catch (error) {
                displayResponse(error.response?.data || error.message);
            }
        }

        async function getAgendas() {
            try {
                const response = await axios.get('/api/agendas');
                displayResponse(response.data);
            } catch (error) {
                displayResponse(error.response?.data || error.message);
            }
        }

        async function loadPosts() {
            try {
                const response = await axios.get('/api/posts');
                const posts = response.data.data;
                
                const postsHtml = posts.map(post => `
                    <div class="flex items-center justify-between p-6 border-2 border-oxford-gold border-opacity-20 rounded-lg mb-6 bg-white shadow-lg hover:shadow-xl transition-shadow">
                        <div>
                            <h4 class="font-serif font-bold text-oxford-navy text-lg">${post.judul}</h4>
                            <p class="text-sm text-gray-700 mt-2">${post.konten.substring(0, 100)}...</p>
                        </div>
                        <span class="px-3 py-2 rounded-full font-semibold ${post.status === 'published' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-yellow-100 text-yellow-800 border border-yellow-200'}">
                            ${post.status}
                        </span>
                    </div>
                `).join('');
                
                document.getElementById('postsList').innerHTML = postsHtml;
            } catch (error) {
                console.error('Error loading posts:', error);
            }
        }

        async function loadCategories() {
            try {
                const response = await axios.get('/api/kategoris');
                const categories = response.data.data;
                
                const categoriesHtml = categories.map(category => `
                    <div class="flex items-center justify-between p-6 border-2 border-oxford-gold border-opacity-20 rounded-lg mb-6 bg-white shadow-lg hover:shadow-xl transition-shadow">
                        <div>
                            <h4 class="font-serif font-bold text-oxford-navy text-lg">${category.kategori}</h4>
                        </div>
                    </div>
                `).join('');
                
                document.getElementById('categoriesList').innerHTML = categoriesHtml;
            } catch (error) {
                console.error('Error loading categories:', error);
            }
        }

        async function loadGalleries() {
            try {
                const response = await axios.get('/api/galleries');
                const galleries = response.data.data;
                
                const galleriesHtml = galleries.map(gallery => `
                    <div class="flex items-center justify-between p-6 border-2 border-oxford-gold border-opacity-20 rounded-lg mb-6 bg-white shadow-lg hover:shadow-xl transition-shadow">
                        <div>
                            <h4 class="font-serif font-bold text-oxford-navy text-lg">Gallery #${gallery.id_g}</h4>
                        </div>
                        <span class="px-3 py-2 rounded-full font-semibold ${gallery.status === 'active' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200'}">
                            ${gallery.status}
                        </span>
                    </div>
                `).join('');
                
                document.getElementById('galleriesList').innerHTML = galleriesHtml;
            } catch (error) {
                console.error('Error loading galleries:', error);
            }
        }

        async function loadAgendas() {
            try {
                const response = await axios.get('/api/agendas');
                const agendas = response.data.data;
                
                const agendasHtml = agendas.map(agenda => `
                    <div class="flex items-center justify-between p-6 border-2 border-oxford-gold border-opacity-20 rounded-lg mb-6 bg-white shadow-lg hover:shadow-xl transition-shadow">
                        <div>
                            <h4 class="font-serif font-bold text-oxford-navy text-lg">${agenda.judul}</h4>
                            <p class="text-sm text-gray-700 mt-2">${agenda.deskripsi}</p>
                            <p class="text-xs text-oxford-gold mt-1 font-medium">${new Date(agenda.tanggal).toLocaleDateString()}</p>
                        </div>
                        <span class="px-3 py-2 rounded-full font-semibold ${agenda.status === 'active' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200'}">
                            ${agenda.status}
                        </span>
                    </div>
                `).join('');
                
                document.getElementById('agendasList').innerHTML = agendasHtml;
            } catch (error) {
                console.error('Error loading agendas:', error);
            }
        }

        function logout() {
            localStorage.removeItem('admin_token');
            localStorage.removeItem('admin_user');
            window.location.href = '/';
        }
    </script>
</body>
</html>
