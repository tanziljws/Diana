@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-5xl">
    <!-- Back to Posts -->
    <div class="mb-8">
        <a href="{{ route('posts.index') }}" class="inline-flex items-center text-oxford-navy hover:text-oxford-gold transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Berita
        </a>
    </div>

    <!-- Main Content -->
    <article class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Featured Image -->
        @if($post->gambar)
        <div class="h-96 overflow-hidden">
            <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-full object-cover">
        </div>
        @endif

        <!-- Post Content -->
        <div class="p-8">
            <!-- Category -->
            @if($post->kategori)
            <div class="mb-4">
                <span class="inline-block px-3 py-1 text-sm font-semibold text-oxford-navy bg-oxford-gold/10 rounded-full">
                    {{ $post->kategori->kategori }}
                </span>
            </div>
            @endif

            <!-- Title -->
            <h1 class="text-4xl font-serif font-bold text-oxford-navy mb-4">{{ $post->judul }}</h1>
            
            <!-- Meta -->
            <div class="flex items-center text-gray-500 text-sm mb-8">
                <span>{{ $post->created_at->translatedFormat('d F Y') }}</span>
                <span class="mx-2">•</span>
                <span>{{ $post->penulis ?? 'Admin' }}</span>
            </div>

            <!-- Content -->
            <div class="prose max-w-none text-gray-700 mb-12">
                {!! $post->konten !!}
            </div>

            <!-- Tags -->
            @if($post->tags)
            <div class="flex flex-wrap gap-2 mb-8">
                @foreach(explode(',', $post->tags) as $tag)
                    <span class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-full">
                        {{ trim($tag) }}
                    </span>
                @endforeach
            </div>
            @endif
        </div>
    </article>

    <!-- Related Posts -->
    @if($relatedPosts->count() > 0)
    <div class="mt-16">
        <h2 class="text-2xl font-serif font-bold text-oxford-navy mb-8">Berita Terkait</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($relatedPosts as $relatedPost)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                @if($relatedPost->gambar)
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('storage/' . $relatedPost->gambar) }}" alt="{{ $relatedPost->judul }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                @endif
                <div class="p-6">
                    @if($relatedPost->kategori)
                    <span class="text-sm font-medium text-oxford-gold">{{ $relatedPost->kategori->kategori }}</span>
                    @endif
                    <h3 class="text-xl font-semibold text-oxford-navy mt-2 mb-3">
                        <a href="{{ route('posts.show', $relatedPost) }}" class="hover:text-oxford-gold transition-colors">
                            {{ Str::limit($relatedPost->judul, 50) }}
                        </a>
                    </h3>
                    <p class="text-gray-500 text-sm">{{ $relatedPost->created_at->translatedFormat('d F Y') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
