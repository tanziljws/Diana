@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-oxford-navy to-oxford-navy-light px-6 py-4">
                <h1 class="text-2xl font-bold text-oxford-gold">Create New Category</h1>
            </div>
            
            <form action="{{ route('admin.kategoris.store') }}" method="POST" class="p-6">
                @csrf
                
                <div class="mb-6">
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                    <input type="text" name="kategori" id="kategori" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-oxford-gold focus:border-transparent transition-all duration-200"
                           placeholder="Masukkan nama kategori" required>
                    @error('kategori')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.kategoris.index') }}" 
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
