<!-- filepath: c:\xampp\htdocs\ecobin-admin\resources\views\layouts\app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased h-full" style="background-color: #BCCEF1">
    <div class="min-h-screen  flex" style="background-color: #BCCEF1">
        <!-- Sidebar Toggle Button -->
        <button id="sidebarToggle" class="fixed top-4 left-4 z-50 p-2 rounded-md bg-white shadow-md hover:bg-gray-100 focus:outline-none">
            <svg id="menuIcon" class="h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg id="closeIcon" class="h-6 w-6 text-gray-600 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Sidebar -->
        <div id="sidebar" class="fixed top-0 left-0  h-screen w-64  shadow-lg overflow-y-auto z-40">
            <div class=" flex flex-col">
                <x-sidebar />
            </div>
        </div>

        <!-- Main content area -->
        <div id="mainContent" class="pl-64 pr-4  min-h-screen flex flex-col w-full">
            <!-- Top Navigation -->
            <div class="sticky top-0 z-30 shadow" style="background-color: #BCCEF1; margin-top: 20px; margin-bottom: 20px; margin-right: 20px;">
                <div class="px-3 sm:px-8 lg:px-10">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <!-- Search Bar -->
                            <div class="relative" style="width: 800px;">
                                <div class="absolute inset-y-1 left-0 pl-3 pt-5 flex items-center pointer-events">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-3 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="        Search...">
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <!-- Notification button -->
                            <button type="button" class="p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <!-- <span class="sr-only">View notifications</span> -->
                                <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>
                            
                            <!-- User Profile Dropdown -->
                            <div class="relative">
                                <button type="button" class="flex items-center focus:outline-none" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ Auth::user()->name ?? 'User' }}&background=0D8ABC&color=fff" alt="User profile">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-full mx-auto py-6 px-6 sm:px-8 lg:px-10">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-1 py-6">
                <div class="max-w-full mx-auto px-6 sm:px-8 lg:px-10">
                    @isset($slot)
                        {{ $slot }}
                    @else
                        @yield('content')
                    @endisset
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const menuIcon = document.getElementById('menuIcon');
            const closeIcon = document.getElementById('closeIcon');
            
            // Check if sidebar state is stored in localStorage
            const sidebarHidden = localStorage.getItem('sidebarHidden') === 'true';
            
            // Apply initial state
            if (sidebarHidden) {
                sidebar.style.display = 'none';
                mainContent.style.paddingLeft = '0';
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                // Ensure content is properly positioned when sidebar is visible
                mainContent.style.paddingLeft = '16rem';
            }
            
            sidebarToggle.addEventListener('click', function() {
                const isHidden = sidebar.style.display === 'none';
                
                if (isHidden) {
                    // Show sidebar
                    sidebar.style.display = 'block';
                    mainContent.style.paddingLeft = '16rem'; // 64 = 16rem
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                    localStorage.setItem('sidebarHidden', 'false');
                } else {
                    // Hide sidebar
                    sidebar.style.display = 'none';
                    mainContent.style.paddingLeft = '0';
                    menuIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                    localStorage.setItem('sidebarHidden', 'true');
                }
            });
        });
    </script>
</body>
</html>