@extends('layouts.app')

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
