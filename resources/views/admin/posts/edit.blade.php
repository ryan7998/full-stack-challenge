<!-- resources/views/admin/posts/edit.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Post</h1>
        <a href="{{ route('admin.posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to Posts</a>
    </div>

    <!-- Edit Post Form -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title<span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required class="w-full mt-1 p-2 border rounded @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description<span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="5" required class="w-full mt-1 p-2 border rounded @error('description') border-red-500 @enderror">{{ old('description', $post->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Position Type -->
            <div class="mb-4">
                <label for="position_type" class="block text-gray-700">Position Type<span class="text-red-500">*</span></label>
                <select name="position_type" id="position_type" required class="w-full mt-1 p-2 border rounded @error('position_type') border-red-500 @enderror">
                    <option value="">-- Select Position Type --</option>
                    <option value="remote" {{ (old('position_type', $post->position_type) == 'remote') ? 'selected' : '' }}>Remote</option>
                    <option value="in-person" {{ (old('position_type', $post->position_type) == 'in-person') ? 'selected' : '' }}>In-Person</option>
                </select>
                @error('position_type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Salary -->
            <div class="mb-4">
                <label for="salary" class="block text-gray-700">Salary<span class="text-red-500">*</span></label>
                <input type="number" name="salary" id="salary" value="{{ old('salary', $post->salary) }}" required class="w-full mt-1 p-2 border rounded @error('salary') border-red-500 @enderror">
                @error('salary')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block text-gray-700">Location<span class="text-red-500">*</span></label>
                <input type="text" name="location" id="location" value="{{ old('location', $post->location) }}" required class="w-full mt-1 p-2 border rounded @error('location') border-red-500 @enderror">
                @error('location')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Company -->
            <div class="mb-4">
                <label for="company_id" class="block text-gray-700">Company<span class="text-red-500">*</span></label>
                <select name="company_id" id="company_id" required class="w-full mt-1 p-2 border rounded @error('company_id') border-red-500 @enderror">
                    <option value="">-- Select Company --</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ (old('company_id', $post->company_id) == $company->id) ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update Post</button>
            </div>
        </form>
    </div>
@endsection
