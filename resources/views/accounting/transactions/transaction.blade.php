<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <a href="{{ route('month_transactions') }}">
                    <div class="relative isolate flex items-center justify-center overflow-hidden bg-gray-900 py-24 sm:py-32 group">
                        <img src="{{ asset('img/acc-1.jpg') }}"
                            alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center transition-transform duration-300 group-hover:scale-105">

                        <!-- Darker gradient overlay with hover effect -->
                        <div class="absolute inset-0 -z-10 bg-gradient-to-b from-black/80 to-gray-900/95 group-hover:from-black/90 group-hover:to-gray-900 opacity-90 transition-opacity duration-300"></div>

                        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true">
                            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                        </div>

                        <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true">
                            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                        </div>

                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                            <h2 class="text-8xl font-bold text-transparent text-center bg-clip-text bg-gradient-to-r from-white to-gray-500 sm:text-9xl transition-transform duration-300 group-hover:scale-110">2024</h2>
                        </div>
                    </div>
                </a>

                <a href="">
                    <div class="relative isolate flex items-center justify-center overflow-hidden bg-gray-900 py-24 sm:py-32 group">
                        <img src="{{ asset('img/acc-2.jpg') }}"
                            alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center transition-transform duration-300 group-hover:scale-105">

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
                            <h2 class="text-8xl font-bold text-transparent text-center bg-clip-text bg-gradient-to-r from-white to-gray-500 sm:text-9xl transition-transform duration-300 group-hover:scale-110">2023</h2>
                        </div>
                    </div>
                </a>

                <a href="">
                    <div class="relative isolate flex items-center justify-center overflow-hidden bg-gray-900 py-24 sm:py-32 group">
                        <img src="{{ asset('img/acc-3.jpg') }}"
                            alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center transition-transform duration-300 group-hover:scale-105">

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
                            <h2 class="text-8xl font-bold text-transparent text-center bg-clip-text bg-gradient-to-r from-white to-gray-500 sm:text-9xl transition-transform duration-300 group-hover:scale-110">2022</h2>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </div>

</x-app-layout>


