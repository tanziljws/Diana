<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - Oxford High School</title>
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
        .bg-oxford-navy { background-color: var(--oxford-navy); }
        .bg-oxford-gold { background-color: var(--oxford-gold); }
        .text-oxford-navy { color: var(--oxford-navy); }
        .text-oxford-gold { color: var(--oxford-gold); }
        .border-oxford-gold { border-color: var(--oxford-gold); }
        .bg-oxford-navy-light { background-color: var(--oxford-navy-light); }
        .dark-gradient-bg {
            background: linear-gradient(135deg, #1a1a1a 0%, var(--oxford-navy) 100%);
        }
        .neon-glow {
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.4);
        }
        .text-gradient {
            background: linear-gradient(135deg, var(--oxford-gold), #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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
<body class="dark-gradient-bg min-h-screen font-sans">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0 bg-gradient-to-br from-oxford-dark via-oxford-navy to-gray-900 opacity-95"></div>
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-oxford-gold opacity-5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-500 opacity-5 rounded-full blur-3xl"></div>
        
        <div class="max-w-md w-full space-y-8 relative z-10">
            <!-- Logo and Title -->
            <div class="text-center">
                <img src="/oxford-logo.svg" alt="Oxford Logo" class="mx-auto h-24 w-24 mb-6 neon-glow">
                <h2 class="text-5xl font-serif font-bold text-gradient mb-3">Oxford High School</h2>
                <div class="flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-oxford-gold text-xl font-semibold">Admin Panel Login</p>
                </div>
                <p class="text-gray-300 mb-8">Sistem Informasi Galeri Sekolah</p>
            </div>

            <!-- Login Form -->
            <form class="glass-effect rounded-2xl p-8 shadow-2xl" action="{{ route('admin.authenticate') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" required 
                           class="w-full px-4 py-3 bg-white bg-opacity-10 border border-gray-300 border-opacity-30 rounded-lg focus:ring-2 focus:ring-oxford-gold focus:border-transparent text-white placeholder-gray-400"
                           placeholder="admin@oxfordhigh.edu">
                </div>
                
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <input type="password" id="password" name="password" required 
                           class="w-full px-4 py-3 bg-white bg-opacity-10 border border-gray-300 border-opacity-30 rounded-lg focus:ring-2 focus:ring-oxford-gold focus:border-transparent text-white placeholder-gray-400"
                           placeholder="Enter your password">
                </div>
                
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-oxford-gold focus:ring-oxford-gold border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-300">Remember me</label>
                    </div>
                    <a href="#" class="text-sm text-oxford-gold hover:text-oxford-gold-light">Forgot password?</a>
                </div>
                
                <button type="submit" class="w-full bg-oxford-gold hover:bg-oxford-gold-light text-oxford-navy font-bold py-3 px-4 rounded-lg transition duration-300 subtle-glow">
                    Sign In to Admin Panel
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <a href="/" class="text-gray-400 hover:text-white text-sm">← Back to Website</a>
            </div>
        </div>
    </div>

    <script>
        // Simple form validation and set token for dashboard
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            if (!email || !password) {
                e.preventDefault();
                alert('Please fill in both email and password');
                return false;
            }
            
            // Set admin token for dashboard access
            if (email === 'admin@oxfordhigh.edu' && password === 'admin123') {
                localStorage.setItem('admin_token', 'demo_token_123');
                localStorage.setItem('admin_user', JSON.stringify({
                    name: 'Admin',
                    email: 'admin@oxfordhigh.edu'
                }));
            }
        });
    </script>
</body>
</html>

