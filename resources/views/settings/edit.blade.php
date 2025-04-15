<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Setting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('settings.update', $setting) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="key" :value="__('Setting Key')" />
                            <x-text-input id="key" name="key" type="text" class="mt-1 block w-full" :value="old('key', $setting->key)" required autofocus />
                            <p class="mt-1 text-sm text-gray-500">Use lowercase letters, numbers, and underscores only (e.g., app_name, max_users)</p>
                            <x-input-error class="mt-2" :messages="$errors->get('key')" />
                        </div>

                        <div>
                            <x-input-label for="value" :value="__('Setting Value')" />
                            <x-text-input id="value" name="value" type="text" class="mt-1 block w-full" :value="old('value', $setting->value)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('value')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('description', $setting->description) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Setting') }}</x-primary-button>
                            <a href="{{ route('settings.index') }}" class="text-gray-600 hover:text-gray-900">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 