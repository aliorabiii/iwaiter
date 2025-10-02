<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IWaiter</title>
        <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .sidebar {
            transition: all 0.3s;
        }
        .submenu {
            display: none;
        }
        .submenu.active {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex ">
    
           

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('-translate-x-full');
        });

        // Menu dropdown functionality
        document.querySelectorAll('.menu-header').forEach(header => {
            header.addEventListener('click', function() {
                const submenu = this.nextElementSibling;
                const icon = this.querySelector('.fa-chevron-down');
                
                submenu.classList.toggle('active');
                icon.classList.toggle('fa-rotate-180');
            });
        });

        // User dropdown
        document.getElementById('userMenu').addEventListener('click', function() {
            document.getElementById('userDropdown').classList.toggle('hidden');
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('#userMenu')) {
                document.getElementById('userDropdown').classList.add('hidden');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>