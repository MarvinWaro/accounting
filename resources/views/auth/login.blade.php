<x-guest-layout>

    <x-authentication-card>

        <!-- Dark Mode Toggle Switch -->
        <label class="me-4 relative inline-flex items-center cursor-pointer mb-5">
            <input type="checkbox" id="theme-toggle" class="sr-only peer" />
            <!-- Toggle Switch Background -->
            <div class="w-14 h-8 bg-gray-200 dark:bg-gray-700 rounded-full peer-focus:outline-none peer-checked:bg-yellow-500 peer-checked:dark:bg-gray-600 transition-colors duration-300 ease-in-out flex items-center justify-between px-1">
                <!-- Sun Icon (Light Mode) -->
                <span class="w-6 h-6 text-yellow-400 flex items-center justify-center">
                    <i class="fa-solid fa-sun"></i>
                </span>
                <!-- Moon Icon (Dark Mode) -->
                <span class="w-6 h-6 text-gray-400 flex items-center justify-center">
                    <i class="fa-solid fa-moon"></i>
                </span>
            </div>
            <!-- Toggle Switch Button -->
            <span class="absolute left-1 w-6 h-6 bg-white rounded-full peer-checked:translate-x-6 transition-transform duration-300 ease-in-out"></span>
        </label>

        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>


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

</x-guest-layout>
