@extends('admin.layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Company</h1>
        <a href="{{ route('admin.companies.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to Companies</a>
    </div>

    <!-- Edit Company Form -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('admin.companies.update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Company Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Company Name<span class="text-red-500">*</span></label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $company->name) }}"
                    required
                    class="w-full mt-1 p-2 border rounded @error('name') border-red-500 @enderror"
                />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email<span class="text-red-500">*</span></label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email', $company->email) }}"
                    required
                    class="w-full mt-1 p-2 border rounded @error('email') border-red-500 @enderror"
                />
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description<span class="text-red-500">*</span></label>
                <textarea
                    name="description"
                    id="description"
                    rows="5"
                    required
                    class="w-full mt-1 p-2 border rounded @error('description') border-red-500 @enderror"
                >{{ old('description', $company->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Website -->
            <div class="mb-4">
                <label for="website" class="block text-gray-700">Website</label>
                <input
                    type="url"
                    name="website"
                    id="website"
                    value="{{ old('website', $company->website) }}"
                    class="w-full mt-1 p-2 border rounded @error('website') border-red-500 @enderror"
                    placeholder="https://example.com"
                />
                @error('website')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Company</button>
            </div>
        </form>
    </div>
@endsection
