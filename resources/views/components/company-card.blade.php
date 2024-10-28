@props(['company', 'admin' => false])

<div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
    <!-- Company Logo -->
    <div class="flex justify-center mb-4">
        @if($company->logo)
            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }} Logo" class="h-20 w-20 object-cover rounded-full">
        @else
            <img src="{{ asset('images/default-company.png') }}" alt="Default Company Logo" class="h-20 w-20 object-cover rounded-full">
        @endif
    </div>

    <!-- Company Name -->
    <h2 class="text-2xl font-bold text-center mb-2">{{ $company->name }}</h2>

    <!-- Company Website -->
    @if($company->website)
        <p class="text-center text-blue-500 hover:underline mb-2">
            <a href="{{ $company->website }}" target="_blank" rel="noopener noreferrer">
                Visit Website
            </a>
        </p>
    @endif

    <!-- Company Description -->
    <p class="text-gray-700 text-center mb-4">
        {{ Str::limit($company->description, 100, '...') }}
    </p>

    <!-- Company Location -->
    <div class="flex items-center justify-center text-gray-600 mb-4">
        <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 0C4.485 0 0 4.486 0 10c0 7.5 9.09 14.66 9.364 14.91.123.135.343.135.466 0C10.91 14.66 20 7.5 20 10c0-5.514-4.485-10-10-10zM10 13a3 3 0 100-6 3 3 0 000 6z" />
        </svg>
        <span>{{ $company->location }}</span>
    </div>

    <!-- Actions -->
    <div class="flex justify-center space-x-4">
        <a href="{{ route('frontend.companies.show', $company->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            View Details
        </a>

        @if($admin)
            <a href="{{ route('admin.companies.edit', $company->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                Edit
            </a>

            <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                    Delete
                </button>
            </form>
        @endif
    </div>
</div>
