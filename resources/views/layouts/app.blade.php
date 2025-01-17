@include('partials._header')

        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class=" mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        {{-- flowbite --}}

        {{-- JS LINK SCRIPT TO PUCLIC --}}
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <!-- Include SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Tailwind and Flowbite JS (put this in your layout file) -->
        <script src="https://unpkg.com/flowbite@1.6.4/dist/flowbite.min.js"></script>


@include('partials._footer')

