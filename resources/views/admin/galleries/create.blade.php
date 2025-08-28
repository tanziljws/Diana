@extends('layouts.admin')

@section('title', 'Create Gallery')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-oxford-navy to-oxford-navy-light px-6 py-4">
                <h1 class="text-2xl font-bold text-oxford-gold">Create New Gallery</h1>
            </div>
            
            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                
                <div class="mb-6">
                    <label for="post_id" class="block text-sm font-medium text-gray-700 mb-2">Related Post</label>
                    <select name="post_id" id="post_id" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-oxford-gold focus:border-transparent transition-all duration-200" required>
                        <option value="">Select Post</option>
                        @foreach($posts as $post)
                            <option value="{{ $post->id_p }}">{{ $post->judul }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="position" class="block text-sm font-medium text-gray-700 mb-2">Position</label>
                    <input type="number" name="position" id="position" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-oxford-gold focus:border-transparent transition-all duration-200"
                           placeholder="Enter position number" required>
                </div>

                <div class="mb-6">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" id="status" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-oxford-gold focus:border-transparent transition-all duration-200" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="photos" class="block text-sm font-medium text-gray-700 mb-2">Upload Photos</label>
                    <input type="file" name="photos[]" id="photos" multiple accept="image/*"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-oxford-gold focus:border-transparent transition-all duration-200" required>
                    <p class="mt-1 text-sm text-gray-500">Select multiple images for the gallery</p>
                </div>
                
                
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.galleries.index') }}" 
                       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                        Create Gallery
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
