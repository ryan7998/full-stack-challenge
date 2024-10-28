<!-- resources/views/components/similar-jobs.blade.php -->

<div class="mt-12">
    <h3 class="text-xl font-semibold mb-6">Similar Jobs</h3>

    @if($similarJobs->isEmpty())
        <p class="text-gray-500">No similar jobs found.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($similarJobs as $job)
                <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <h4 class="text-lg font-bold mb-2">{{ $job->title }}</h4>
                    <div class="flex items-center text-gray-600 mb-2">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12h1v1H9v-1zm0-4h1v3H9V8zm1.293-4.707a1 1 0 011.414 0L17 8.586V17a2 2 0 01-2 2H5a2 2 0 01-2-2V8.586l6.293-6.293a1 1 0 011.414 0z" />
                        </svg>
                        <span>{{ $job->company->name }}</span>
                    </div>
                    <p class="text-gray-700 mb-4">
                        {{ Str::limit($job->description, 100, '...') }}
                    </p>
                    <div class="flex flex-wrap items-center gap-2 text-sm text-gray-600">
                        <!-- Position Type -->
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full">
                            {{ ucfirst($job->position_type) }}
                        </span>
                        <!-- Salary -->
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full">
                            ${{ number_format($job->salary, 0) }}
                        </span>
                        <!-- Location -->
                        <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full">
                            {{ $job->location }}
                        </span>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('frontend.posts.show', $job->id) }}" class="text-blue-500 hover:underline">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
