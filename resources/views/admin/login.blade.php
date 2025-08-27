<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Oxford High School</title>
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
                <p class="text-white opacity-75 text-sm italic font-script">"Sapientia et Innovatio"</p>
            </div>
            
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-8 border border-oxford-gold border-opacity-30 subtle-glow">
                <form class="space-y-6" id="loginForm">
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-oxford-gold mb-2">Email Address</label>
                            <input id="email" name="email" type="email" required 
                                   class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg bg-white bg-opacity-90 text-oxford-navy placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-oxford-gold focus:border-oxford-gold transition-colors" 
                                   placeholder="admin@sekolah.com">
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-oxford-gold mb-2">Password</label>
                            <input id="password" name="password" type="password" required 
                                   class="w-full px-4 py-3 border-2 border-oxford-gold border-opacity-30 rounded-lg bg-white bg-opacity-90 text-oxford-navy placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-oxford-gold focus:border-oxford-gold transition-colors" 
                                   placeholder="Password">
                        </div>
                    </div>

                    <div>
                        <button type="submit" 
                                class="w-full flex justify-center py-3 px-4 border-2 border-oxford-gold text-lg font-semibold rounded-full text-oxford-navy bg-gradient-to-r from-oxford-gold to-yellow-400 hover:from-yellow-400 hover:to-oxford-gold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-oxford-gold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <span class="flex items-center">
                                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                                Sign In
                            </span>
                        </button>
                    </div>

                    <div id="errorMessage" class="hidden bg-red-100 border-2 border-red-400 text-red-700 px-4 py-3 rounded-lg"></div>
                    <div id="successMessage" class="hidden bg-green-100 border-2 border-green-400 text-green-700 px-4 py-3 rounded-lg"></div>
                </form>

                <div class="text-center mt-6">
                    <a href="/" class="inline-flex items-center text-oxford-gold hover:text-yellow-400 transition-colors duration-300 font-medium" style="color: #d4af37 !important;">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0L3.586 10l4.707-4.707a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                        </svg>
                        <span style="color: #d4af37 !important; font-weight: 500;">Kembali ke Beranda</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set base URL for API
        axios.defaults.baseURL = window.location.origin;

        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const errorDiv = document.getElementById('errorMessage');
            const successDiv = document.getElementById('successMessage');
            
            // Hide previous messages
            errorDiv.classList.add('hidden');
            successDiv.classList.add('hidden');
            
            try {
                const response = await axios.post('/api/login', {
                    email: email,
                    password: password
                });
                
                if (response.data.success) {
                    // Check if user is admin
                    if (response.data.data.user.role === 'admin') {
                        // Store token
                        localStorage.setItem('admin_token', response.data.data.token);
                        localStorage.setItem('admin_user', JSON.stringify(response.data.data.user));
                        
                        // Show success message
                        successDiv.textContent = 'Login berhasil! Mengalihkan ke dashboard...';
                        successDiv.classList.remove('hidden');
                        
                        // Redirect to admin dashboard
                        setTimeout(() => {
                            window.location.href = '/admin/dashboard';
                        }, 1000);
                    } else {
                        errorDiv.textContent = 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.';
                        errorDiv.classList.remove('hidden');
                    }
                }
            } catch (error) {
                let errorMessage = 'Terjadi kesalahan saat login.';
                
                if (error.response && error.response.data) {
                    if (error.response.data.message) {
                        errorMessage = error.response.data.message;
                    } else if (error.response.data.errors) {
                        errorMessage = Object.values(error.response.data.errors).flat().join(', ');
                    }
                }
                
                errorDiv.textContent = errorMessage;
                errorDiv.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>

