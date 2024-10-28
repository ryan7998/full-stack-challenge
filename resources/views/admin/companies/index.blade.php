@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Manage Companies</h1>

        <!-- Create New Company Button -->
        <div class="mb-6">
            <a href="{{ route('admin.companies.create') }}" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                Create New Company
            </a>
        </div>

        <!-- Companies Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($companies as $company)
                <x-company-card :company="$company" admin="true" />
            @empty
                <div class="text-center text-gray-500 col-span-3">
                    No companies found.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $companies->links() }}
        </div>
    </div>
@endsection
