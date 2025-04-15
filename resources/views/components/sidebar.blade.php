<div class="flex flex-col h-full bg-white text-black w-64" >
    <div class="flex items-center justify-center h-16 border-b border-gray-200">
        <span class="text-xl font-bold text-black">EcoBin Admin</span>
    </div>
    
    <div class="flex-1 overflow-y-auto py-4">
        <nav class="px-2 space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-white' : 'text-black hover:bg-gray-100' }}">
                <svg class="mr-3 h-6 w-6 {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-black group-hover:text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                dashboard
            </a>
            
            <!-- Bins Management -->
            <a href="{{ route('bins.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('bins.*') ? 'bg-blue-100 text-blue-600' : 'text-black hover:bg-gray-100' }}">
                <svg class="mr-3 h-6 w-6 {{ request()->routeIs('bins.*') ? 'text-blue-600' : 'text-black group-hover:text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Bins Management
            </a>
            
            <!-- User Management -->
            <a href="{{ route('users.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('users.*') ? 'bg-blue-100 text-blue-600' : 'text-black hover:bg-gray-100' }}">
                <svg class="mr-3 h-6 w-6 {{ request()->routeIs('users.*') ? 'text-blue-600' : 'text-black group-hover:text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                User Management
            </a>
            
            <!-- Location -->
            <a href="{{ route('locations.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('locations.*') ? 'bg-blue-100 text-blue-600' : 'text-black hover:bg-gray-100' }}">
                <svg class="mr-3 h-6 w-6 {{ request()->routeIs('locations.*') ? 'text-blue-600' : 'text-black group-hover:text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Location
            </a>
            
            <!-- Messages -->
            <a href="{{ route('messages.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('messages.index') ? 'bg-blue-100 text-blue-600' : 'text-black hover:bg-gray-100' }}">
                <svg class="mr-3 h-6 w-6 {{ request()->routeIs('messages.index') ? 'text-blue-600' : 'text-black group-hover:text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                Messages (Table)
            </a>
            
            <a href="{{ route('messages.list') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('messages.list') ? 'bg-blue-100 text-blue-600' : 'text-black hover:bg-gray-100' }}">
                <svg class="mr-3 h-6 w-6 {{ request()->routeIs('messages.list') ? 'text-blue-600' : 'text-black group-hover:text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Messages (List)
            </a>
            
            <!-- Settings -->
            <a href="{{ route('settings.index') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ request()->routeIs('settings.*') ? 'bg-blue-100 text-blue-600' : 'text-black hover:bg-gray-100' }}">
                <svg class="mr-3 h-6 w-6 {{ request()->routeIs('settings.*') ? 'text-blue-600' : 'text-black group-hover:text-gray-700' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Settings
            </a>
        </nav>
    </div>
    
    <div class="border-t border-gray-200 p-4 bg-white">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="{{ Auth::user()->name }}">
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-black">{{ Auth::user()->name }}</p>
                <p class="text-xs font-medium text-gray-600">{{ Auth::user()->email }}</p>
            </div>
        </div>
        
        <div class="mt-4 space-y-1">
            <a href="{{ route('help') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-black hover:bg-gray-100">
                <svg class="mr-3 h-6 w-6 text-black group-hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Help
            </a>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full group flex items-center px-2 py-2 text-sm font-medium rounded-md text-black hover:bg-gray-100">
                    <svg class="mr-3 h-6 w-6 text-black group-hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</div> 