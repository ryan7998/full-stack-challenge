@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8" x-data="postFilters()">
        <!-- Job Filters Component -->
        <x-post-filters :companies="$companies" />

        <!-- Job Listings -->
        <div class="grid grid-cols-1 gap-6">
            @forelse($posts as $post)
                @php
                    // Determine if the post is bookmarked by the user
                    $isBookmarked = false;
                    $isAdmin = Auth::user()?->is_admin
                @endphp

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
