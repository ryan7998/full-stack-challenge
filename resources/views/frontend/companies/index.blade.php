@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Our Companies</h1>

        <!-- Companies Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($companies as $company)
                <x-company-card :company="$company" />
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
