@extends('layouts.app')
@php
    // Determine if the post is bookmarked by the user
    $isBookmarked = false;
    $admin = Auth::user()?->is_admin
@endphp
@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Company Details -->
        <div class="flex flex-col items-center mb-8">

            <!-- Company Name -->
            <h1 class="text-4xl font-bold mb-2">{{ $company->name }}</h1>

            <!-- Company Website -->
            @if($company->website)
                <p class="text-blue-500 hover:underline mb-2">
                    <a href="{{ $company->website }}" target="_blank" rel="noopener noreferrer">
                        Visit Website
                    </a>
                </p>
            @endif

            <!-- Company Location -->
            <div class="flex items-center text-gray-600 mb-4">
                <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0C4.485 0 0 4.486 0 10c0 7.5 9.09 14.66 9.364 14.91.123.135.343.135.466 0C10.91 14.66 20 7.5 20 10c0-5.514-4.485-10-10-10zM10 13a3 3 0 100-6 3 3 0 000 6z" />
                </svg>
                <span>{{ $company->location }}</span>
            </div>

            <!-- Company Description -->
            <p class="text-gray-700 text-center max-w-2xl">
                {{ $company->description }}
            </p>
        </div>

        @if($admin)
        <div class="flex space-x-2 justify-center">
            <a href="{{ route('admin.companies.edit', $company->id) }}" class="text-yellow-500 hover:text-yellow-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v9a2 2 0 002 2h9a2 2 0 002-2v-5M18.364 2.636a9 9 0 11-12.728 12.728A9 9 0 0118.364 2.636z" />
                </svg>
                Edit
            </a>

            <!-- Delete Button Trigger -->
            <button
                x-data
                @click="$dispatch('open-modal', 'delete-company-{{ $company->id }}')"
                class="text-red-500 hover:text-red-700"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Delete
            </button>

            <!-- Delete Confirmation Modal -->
            <x-modal name="delete-company-{{ $company->id }}" :show="false" maxWidth="sm">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">Confirm Deletion</h2>
                    <p class="mb-4">Are you sure you want to delete the company "{{ $company->name }}"?</p>
                    <div class="flex justify-end space-x-2">
                        <button 
                            x-data
                            @click="$dispatch('close-modal', 'delete-company-{{ $company->id }}')" 
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                        >
                            Cancel
                        </button>
                        <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </div>
            </x-modal>
        </div>
        @endif

        <!-- Associated Job Posts -->
        <div>
            <h2 class="text-xl mb-6"><b>{{ $company->posts->count() }}</b> Job Openings at {{ $company->name }}</h2>

            @if( $company->posts->count() > 0)
                <div class="grid grid-cols-1 gap-6">
                    @foreach($company->posts as $post)
                        @php
                            // $isBookmarked = auth()->check() ? auth()->user()->bookmarkedPosts()->where('post_id', $post->id)->exists() : false;
                        @endphp

                        <x-job-card :post="$post" :isBookmarked="false" />
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{-- {{ $company->posts->links() }} --}}
                </div>
            @else
                <div class="text-center text-gray-500">
                    No job postings available at this time.
                </div>
            @endif
        </div>
    </div>
@endsection
