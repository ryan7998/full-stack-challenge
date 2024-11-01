@props(['company', 'admin' => false])

<div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 relative">
    
    <!-- Bookmark Button (Only for Frontend) -->
    @unless($admin)
    @endunless

    <!-- Company Details -->
    <!-- Company Name -->
    <h2 class="text-2xl font-bold text-center mb-2">{{ $company->name }}</h2>

    <!-- Company Email -->
    <p class="text-center text-gray-600 mb-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4-4m-4 4l4 4" />
        </svg>
        {{ $company->email }}
    </p>

    <!-- Company Website -->
    @if($company->website)
        <p class="text-center text-blue-500 hover:underline mb-2">
            <a href="{{ $company->website }}" target="_blank" rel="noopener noreferrer">
                Visit Website
            </a>
        </p>
    @endif

    <!-- Total Jobs -->
    <p class="text-gray-700 text-center mb-4">
        Total Jobs: {{ $company->posts->count() }}
    </p>

    <!-- Company Description -->
    <p class="text-gray-700 text-center mb-4">
        {{ Str::limit($company->description, 100, '...') }}
    </p>

    <!-- Actions -->
    <div class="flex justify-between items-center">
        <a href="{{ route('frontend.companies.show', $company->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            View Details
        </a>

        @if($admin)
        <div class="flex space-x-2">
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
    </div>
</div>
