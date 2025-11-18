@extends('layouts.admin')

@section('title', 'Manage Agendas')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-oxford-navy rounded-full mb-4">
                <svg class="w-8 h-8 text-oxford-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-serif font-bold text-oxford-navy mb-2">School Agendas</h1>
            <p class="text-oxford-gold font-medium">Manage and organize school events and activities</p>
        </div>

        <!-- Action Bar -->
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center space-x-4">
                <div class="bg-white rounded-xl px-4 py-2 shadow-lg border border-gray-100">
                    <span class="text-sm text-oxford-navy font-medium">Total Events: {{ $agendas->count() }}</span>
                </div>
            </div>
            <a href="{{ route('admin.agendas.create') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-oxford-navy to-oxford-navy-light hover:from-oxford-navy-light hover:to-oxford-navy text-oxford-gold font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Create New Agenda
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r-xl shadow-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                    </svg>
                    <span class="text-green-700 font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Agendas Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($agendas as $agenda)
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-oxford-navy to-oxford-navy-light p-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-oxford-gold rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"></path>
                                    </svg>
                                </div>
                                <span class="text-oxford-gold text-sm font-medium">
                                    @if($agenda->status == 'upcoming') 📅 Upcoming
                                    @elseif($agenda->status == 'ongoing') 🔄 Ongoing
                                    @else ✅ Completed
                                    @endif
                                </span>
                            </div>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full
                                @if($agenda->status == 'upcoming') bg-blue-100 text-blue-800
                                @elseif($agenda->status == 'ongoing') bg-yellow-100 text-yellow-800
                                @else bg-green-100 text-green-800 @endif">
                                {{ ucfirst($agenda->status) }}
                            </span>
                        </div>
                        <h3 class="text-xl font-serif font-bold text-black mb-2">{{ $agenda->judul }}</h3>
                        <div class="flex items-center text-oxford-gold text-sm">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"></path>
                            </svg>
                            {{ \Carbon\Carbon::parse($agenda->tanggal)->format('M d, Y') }}
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <p class="text-gray-600 mb-4 leading-relaxed">{{ Str::limit($agenda->deskripsi, 100) }}</p>
                        
                        <!-- Event Details -->
                        <div class="space-y-3 mb-6">
                            @if($agenda->waktu)
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-3 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"></path>
                                </svg>
                                <span class="font-medium">{{ $agenda->waktu }}</span>
                            </div>
                            @endif
                            
                            @if($agenda->lokasi)
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-3 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"></path>
                                </svg>
                                <span class="font-medium">{{ $agenda->lokasi }}</span>
                            </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.agendas.edit', $agenda) }}" 
                                   class="inline-flex items-center px-3 py-2 bg-blue-50 text-blue-600 text-sm font-medium rounded-lg hover:bg-blue-100 transition-colors">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                            </div>
                            <form action="{{ route('admin.agendas.destroy', $agenda) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-3 py-2 bg-red-50 text-red-600 text-sm font-medium rounded-lg hover:bg-red-100 transition-colors"
                                        onclick="return confirm('Are you sure you want to delete this agenda?')">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-2xl shadow-xl p-12 text-center border border-gray-100">
                        <div class="w-20 h-20 bg-oxford-gold/10 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-oxford-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-serif font-bold text-oxford-navy mb-2">No Agendas Found</h3>
                        <p class="text-gray-600 mb-6">Start organizing school events by creating your first agenda.</p>
                        <a href="{{ route('admin.agendas.create') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-oxford-navy to-oxford-navy-light text-oxford-gold font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Create First Agenda
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
