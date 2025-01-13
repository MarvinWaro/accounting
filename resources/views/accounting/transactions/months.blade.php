<x-app-layout>
    <x-slot name="header">

        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('accounting_dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('transaction.years') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Transaction Years</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Transaction for {{ $year }}</span>
                    </div>
                </li>
            </ol>
        </nav>
        
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-8 space-y-6">
                <h1 class="text-lg font-bold text-gray-800 dark:text-gray-200">Transactions in {{ $year }}</h1>

                <!-- Display the months and their transaction count -->
                <section class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4 p-6 w-full">
                    @foreach ($months as $month)
                        <!-- Card for each month -->
                        <div class="transform transition hover:scale-105">
                            <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                <dl class="space-y-4">
                                    <!-- Display the month name -->
                                    <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">
                                        {{ \Carbon\Carbon::createFromFormat('m', $month->month)->format('F') }}
                                    </dt>

                                    <!-- Display the transaction count -->
                                    <dd class="text-5xl font-bold text-gray-900 dark:text-white">
                                        {{ $month->transaction_count }}
                                    </dd>

                                    <div class="flex flex-col space-y-2 mt-6">
                                        <!-- GJ Recap link -->
                                        <a href="#!" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                            GJ Recap
                                        </a>

                                        <!-- Transaction List link -->
                                        <a href="{{ route('transaction.entries', ['year' => $year, 'month' => $month->month]) }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                            Transaction List
                                        </a>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    @endforeach
                </section>

            </div>
        </div>
    </div>
</x-app-layout>


