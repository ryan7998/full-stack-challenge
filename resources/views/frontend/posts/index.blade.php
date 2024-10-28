@extends('admin.layouts.app')
@php
    // Determine if the post is bookmarked by the user
    $isBookmarked = false;
    $isAdmin = Auth::user()?->is_admin
@endphp
@section('content')
    <div class="container mx-auto px-4 py-8" x-data="postFilters()">

        <!-- Job Filters Component -->
        <x-post-filters :companies="$companies" />
        @if ($isAdmin)
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Manage Posts</h1>
                <a href="{{ route('admin.posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create New Post</a>
            </div>
        @endif

        <!-- Flash Messages -->
        @if(session('success'))
        <div x-data="{ show: true }" x-show="show" class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg @click="show = false" class="fill-current h-6 w-6 text-green-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 001.697-1.697l-5.651-5.651 5.651-5.651a1.2 1.2 0 00-1.697-1.697L8 6.653 2.349.999a1.2 1.2 0 10-1.697 1.697L6.653 8l-5.651 5.651a1.2 1.2 0 001.697 1.697L8 9.347l5.651 5.651z"/>
                </svg>
            </span>
        </div>
        @endif 

        @if(session('error'))
        <div x-data="{ show: true }" x-show="show" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg @click="show = false" class="fill-current h-6 w-6 text-red-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 001.697-1.697l-5.651-5.651 5.651-5.651a1.2 1.2 0 00-1.697-1.697L8 6.653 2.349.999a1.2 1.2 0 10-1.697 1.697L6.653 8l-5.651 5.651a1.2 1.2 0 001.697 1.697L8 9.347l5.651 5.651z"/>
                </svg>
            </span>
        </div>
        @endif

        <!-- Job Listings -->
        <div class="grid grid-cols-1 gap-6">
            @forelse($posts as $post)
                <!-- Job Card Component -->
                <x-job-card :post="$post" :isBookmarked="$isBookmarked" :admin="$isAdmin"/>
            @empty
                <div class="text-center text-gray-500">
                    No job postings found matching your criteria.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>

    <!-- Alpine.js Component -->
    <script>
        function postFilters() {
            return {
                search: "{{ request('search') }}",
                position_type: "{{ request('position_type') }}",
                salary_min: "{{ request('salary_min') }}",
                salary_max: "{{ request('salary_max') }}",
                company: "{{ request('company') }}",
                location: "{{ request('location') }}",

                applyFilters() {
                    let query = {};

                    if (this.search) query.search = this.search;
                    if (this.position_type) query.position_type = this.position_type;
                    if (this.salary_min) query.salary_min = this.salary_min;
                    if (this.salary_max) query.salary_max = this.salary_max;
                    if (this.company) query.company = this.company;
                    if (this.location) query.location = this.location;

                    let queryString = new URLSearchParams(query).toString();
                    window.location.href = "{{ route('frontend.posts.index') }}" + (queryString ? '?' + queryString : '');
                },

                resetFilters() {
                    this.search = '';
                    this.position_type = '';
                    this.salary_min = '';
                    this.salary_max = '';
                    this.company = '';
                    this.location = '';
                    window.location.href = "{{ route('frontend.posts.index') }}";
                }
            }
        }
    </script>
@endsection
