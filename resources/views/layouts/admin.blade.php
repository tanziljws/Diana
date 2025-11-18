<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --oxford-navy: #0a1f44;
            --oxford-gold: #c5a572;
            --oxford-navy-light: #1a3a5c;
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
        .bg-oxford-navy { background-color: var(--oxford-navy); }
        .bg-oxford-gold { background-color: var(--oxford-gold); }
        .text-oxford-navy { color: var(--oxford-navy); }
        .text-oxford-gold { color: var(--oxford-gold); }
        .bg-oxford-navy-light { background-color: var(--oxford-navy-light); }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <nav class="bg-oxford-navy text-oxford-gold shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-serif font-bold">Oxford High School - Admin</h1>
                <div class="flex space-x-6">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-white transition-colors duration-200 font-medium">Dashboard</a>
                    <a href="{{ route('admin.posts.index') }}" class="hover:text-white transition-colors duration-200 font-medium">Posts</a>
                    <a href="{{ route('admin.kategoris.index') }}" class="hover:text-white transition-colors duration-200 font-medium">Categories</a>
                    <a href="{{ route('admin.galleries.index') }}" class="hover:text-white transition-colors duration-200 font-medium">Galleries</a>
                    <a href="{{ route('admin.agendas.index') }}" class="hover:text-white transition-colors duration-200 font-medium">Agendas</a>
                    <a href="/" class="bg-oxford-gold text-oxford-navy px-4 py-2 rounded-lg hover:bg-yellow-400 transition-colors duration-200 font-semibold">View Site</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <script>
        // Auto-hide success messages after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.bg-green-100');
            alerts.forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 5000);
    </script>
</body>
</html>
