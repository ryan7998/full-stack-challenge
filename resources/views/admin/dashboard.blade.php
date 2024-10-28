@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-4">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
        <p class="text-gray-700">Manage your posts and companies efficiently.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Manage Posts Card -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold">Posts</h2>
                    <p class="text-gray-600">Create, view, edit, and delete posts.</p>
                </div>
                <a href="{{ route('admin.posts.index') }}" class="text-blue-500 hover:text-blue-700">Manage</a>
            </div>
        </div>

        <!-- Manage Companies Card -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold">Companies</h2>
                    <p class="text-gray-600">Create, view, edit, and delete companies.</p>
                </div>
                <a href="{{ route('admin.companies.index') }}" class="text-blue-500 hover:text-blue-700">Manage</a>
            </div>
        </div>
    </div>
</div>
@endsection
