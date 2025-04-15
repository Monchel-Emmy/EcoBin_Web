<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Bin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('bins.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="bin_id" :value="__('Bin ID')" />
                            <x-text-input id="bin_id" name="bin_id" type="text" class="mt-1 block w-full" :value="old('bin_id')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('bin_id')" />
                        </div>

                        <div>
                            <x-input-label for="location_id" :value="__('Location')" />
                            <select id="location_id" name="location_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">Select a location</option>
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                        {{ $location->name }} - {{ $location->address }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('location_id')" />
                        </div>

                        <div>
                            <x-input-label for="user_id" :value="__('Assigned To')" />
                            <select id="user_id" name="user_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Not Assigned</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                        </div>

                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" name="status" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="Empty" {{ old('status') === 'Empty' ? 'selected' : '' }}>Empty</option>
                                <option value="Full" {{ old('status') === 'Full' ? 'selected' : '' }}>Full</option>
                                <option value="Maintenance" {{ old('status') === 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('status')" />
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Fill Levels</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="plastic_level" :value="__('Plastic Level (%)')" />
                                    <x-text-input id="plastic_level" name="plastic_level" type="number" min="0" max="100" class="mt-1 block w-full" :value="old('plastic_level', 0)" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('plastic_level')" />
                                </div>

                                <div>
                                    <x-input-label for="paper_level" :value="__('Paper Level (%)')" />
                                    <x-text-input id="paper_level" name="paper_level" type="number" min="0" max="100" class="mt-1 block w-full" :value="old('paper_level', 0)" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('paper_level')" />
                                </div>

                                <div>   
                                    <x-input-label for="metal_level" :value="__('Metal Level (%)')" />
                                    <x-text-input id="metal_level" name="metal_level" type="number" min="0" max="100" class="mt-1 block w-full" :value="old('metal_level', 0)" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('metal_level')" />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button style="background-color: blue; color: white;">{{ __('Add') }}</x-primary-button>
                            <a href="{{ route('bins.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 