@props(['companies'])
<div class="mb-6" x-data="postFilters()">
    <!-- Job Search Bar -->
    <div class="mb-6">
        <form @submit.prevent="applyFilters" action="{{ route('frontend.posts.index') }}" class="flex flex-col md:flex-row items-center gap-4">
            <input
                type="text"
                name="search"
                x-model="search"
                placeholder="Search for jobs..."
                class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800"
            />

            <button type="submit" @click="applyFilters" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 ">
                Search
            </button>
        </form>
    </div>
    <!-- Filters -->
    <div class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Position Type Filter -->
            <div>
                <label for="position_type" class="block text-gray-700 font-medium mb-2">Position Type</label>
                <select
                    name="position_type"
                    id="position_type"
                    x-model="position_type"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">All</option>
                    <option value="remote">Remote</option>
                    <option value="in-person">In-Person</option>
                </select>
            </div>

            <!-- Salary Min Filter -->
            <div>
                <label for="salary_min" class="block text-gray-700 font-medium mb-2">Min Salary</label>
                <input
                    type="number"
                    name="salary_min"
                    id="salary_min"
                    x-model.number="salary_min"
                    placeholder="e.g., 30000"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    min="0"
                />
            </div>

            <!-- Salary Max Filter -->
            <div>
                <label for="salary_max" class="block text-gray-700 font-medium mb-2">Max Salary</label>
                <input
                    type="number"
                    name="salary_max"
                    id="salary_max"
                    x-model.number="salary_max"
                    placeholder="e.g., 100000"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    min="0"
                />
            </div>

            <!-- Company Filter -->
            <div>
                <label for="company" class="block text-gray-700 font-medium mb-2">Company</label>
                <select
                    name="company"
                    id="company"
                    x-model="company"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">All</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Location Filter -->
            <div class="col-span-1">
                <label for="location" class="block text-gray-700 font-medium mb-2">Location</label>
                <input
                    type="text"
                    name="location"
                    id="location"
                    x-model="location"
                    placeholder="e.g., New York"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
        </div>

        <!-- Apply Filters Button -->
        <div class="mt-4 flex justify-end">
            <button @click="applyFilters" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                Apply Filters
            </button>
            <button @click="resetFilters" class="ml-4 px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                Reset Filters
            </button>
        </div>
    </div>
</div>
