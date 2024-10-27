@props(['post', 'isBookmarked'])
<div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
    <!-- Bookmark Button -->
    <button
        data-bookmark-id="{{ $post->id }}"
        onclick="toggleBookmark({{ $post->id }})"
        class="top-4 right-4 text-gray-400 hover:text-yellow-500 focus:outline-none"
        title="Bookmark this job"
    >
        <!-- Bookmark Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="{{ $isBookmarked ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 20 20">
            <path d="M5 3a2 2 0 00-2 2v14l7-3 7 3V5a2 2 0 00-2-2H5z" />
        </svg>
    </button>
    
    <!-- Job Details -->
    <h2 class="text-2xl font-bold mb-2">{{ $post->title }}</h2>
    <div class="flex items-center text-gray-600 mb-4">
        <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9 12h1v1H9v-1zm0-4h1v3H9V8zm1.293-4.707a1 1 0 011.414 0L17 8.586V17a2 2 0 01-2 2H5a2 2 0 01-2-2V8.586l6.293-6.293a1 1 0 011.414 0z" />
        </svg>
        <span>{{ $post->company->name }}</span>
    </div>
    <p class="text-gray-700 mb-4">
        {{ Str::limit($post->description, 150, '...') }}
    </p>
    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
        <!-- Position Type -->
        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full">
            {{ ucfirst($post->position_type) }}
        </span>
        <!-- Salary -->
        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full">
            ${{ number_format($post->salary, 0) }}
        </span>
        <!-- Location -->
        <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full">
            {{ $post->location }}
        </span>
    </div>
    <div class="mt-4 text-right">
        <a href="{{ route('frontend.posts.show', $post->id) }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-150">
            View Details
        </a>
    </div>
</div>
