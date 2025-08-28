@extends('layouts.admin')

@section('title', 'Manage Galleries')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Manage Galleries</h1>
        <a href="{{ route('admin.galleries.create') }}" 
           class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
            Create New Gallery
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($galleries as $gallery)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="h-48 bg-gray-200 relative">
                    @if($gallery->fotos->count() > 0)
                        <img src="{{ asset($gallery->fotos->first()->path_foto) }}" 
                             alt="{{ $gallery->nama_gallery }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute top-2 right-2 bg-black bg-opacity-50 text-white px-2 py-1 rounded text-sm">
                            {{ $gallery->fotos->count() }} photos
                        </div>
                    @else
                        <div class="flex items-center justify-center h-full text-gray-400">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Gallery #{{ $gallery->id_g }}</h3>
                            <p class="text-gray-600 mb-4">Post: {{ $gallery->post->judul ?? 'No Post' }} | Position: {{ $gallery->position }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500">{{ $gallery->created_at->format('M d, Y') }}</span>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.galleries.show', $gallery) }}" 
                               class="text-blue-600 hover:text-blue-900 text-sm">View</a>
                            <a href="{{ route('admin.galleries.edit', $gallery) }}" 
                               class="text-green-600 hover:text-green-900 text-sm">Edit</a>
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm" 
                                        onclick="return confirm('Are you sure you want to delete this gallery?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No galleries</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new gallery.</p>
                <div class="mt-6">
                    <a href="{{ route('admin.galleries.create') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700">
                        Create Gallery
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
