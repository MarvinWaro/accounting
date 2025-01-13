<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('accounting_dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="#!" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Transaction Years</a>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-8 space-y-6">
                <h1 class="text-lg font-bold text-gray-800 dark:text-gray-200">Available Years</h1>

                <!-- Display the years -->
                <ul class="space-y-4">
                    @foreach ($years as $year)
                        <li>

                            {{-- <a href="{{ route('transaction.months', ['year' => $year]) }}"
                                class="text-gray-900 dark:text-gray-100 hover:text-blue-700 dark:hover:text-blue-300">
                                {{ $year }}
                            </a> --}}

                            <a href="{{ route('transaction.months', ['year' => $year]) }}" class="text-gray-900 dark:text-gray-100 hover:text-blue-700 dark:hover:text-blue-300">
                                <div class="relative isolate flex items-center justify-center overflow-hidden bg-gray-900 py-24 sm:py-32 group">
                                    {{-- <img src="{{ asset('img/acc-3.jpg') }}"
                                        alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center transition-transform duration-300 group-hover:scale-105"> --}}

                                    <!-- Dark gradient overlay with hover effect -->
                                    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-black/70 to-gray-900/90 group-hover:from-black/90 group-hover:to-gray-900 opacity-90 transition-opacity duration-300"></div>

                                    <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true">
                                        <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                                            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                                    </div>

                                    <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true">
                                        <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                                            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                                    </div>

                                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                                        <h2 class="text-8xl font-bold text-transparent text-center bg-clip-text bg-gradient-to-r from-white to-gray-500 sm:text-9xl transition-transform duration-300 group-hover:scale-110">{{ $year }}</h2>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>


            </div>
        </div>
    </div>
</x-app-layout>



