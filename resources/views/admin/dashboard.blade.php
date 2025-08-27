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
        <div class="oxford-sidebar text-oxford-cream w-72 min-h-screen p-6">
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
                <a href="#" onclick="showSection('api-testing')" class="flex items-center px-4 py-3 hover:bg-oxford-blue hover:bg-opacity-30 rounded-lg transition-all duration-200" id="nav-api-testing">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"/>
                    </svg>
                    API Testing
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
        <div class="flex-1">
            <header class="oxford-card rounded-none border-l-0 border-r-0 border-t-0 px-8 py-6 mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-serif font-bold text-oxford-navy" id="pageTitle">Dashboard</h2>
                        <p class="text-oxford-gold italic font-medium font-script">Oxford High School Administration</p>
                    </div>
                    <div class="text-oxford-navy opacity-20">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </header>

            <main class="p-8">
                <!-- Dashboard Overview -->
                <div id="dashboardSection">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="oxford-card rounded-xl p-6 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 glitter-effect pulse-glow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-oxford-navy text-sm font-semibold uppercase tracking-wide mb-2">Total Posts</p>
                                    <p class="text-4xl font-bold text-oxford-navy" id="totalPosts">0</p>
                                </div>
                                <div class="bg-oxford-navy p-3 rounded-full">
                                    <svg class="w-8 h-8 text-oxford-cream" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="oxford-card rounded-xl p-6 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 glitter-effect pulse-glow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-oxford-navy text-sm font-semibold uppercase tracking-wide mb-2">Categories</p>
                                    <p class="text-4xl font-bold text-oxford-navy" id="totalCategories">0</p>
                                </div>
                                <div class="bg-oxford-gold p-3 rounded-full">
                                    <svg class="w-8 h-8 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="oxford-card rounded-xl p-6 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 glitter-effect pulse-glow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-oxford-navy text-sm font-semibold uppercase tracking-wide mb-2">Galleries</p>
                                    <p class="text-4xl font-bold text-oxford-navy" id="totalGalleries">0</p>
                                </div>
                                <div class="bg-oxford-blue p-3 rounded-full">
                                    <svg class="w-8 h-8 text-oxford-cream" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div class="oxford-card rounded-xl p-6 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 glitter-effect pulse-glow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-oxford-navy text-sm font-semibold uppercase tracking-wide mb-2">Agendas</p>
                                    <p class="text-4xl font-bold text-oxford-navy" id="totalAgendas">0</p>
                                </div>
                                <div class="bg-oxford-accent p-3 rounded-full">
                                    <svg class="w-8 h-8 text-oxford-cream" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Posts Section -->
                <div id="postsSection" class="hidden">
                    <div class="oxford-card rounded-xl">
                        <div class="px-8 py-6 border-b-2 border-oxford-gold border-opacity-20 flex items-center justify-between">
                            <div>
                                <h3 class="text-2xl font-serif font-bold text-oxford-navy">Manage Posts & News</h3>
                                <p class="text-oxford-gold text-sm">Create and manage school posts and news articles</p>
                            </div>
                            <button onclick="showCreatePostForm()" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                                </svg>
                                Create New Post
                            </button>
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
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Status</label>
                                            <select id="postStatus" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                                <option value="draft">Draft</option>
                                                <option value="published">Published</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Featured Image URL</label>
                                            <input type="url" id="postImage" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                        </div>
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
                            <button onclick="showCreateCategoryForm()" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                                </svg>
                                Create Category
                            </button>
                        </div>
                        <div class="p-8">
                            <!-- Create Category Form -->
                            <div id="createCategoryForm" class="hidden mb-8 oxford-card rounded-lg p-6">
                                <h4 class="text-xl font-serif font-bold text-oxford-navy mb-4">Create New Category</h4>
                                <form id="categoryForm" class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Category Name</label>
                                            <input type="text" id="categoryName" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-semibold text-oxford-navy mb-2">Slug</label>
                                            <input type="text" id="categorySlug" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                        </div>
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
                            <button onclick="showCreateGalleryForm()" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                                </svg>
                                Create Gallery
                            </button>
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
                            <button onclick="showCreateAgendaForm()" class="oxford-btn-primary px-6 py-3 rounded-lg font-semibold flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/>
                                </svg>
                                Create Agenda
                            </button>
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
                                    <div>
                                        <label class="block text-sm font-semibold text-oxford-navy mb-2">Status</label>
                                        <select id="agendaStatus" class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg focus:border-oxford-navy focus:outline-none">
                                            <option value="active">Active</option>
                                            <option value="cancelled">Cancelled</option>
                                            <option value="completed">Completed</option>
                                        </select>
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

                <!-- API Testing Section -->
                <div id="api-testing-section" class="hidden">
                    <div class="bg-gradient-to-br from-gray-900 to-oxford-navy rounded-lg shadow-xl border-t-4 border-oxford-gold p-8 mb-8">
                        <h2 class="text-3xl font-serif font-bold text-white mb-8 text-center">🔧 API Testing Interface</h2>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Authentication -->
                            <div class="bg-gradient-to-br from-oxford-navy to-blue-900 text-white rounded-lg shadow-lg p-6 border border-oxford-gold border-opacity-30">
                                <h3 class="text-xl font-serif font-bold text-oxford-gold mb-4">🔐 Authentication</h3>
                            
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-oxford-gold mb-2">Test Login</label>
                                        <button onclick="testLogin()" class="bg-oxford-gold text-oxford-navy px-4 py-2 rounded-lg hover:bg-yellow-400 font-semibold transition-colors">
                                            🚀 Test Login
                                        </button>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-oxford-gold mb-2">Test Register</label>
                                        <button onclick="testRegister()" class="bg-white text-oxford-navy px-4 py-2 rounded-lg hover:bg-gray-100 font-semibold transition-colors">
                                            ✨ Test Register
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Public Data -->
                            <div class="bg-gradient-to-br from-oxford-gold to-yellow-500 text-oxford-navy rounded-lg shadow-lg p-6 border border-oxford-gold border-opacity-50">
                                <h3 class="text-xl font-serif font-bold mb-4">📊 Public Data</h3>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium mb-2">Posts</label>
                                        <button onclick="getPosts()" class="bg-oxford-navy text-white px-4 py-2 rounded-lg hover:bg-blue-900 font-semibold transition-colors">
                                            📝 Get Posts
                                        </button>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium mb-2">Categories</label>
                                        <button onclick="getCategories()" class="bg-oxford-navy text-white px-4 py-2 rounded-lg hover:bg-blue-900 font-semibold transition-colors">
                                            📂 Get Categories
                                        </button>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium mb-2">Agendas</label>
                                        <button onclick="getAgendas()" class="bg-oxford-navy text-white px-4 py-2 rounded-lg hover:bg-blue-900 font-semibold transition-colors">
                                            📅 Get Agendas
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Response Display -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg shadow-xl border-t-4 border-oxford-gold p-8 mb-8">
                        <h3 class="text-2xl font-serif font-bold text-white mb-6 text-center">📋 API Response</h3>
                        <div id="response" class="bg-black bg-opacity-50 border-2 border-oxford-gold p-6 rounded-lg min-h-32 text-white font-mono">
                            <p class="text-oxford-gold font-medium">Response will appear here...</p>
                        </div>
                    </div>

                    <!-- API Endpoints -->
                    <div class="bg-gradient-to-br from-gray-900 to-oxford-navy rounded-lg shadow-xl border-t-4 border-oxford-gold p-8 mb-8">
                        <h3 class="text-2xl font-serif font-bold text-white mb-6 text-center">🌐 Available API Endpoints</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="bg-gradient-to-br from-green-900 to-green-800 p-6 rounded-lg border-2 border-green-400 border-opacity-30">
                                <h4 class="font-serif font-bold text-green-300 mb-4 text-lg flex items-center">
                                    🌍 Public Endpoints
                                </h4>
                                <ul class="space-y-3 text-sm">
                                    <li><code class="bg-green-800 text-green-200 px-3 py-1 rounded-lg font-mono">POST /api/register</code> - Register user</li>
                                    <li><code class="bg-green-800 text-green-200 px-3 py-1 rounded-lg font-mono">POST /api/login</code> - Login user</li>
                                    <li><code class="bg-green-800 text-green-200 px-3 py-1 rounded-lg font-mono">GET /api/posts</code> - Get all posts</li>
                                    <li><code class="bg-green-800 text-green-200 px-3 py-1 rounded-lg font-mono">GET /api/kategoris</code> - Get all categories</li>
                                    <li><code class="bg-green-800 text-green-200 px-3 py-1 rounded-lg font-mono">GET /api/agendas</code> - Get all agendas</li>
                                    <li><code class="bg-green-800 text-green-200 px-3 py-1 rounded-lg font-mono">GET /api/profiles</code> - Get school profiles</li>
                                </ul>
                            </div>
                            
                            <div class="bg-gradient-to-br from-red-900 to-red-800 p-6 rounded-lg border-2 border-red-400 border-opacity-30">
                                <h4 class="font-serif font-bold text-red-300 mb-4 text-lg flex items-center">
                                    🔒 Admin Only Endpoints
                                </h4>
                                <ul class="space-y-3 text-sm">
                                    <li><code class="bg-red-800 text-red-200 px-3 py-1 rounded-lg font-mono">POST /api/posts</code> - Create post</li>
                                    <li><code class="bg-red-800 text-red-200 px-3 py-1 rounded-lg font-mono">PUT /api/posts/{id}</code> - Update post</li>
                                    <li><code class="bg-red-800 text-red-200 px-3 py-1 rounded-lg font-mono">DELETE /api/posts/{id}</code> - Delete post</li>
                                    <li><code class="bg-red-800 text-red-200 px-3 py-1 rounded-lg font-mono">POST /api/kategoris</code> - Create category</li>
                                    <li><code class="bg-red-800 text-red-200 px-3 py-1 rounded-lg font-mono">POST /api/agendas</code> - Create agenda</li>
                                    <li><code class="bg-red-800 text-red-200 px-3 py-1 rounded-lg font-mono">POST /api/galleries</code> - Create gallery</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        axios.defaults.baseURL = window.location.origin;

        document.addEventListener('DOMContentLoaded', function() {
            checkAuth();
            loadDashboardData();
        });

        function checkAuth() {
            const token = localStorage.getItem('admin_token');
            if (!token) {
                window.location.href = '/admin/login';
                return;
            }
            axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
        }

        async function loadDashboardData() {
            try {
                const [postsRes, categoriesRes, galleriesRes, agendasRes] = await Promise.all([
                    axios.get('/api/posts'),
                    axios.get('/api/kategoris'),
                    axios.get('/api/galleries'),
                    axios.get('/api/agendas')
                ]);

                document.getElementById('totalPosts').textContent = postsRes.data.data.length;
                document.getElementById('totalCategories').textContent = categoriesRes.data.data.length;
                document.getElementById('totalGalleries').textContent = galleriesRes.data.data.length;
                document.getElementById('totalAgendas').textContent = agendasRes.data.data.length;
            } catch (error) {
                console.error('Error loading dashboard data:', error);
            }
        }

        function showSection(section) {
            document.getElementById('dashboardSection').classList.add('hidden');
            document.getElementById('postsSection').classList.add('hidden');
            document.getElementById('categoriesSection').classList.add('hidden');
            document.getElementById('galleriesSection').classList.add('hidden');
            document.getElementById('agendasSection').classList.add('hidden');
            document.getElementById('api-testing-section').classList.add('hidden');
            
            document.querySelectorAll('nav a').forEach(link => {
                link.classList.remove('bg-oxford-gold', 'text-oxford-navy');
                link.classList.add('hover:bg-oxford-blue', 'hover:bg-opacity-30');
            });
            
            if (section === 'api-testing') {
                document.getElementById('api-testing-section').classList.remove('hidden');
                document.getElementById('nav-api-testing').classList.add('bg-oxford-gold', 'text-oxford-navy');
                document.getElementById('nav-api-testing').classList.remove('hover:bg-oxford-blue', 'hover:bg-opacity-30');
            } else {
                document.getElementById(section + 'Section').classList.remove('hidden');
                document.getElementById('nav-' + section).classList.add('bg-oxford-gold', 'text-oxford-navy');
                document.getElementById('nav-' + section).classList.remove('hover:bg-oxford-blue', 'hover:bg-opacity-30');
            }

            const titles = {
                'dashboard': 'Dashboard',
                'posts': 'Posts & News Management',
                'categories': 'Categories Management',
                'galleries': 'Galleries Management',
                'agendas': 'Agendas Management',
                'api-testing': 'API Testing Interface'
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
                judul: document.getElementById('postTitle').value,
                konten: document.getElementById('postContent').value,
                kategori_id: document.getElementById('postCategory').value,
                status: document.getElementById('postStatus').value,
                gambar: document.getElementById('postImage').value
            };

            try {
                const response = await axios.post('/api/posts', formData);
                if (response.data.success) {
                    hideCreatePostForm();
                    loadPosts();
                    showNotification('Post created successfully!', 'success');
                }
            } catch (error) {
                showNotification('Error creating post: ' + (error.response?.data?.message || error.message), 'error');
            }
        }

        // CRUD Operations for Categories
        async function createCategory() {
            const formData = {
                nama: document.getElementById('categoryName').value,
                slug: document.getElementById('categorySlug').value,
                deskripsi: document.getElementById('categoryDescription').value
            };

            try {
                const response = await axios.post('/api/kategoris', formData);
                if (response.data.success) {
                    hideCreateCategoryForm();
                    loadCategories();
                    showNotification('Category created successfully!', 'success');
                }
            } catch (error) {
                showNotification('Error creating category: ' + (error.response?.data?.message || error.message), 'error');
            }
        }

        // CRUD Operations for Galleries
        async function createGallery() {
            const formData = {
                judul: document.getElementById('galleryTitle').value,
                deskripsi: document.getElementById('galleryDescription').value,
                tanggal_event: document.getElementById('galleryDate').value,
                cover_image: document.getElementById('galleryCover').value
            };

            try {
                const response = await axios.post('/api/galleries', formData);
                if (response.data.success) {
                    hideCreateGalleryForm();
                    loadGalleries();
                    showNotification('Gallery created successfully!', 'success');
                }
            } catch (error) {
                showNotification('Error creating gallery: ' + (error.response?.data?.message || error.message), 'error');
            }
        }

        // CRUD Operations for Agendas
        async function createAgenda() {
            const formData = {
                judul: document.getElementById('agendaTitle').value,
                deskripsi: document.getElementById('agendaDescription').value,
                tanggal: document.getElementById('agendaDate').value,
                waktu: document.getElementById('agendaTime').value,
                lokasi: document.getElementById('agendaLocation').value,
                status: document.getElementById('agendaStatus').value
            };

            try {
                const response = await axios.post('/api/agendas', formData);
                if (response.data.success) {
                    hideCreateAgendaForm();
                    loadAgendas();
                    showNotification('Agenda created successfully!', 'success');
                }
            } catch (error) {
                showNotification('Error creating agenda: ' + (error.response?.data?.message || error.message), 'error');
            }
        }

        // Load categories for post form
        async function loadCategoriesForSelect() {
            try {
                const response = await axios.get('/api/kategoris');
                const select = document.getElementById('postCategory');
                select.innerHTML = '<option value="">Select Category</option>';
                
                response.data.data.forEach(category => {
                    const option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.nama;
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
            window.location.href = '/admin/login';
        }
    </script>
</body>
</html>
