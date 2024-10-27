@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Job Details -->
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Job Information -->
            <div class="md:w-2/3">
                <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
                <!-- Bookmark Button -->
                <button
                    data-bookmark-id="{{ $post->id }}"
                    onclick="toggleBookmark({{ $post->id }})"
                    class="text-gray-400 hover:text-yellow-500 focus:outline-none mb-4"
                    title="Bookmark this job"
                >
                    <!-- Bookmark Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                        <path d="M5 3a2 2 0 00-2 2v14l7-3 7 3V5a2 2 0 00-2-2H5z" />
                    </svg>
                </button>

                <!-- Company Info -->
                <div class="flex items-center text-gray-600 mb-4">
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12h1v1H9v-1zm0-4h1v3H9V8zm1.293-4.707a1 1 0 011.414 0L17 8.586V17a2 2 0 01-2 2H5a2 2 0 01-2-2V8.586l6.293-6.293a1 1 0 011.414 0z" />
                    </svg>
                    <span class="font-medium">{{ $post->company->name }}</span>
                </div>
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <!-- Position Type -->
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                        {{ ucfirst($post->position_type) }}
                    </span>
                    <!-- Salary -->
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm">
                        ${{ number_format($post->salary, 0) }}
                    </span>
                    <!-- Location -->
                    <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
                        {{ $post->location }}
                    </span>
                </div>
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold mb-2">Job Description</h2>
                    <p class="text-gray-700 leading-relaxed">
                        {!! nl2br(e($post->description)) !!}
                    </p>
                </div>
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold mb-2">About {{ $post->company->name }}</h2>
                    <p class="text-gray-700 leading-relaxed">
                        {!! nl2br(e($post->company->description ?? 'No description available.')) !!}
                    </p>
                </div>
            </div>

            <!-- Company Information -->
            <div class="md:w-1/3">
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Company Details</h3>
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z" />
                        </svg>
                        <span>{{ $post->company->name }}</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 8a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8z" />
                        </svg>
                        <span>{{ $post->company->email }}</span>
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM7 9h6v2H7V9z" />
                        </svg>
                        <span><a href="{{ $post->company->website }}" target="_blank" class="text-blue-500 hover:underline">{{ $post->company->website }}</a></span>
                    </div>
                    <a href="mailto:{{ $post->company->email }}" class="w-full block text-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        Contact Company
                    </a>
                </div>
            </div>
        </div>

        <!-- Similar Jobs Component -->
        <x-similar-jobs :similarJobs="$similarJobs" />
    </div>
@endsection
