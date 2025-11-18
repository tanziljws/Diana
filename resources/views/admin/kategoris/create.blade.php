@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-oxford-navy rounded-full mb-4">
                <svg class="w-8 h-8 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-serif font-bold text-oxford-navy mb-2">Create New Category</h1>
            <p class="text-oxford-gold font-medium">Organize content with categories</p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-oxford-navy via-oxford-navy-light to-oxford-navy px-8 py-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-oxford-gold rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-serif font-bold text-white">Category Information</h2>
                            <p class="text-oxford-gold text-sm">Fill in the category details below</p>
                        </div>
                    </div>
                </div>
                
                <form action="{{ route('admin.kategoris.store') }}" method="POST" class="p-8 space-y-8">
                    @csrf
                    
                    <!-- Category Information Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-serif font-semibold text-oxford-navy mb-4 flex items-center">
                            <div class="w-6 h-6 bg-oxford-gold rounded-full flex items-center justify-center mr-2">
                                <span class="text-xs font-bold text-oxford-navy">1</span>
                            </div>
                            Category Details
                        </h3>
                        
                        <div class="space-y-2">
                            <label for="kategori" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                </svg>
                                Category Name *
                            </label>
                            <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}"
                                   class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium" 
                                   placeholder="Enter category name (e.g., News, Events, Announcements)"
                                   required>
                            @error('kategori')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Choose a descriptive name for this category</p>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.kategoris.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Manage Categories
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-oxford-navy to-oxford-navy-light hover:from-oxford-navy-light hover:to-oxford-navy text-oxford-gold font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
