@extends('layouts.admin')

@section('title', 'Create Agenda')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 py-8">
    <div class="container mx-auto px-4">
        <!-- Page Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-oxford-navy rounded-full mb-4">
                <svg class="w-8 h-8 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-serif font-bold text-oxford-navy mb-2">Create New Agenda</h1>
            <p class="text-oxford-gold font-medium">Schedule and manage school events</p>
        </div>

        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-oxford-navy via-oxford-navy-light to-oxford-navy px-8 py-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-oxford-gold rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-oxford-navy" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-serif font-bold text-white">Event Information</h2>
                            <p class="text-oxford-gold text-sm">Fill in the event details below</p>
                        </div>
                    </div>
                </div>
                
                <form action="{{ route('admin.agendas.store') }}" method="POST" class="p-8 space-y-8">
                    @csrf
                    
                    <!-- Basic Information Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-serif font-semibold text-oxford-navy mb-4 flex items-center">
                            <div class="w-6 h-6 bg-oxford-gold rounded-full flex items-center justify-center mr-2">
                                <span class="text-xs font-bold text-oxford-navy">1</span>
                            </div>
                            Basic Information
                        </h3>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="judul" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z"></path>
                                    </svg>
                                    Event Title *
                                </label>
                                <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium" 
                                       placeholder="Enter event title"
                                       required>
                                @error('judul')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <div class="space-y-2">
                                <label for="tanggal" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"></path>
                                    </svg>
                                    Event Date *
                                </label>
                                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium" 
                                       required>
                                @error('tanggal')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                            <div class="space-y-2">
                                <label for="waktu" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"></path>
                                    </svg>
                                    Time *
                                </label>
                                <input type="time" name="waktu" id="waktu" value="{{ old('waktu') }}"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium" 
                                       required>
                                @error('waktu')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <div class="space-y-2">
                                <label for="lokasi" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"></path>
                                    </svg>
                                    Location *
                                </label>
                                <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}"
                                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium" 
                                       placeholder="Enter event location"
                                       required>
                                @error('lokasi')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Description Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-serif font-semibold text-oxford-navy mb-4 flex items-center">
                            <div class="w-6 h-6 bg-oxford-gold rounded-full flex items-center justify-center mr-2">
                                <span class="text-xs font-bold text-oxford-navy">2</span>
                            </div>
                            Event Description
                        </h3>
                        
                        <div class="space-y-2">
                            <label for="deskripsi" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path>
                                </svg>
                                Description *
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="6" 
                                      class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium resize-none" 
                                      placeholder="Describe the event details, objectives, and any important information..."
                                      required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Status Section -->
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                        <h3 class="text-lg font-serif font-semibold text-oxford-navy mb-4 flex items-center">
                            <div class="w-6 h-6 bg-oxford-gold rounded-full flex items-center justify-center mr-2">
                                <span class="text-xs font-bold text-oxford-navy">3</span>
                            </div>
                            Event Status
                        </h3>
                        
                        <div class="space-y-2">
                            <label for="status" class="block text-sm font-semibold text-oxford-navy mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-oxford-gold" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                                </svg>
                                Event Status *
                            </label>
                            <select name="status" id="status" 
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-oxford-gold focus:ring-4 focus:ring-oxford-gold/20 transition-all duration-300 font-medium text-gray-900" 
                                    required>
                                <option value="upcoming" class="text-gray-900" {{ old('status') == 'upcoming' ? 'selected' : '' }}>📅 Upcoming - Event is scheduled</option>
                                <option value="ongoing" class="text-gray-900" {{ old('status') == 'ongoing' ? 'selected' : '' }}>🔄 Ongoing - Event is happening now</option>
                                <option value="completed" class="text-gray-900" {{ old('status') == 'completed' ? 'selected' : '' }}>✅ Completed - Event has finished</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.agendas.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Manage Agendas
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-oxford-navy to-oxford-navy-light hover:from-oxford-navy-light hover:to-oxford-navy text-oxford-gold font-bold rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Create Agenda
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
