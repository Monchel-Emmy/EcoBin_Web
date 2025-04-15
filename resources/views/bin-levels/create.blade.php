@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Record New Bin Level</h1>
            <a href="{{ route('bin-levels.index') }}" class="text-blue-600 hover:text-blue-900">Back to List</a>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bin-levels.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            
            <div class="mb-4">
                <label for="bin_id" class="block text-gray-700 text-sm font-bold mb-2">Bin</label>
                <select name="bin_id" id="bin_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('bin_id') border-red-500 @enderror" required>
                    <option value="">Select a bin</option>
                    @foreach($bins as $bin)
                        <option value="{{ $bin->id }}" {{ old('bin_id') == $bin->id ? 'selected' : '' }}>
                            {{ $bin->bin_id }} - {{ $bin->location->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="plastic_level" class="block text-gray-700 text-sm font-bold mb-2">Plastic Level (%)</label>
                <input type="number" name="plastic_level" id="plastic_level" min="0" max="100" value="{{ old('plastic_level', 0) }}" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('plastic_level') border-red-500 @enderror" required>
            </div>

            <div class="mb-4">
                <label for="paper_level" class="block text-gray-700 text-sm font-bold mb-2">Paper Level (%)</label>
                <input type="number" name="paper_level" id="paper_level" min="0" max="100" value="{{ old('paper_level', 0) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('paper_level') border-red-500 @enderror" required>
            </div>

            <div class="mb-6">
                <label for="metal_level" class="block text-gray-700 text-sm font-bold mb-2">Metal Level (%)</label>
                <input type="number" name="metal_level" id="metal_level" min="0" max="100" value="{{ old('metal_level', 0) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('metal_level') border-red-500 @enderror" required>
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Record Level
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 