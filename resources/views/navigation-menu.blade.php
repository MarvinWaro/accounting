<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Dark Mode Toggle Switch -->
                <label class="me-4 relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="theme-toggle" class="sr-only peer" />
                    <!-- Toggle Switch Background -->
                    <div class="w-14 h-8 bg-gray-200 dark:bg-blue-500 rounded-full peer-focus:outline-none peer-checked:bg-yellow-300 peer-checked:dark:bg-gray-600 transition-colors duration-300 ease-in-out flex items-center justify-between px-1">
                        <!-- Sun Icon (Light Mode) -->
                        <span class="w-6 h-6 text-yellow-600 flex items-center justify-center">
                            <i class="fa-solid fa-sun"></i>
                        </span>
                        <!-- Moon Icon (Dark Mode) -->
                        <span class="w-6 h-6 text-gray-200 flex items-center justify-center">
                            <i class="fa-solid fa-moon"></i>
                        </span>
                    </div>
                    <!-- Toggle Switch Button -->
                    <span class="absolute left-1 top-5 w-6 h-6 bg-white rounded-full peer-checked:translate-x-6 transition-transform duration-300 ease-in-out"></span>
                </label>

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('accounting_dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link href="{{ route('accounting_dashboard') }}" :active="request()->routeIs('accounting_dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link href="{{ route('uacs_index') }}" :active="request()->routeIs('uacs_index') || request()->routeIs('uacs_edit')">
                    {{ __('UACS') }}
                </x-nav-link>
                <x-nav-link href="#">
                    {{ __('FUND 101') }}
                </x-nav-link>
                <x-nav-link href="#">
                    {{ __('FUND 151') }}
                </x-nav-link>
                <!-- New Tab for Transaction Overview -->
                <x-nav-link href="{{ route('transaction.years') }}" :active="request()->routeIs('transaction.years') || request()->routeIs('transaction.months') || request()->routeIs('transaction.entries')">
                    {{ __('Transaction Overview') }}
                </x-nav-link>
            </div>


            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex items-center text-sm border-2 border-transparent rounded-full focus:outline-none transition">

                                    <span class="ml-2 text-gray-500 dark:text-gray-400 me-3">{{ Auth::user()->name }}</span>
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />

                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>


                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('accounting_dashboard') }}" :active="request()->routeIs('accounting_dashboard')">
                {{ __('Accounting Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>

<script>
    // Function to toggle dark mode
    function toggleDarkMode() {
        const html = document.documentElement;
        const toggleSwitch = document.getElementById('theme-toggle');

        // Toggle light mode on when checked, dark mode otherwise
        if (toggleSwitch.checked) {
            localStorage.setItem('theme', 'light');
            html.classList.remove('dark');
        } else {
            localStorage.setItem('theme', 'dark');
            html.classList.add('dark');
        }
    }

    // Event listener for the toggle button
    document.getElementById('theme-toggle').addEventListener('change', toggleDarkMode);

    // Load theme on page load based on localStorage value
    window.addEventListener('DOMContentLoaded', () => {
        const toggleSwitch = document.getElementById('theme-toggle');
        const storedTheme = localStorage.getItem('theme');

        if (storedTheme === 'dark') {
            document.documentElement.classList.add('dark');
            toggleSwitch.checked = false; // Unchecked for dark mode
        } else {
            document.documentElement.classList.remove('dark');
            toggleSwitch.checked = true; // Checked for light mode
        }
    });
</script>


{{-- <script>
    // Function to toggle dark mode
    function toggleDarkMode() {
        const html = document.documentElement;
        const toggleSwitch = document.getElementById('theme-toggle');

        // Toggle the 'dark' class on the <html> element
        html.classList.toggle('dark');

        // Update localStorage based on the current mode
        if (html.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
            toggleSwitch.checked = true;  // Set switch to "on"
        } else {
            localStorage.setItem('theme', 'light');
            toggleSwitch.checked = false; // Set switch to "off"
        }
    }

    // Event listener for the toggle button
    document.getElementById('theme-toggle').addEventListener('change', toggleDarkMode);

    // Load theme on page load based on localStorage value
    window.addEventListener('DOMContentLoaded', () => {
        const toggleSwitch = document.getElementById('theme-toggle');

        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
            toggleSwitch.checked = true;  // Set switch to "on" for dark mode
        } else {
            document.documentElement.classList.remove('dark');
            toggleSwitch.checked = false; // Set switch to "off" for light mode
        }
    });
</script> --}}
{{-- <script>
    // Function to toggle dark mode
    function toggleDarkMode() {
        const html = document.documentElement;
        html.classList.toggle('dark');

        // Save theme preference in localStorage
        if (html.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    }

    // Event listener for the toggle button
    document.getElementById('theme-toggle').addEventListener('click', toggleDarkMode);

    // Load theme on page load based on localStorage value
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script> --}}

