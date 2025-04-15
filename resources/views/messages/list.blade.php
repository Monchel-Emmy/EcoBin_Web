<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Messages') }}
            </h2>
            <a href="{{ route('messages.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                Table View
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8" style="background-color: #BCCEF1; padding: 10px;">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"style=" padding: 30px;"><b>inbox</b> 
                <div class="p-8 text-gray-900">
                    <div class="space-y-6">
                        @foreach($messages as $message)
                            <div class="bg-white rounded-lg shadow-md p-8 border border-gray-200">
                                <div class="flex flex-col mb-4">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-xl font-semibold text-gray-900">{{ $message->title }}</h3>
                                        <span class="px-4 py-2 text-sm rounded-full 
                                            @if($message->type === 'info') bg-blue-100 text-blue-800
                                            @elseif($message->type === 'warning') bg-yellow-100 text-yellow-800
                                            @elseif($message->type === 'success') bg-green-100 text-green-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ ucfirst($message->type) }}
                                        </span>
                                    </div>
                                    <span class="text-sm text-gray-500 ml-16">{{ $message->created_at->format('M d, Y H:i') }}</span>
                                </div>
                                <p class="text-gray-600 text-lg">{{ $message->content }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 