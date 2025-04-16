<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Settings') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="flex flex-col items-center">
                        <h1 class="text-4xl font-normal text-[#3569D2] mb-8">Update User Profile</h1>
                        
                        <div class="w-full max-w-md">
                            <form method="POST" action="{{ route('settings.update', 1) }}" class="space-y-6">
                                @csrf
                                @method('PUT')
                                
                                <!-- Name -->
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-bold text-[#283C46] mb-1">Name required</label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                                        class="w-full h-10 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required>
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Bio -->
                                <div class="mb-4">
                                    <label for="bio" class="block text-sm font-bold text-[#283C46] mb-1">Short bio or current status</label>
                                    <input type="text" id="bio" name="bio" value="{{ old('bio', $user->bio ?? '') }}" 
                                        class="w-full h-10 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('bio')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Location -->
                                <div class="mb-4">
                                    <label for="location" class="block text-sm font-bold text-[#283C46] mb-1">Location</label>
                                    <input type="text" id="location" name="location" value="{{ old('location', $user->location ?? '') }}" 
                                        class="w-full h-10 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @error('location')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Email -->
                                <div class="mb-4">
                                    <label for="email" class="block text-sm font-bold text-[#283C46] mb-1">Email address required</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                                        class="w-full h-10 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required>
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <!-- Login Info Section -->
                                <div class="mb-6">
                                    <h3 class="text-sm font-bold text-[#283C46] mb-1">Login info</h3>
                                    <p class="text-sm text-[#283C46] mb-4">You log in with a password. Set up 2FA or change your login info here.</p>
                                    
                                    <!-- Current Password -->
                                    <div class="mb-4">
                                        <label for="current_password" class="block text-sm font-bold text-[#283C46] mb-1">Current Password</label>
                                        <input type="password" id="current_password" name="current_password" 
                                            class="w-full h-10 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        @error('current_password')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <!-- New Password -->
                                    <div class="mb-4">
                                        <label for="new_password" class="block text-sm font-bold text-[#283C46] mb-1">New Password</label>
                                        <input type="password" id="new_password" name="new_password" 
                                            class="w-full h-10 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        @error('new_password')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <!-- Confirm Password -->
                                    <div class="mb-4">
                                        <label for="new_password_confirmation" class="block text-sm font-bold text-[#283C46] mb-1">Confirm New Password</label>
                                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" 
                                            class="w-full h-10 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </div>
                                
                                <!-- Update Button -->
                                <div class="flex justify-center">
                                    <button type="submit" class="bg-[#D9D9D9] text-black font-normal py-2 px-6 rounded-md hover:bg-gray-300 transition duration-300">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 