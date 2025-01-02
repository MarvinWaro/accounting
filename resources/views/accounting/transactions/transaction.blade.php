<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @foreach ($years as $year)
                    <a href="{{ route('month_transactions', ['year' => $year]) }}">
                        <div class="relative isolate flex items-center justify-center overflow-hidden bg-gray-900 py-24 sm:py-32 group">
                            <img src="{{ asset('img/acc-1.jpg') }}"
                                alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center transition-transform duration-300 group-hover:scale-105">

                            <!-- Darker gradient overlay with hover effect -->
                            <div class="absolute inset-0 -z-10 bg-gradient-to-b from-black/80 to-gray-900/95 group-hover:from-black/90 group-hover:to-gray-900 opacity-90 transition-opacity duration-300"></div>

                            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                                <h2 class="text-8xl font-bold text-transparent text-center bg-clip-text bg-gradient-to-r from-white to-gray-500 sm:text-9xl transition-transform duration-300 group-hover:scale-110">{{ $year }}</h2>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
