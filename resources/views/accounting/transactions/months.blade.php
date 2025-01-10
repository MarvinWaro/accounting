<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transactions for ') }} {{ $year }}
        </h2>
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


