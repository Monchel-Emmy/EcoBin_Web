<!-- resources/views/users/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                <p><strong>Status:</strong> {{ $user->is_approved ? 'Approved' : 'Pending' }}</p>
                <a href="{{ route('users.index') }}" class="text-blue-600 mt-4 inline-block">← Back to Users</a>
            </div>
        </div>
    </div>
</x-app-layout>
