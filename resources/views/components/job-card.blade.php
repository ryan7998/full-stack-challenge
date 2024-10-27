@props(['post', 'isBookmarked', 'admin' => false])

<div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 relative">
    <!-- Bookmark Button (Only for Frontend) -->
    @unless($admin)
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
    @endunless

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
    <div class="mt-4 flex justify-between items-center">
        <a href="{{ route('frontend.posts.show', $post->id) }}" class="text-blue-500 hover:underline">
            View Details
        </a>

        <!-- Admin Actions -->
        @if($admin)
            <div class="flex space-x-2">
                <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-yellow-500 hover:text-yellow-700">
                    <!-- Edit Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v9a2 2 0 002 2h9a2 2 0 002-2v-5M18.364 2.636a9 9 0 11-12.728 12.728A9 9 0 0118.364 2.636z" />
                    </svg>
                    Edit
                </a>
                <!-- Delete Button -->
                <button
                    x-data @click="$dispatch('open-modal', 'delete-post-{{ $post->id }}')" 
                    class="text-red-500 hover:text-red-700"
                >
                <!-- Delete Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                    Delete
                </button>

                <!-- Delete Confirmation Modal -->
                <x-modal name="delete-post-{{ $post->id }}" :show="false" maxWidth="sm">
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-2">Confirm Deletion</h2>
                        <p class="mb-4">Are you sure you want to delete the post "{{ $post->title }}"?</p>
                        <div class="flex justify-end space-x-2">
                            <button 
                                x-data @click="$dispatch('close-modal', 'delete-post-{{ $post->id }}')" 
                                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
                            >
                                Cancel
                            </button>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                </x-modal>
            </div>
        @endif
    </div>
</div>
