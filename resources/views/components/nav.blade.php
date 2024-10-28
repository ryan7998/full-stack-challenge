<nav class="bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ url('/') }}" class="text-white text-xl font-bold">WiseJobs</a>
            </div>

            <!-- Menu Links -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    @auth 
                        @if(Auth::user()->is_admin)
                            <!-- Admin-Specific Links -->
                            {{-- <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a> --}}
                            <a href="{{ route('admin.posts.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Manage Posts</a>
                            <a href="{{ route('admin.companies.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Manage Companies</a>
                            <!-- More Admin Links -->
                        @endif

                        <!-- Authenticated User Links -->
                        {{-- <a href="{{ route('profile') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Profile</a> --}}
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                        </form>
                    @else
                        <!-- Guest Links -->
                        <a href="{{ route('frontend.posts.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Jobs</a>
                        <a href="{{ route('frontend.companies.index') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Companies</a>
                        <a href="{{ route('login') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    @endauth
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="-mr-2 flex md:hidden">
                <button @click="open = !open" class="bg-gray-900 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu, show/hide based on menu state. -->
    <div class="md:hidden" x-show="open" @click.away="open = false">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <!-- Common Links for All Users -->
           

            @auth
                @if(Auth::user()->is_admin)
                    <!-- Admin-Specific Links -->
                    {{-- <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a> --}}
                    <a href="{{ route('admin.posts.index') }}" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Manage Jobs</a>
                    <a href="{{ route('admin.companies.index') }}" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Manage Companies</a>
                    <!-- More Admin Links -->
                @endif

                <!-- Authenticated User Links -->
                {{-- <a href="{{ route('profile') }}" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Profile</a> --}}
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:text-white block w-full text-left px-3 py-2 rounded-md text-base font-medium">Logout</button>
                </form>
            @else
                <!-- Guest Links -->
                <a href="{{ url('/') }}" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="{{ route('frontend.posts.index') }}" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Browse Jobs</a>
                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Login</a>
            @endauth
        </div>
    </div>
</nav>
