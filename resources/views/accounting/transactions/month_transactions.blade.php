<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Transaction') }}
        </h2>

        <br>

        <x-breadcrumbs :links="[
            'Transactions' => route('transaction'),
            'Year 2024' => route('month_transactions', 2024)
        ]" />



    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl overflow-hidden">
                <div class="mx-6 my-6">
                    <h2 class="mb-4 ms-7 text-xl font-semibold text-gray-700 dark:text-white">Months</h2>
                    <div class="flex justify-center">
                        <section class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4 p-6 w-full">

                            <!-- Card for January -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">January</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">32</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Card for February -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">February</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">28</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Card for March -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">March</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">31</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Card for April -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">April</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">30</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Card for May -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">May</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">31</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Card for June -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">June</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">30</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Card for July -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">July</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">31</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Card for August -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">August</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">31</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Card for September -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">September</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">30</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Card for October -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">October</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">31</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Card for November -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">November</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">30</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Card for December -->
                            <div class="transform transition hover:scale-105">
                                <div class="p-8 bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-lg rounded-xl transition duration-300 ease-in-out hover:bg-blue-50 dark:hover:bg-gray-800">
                                    <dl class="space-y-4">
                                        <dt class="text-lg font-medium text-gray-600 dark:text-gray-400">December</dt>
                                        <dd class="text-5xl font-bold text-gray-900 dark:text-white">31</dd>
                                        <div class="flex flex-col space-y-2 mt-6">
                                            <a href="{{ route('gj_recap') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                GJ Recap
                                            </a>
                                            <a href="{{ route('transaction_list') }}" class="text-blue-600 bg-blue-100 hover:bg-blue-200 focus:ring-2 focus:outline-none focus:ring-blue-400 dark:bg-blue-700 dark:text-white dark:hover:bg-blue-600 font-semibold rounded-lg text-sm px-5 py-2 w-full text-center">
                                                Transaction List
                                            </a>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



{{-- <a href="#!">
    <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
        <dl class="space-y-2">
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Febuary</dt>
            <dd class="text-5xl font-light md:text-6xl dark:text-white">192</dd>
            <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                <span>View Records</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M1.5 12s4.5-7.5 10.5-7.5 10.5 7.5 10.5 7.5-4.5 7.5-10.5 7.5S1.5 12 1.5 12z"></path>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                </svg>
            </dd>
        </dl>
    </div>
</a>

<a href="#!">
    <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
        <dl class="space-y-2">
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">March</dt>
            <dd class="text-5xl font-light md:text-6xl dark:text-white">192</dd>
            <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                <span>View Records</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M1.5 12s4.5-7.5 10.5-7.5 10.5 7.5 10.5 7.5-4.5 7.5-10.5 7.5S1.5 12 1.5 12z"></path>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                </svg>
            </dd>
        </dl>
    </div>
</a>

<a href="#!">
    <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
        <dl class="space-y-2">
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">April</dt>
            <dd class="text-5xl font-light md:text-6xl dark:text-white">192</dd>
            <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                <span>View Records</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M1.5 12s4.5-7.5 10.5-7.5 10.5 7.5 10.5 7.5-4.5 7.5-10.5 7.5S1.5 12 1.5 12z"></path>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                </svg>
            </dd>
        </dl>
    </div>
</a>

<a href="#!">
    <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
        <dl class="space-y-2">
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">May</dt>
            <dd class="text-5xl font-light md:text-6xl dark:text-white">192</dd>
            <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                <span>View Records</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M1.5 12s4.5-7.5 10.5-7.5 10.5 7.5 10.5 7.5-4.5 7.5-10.5 7.5S1.5 12 1.5 12z"></path>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                </svg>
            </dd>
        </dl>
    </div>
</a>

<a href="#!">
    <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
        <dl class="space-y-2">
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">June</dt>
            <dd class="text-5xl font-light md:text-6xl dark:text-white">192</dd>
            <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                <span>View Records</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M1.5 12s4.5-7.5 10.5-7.5 10.5 7.5 10.5 7.5-4.5 7.5-10.5 7.5S1.5 12 1.5 12z"></path>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                </svg>
            </dd>
        </dl>
    </div>
</a>

<a href="#!">
    <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
        <dl class="space-y-2">
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">July</dt>
            <dd class="text-5xl font-light md:text-6xl dark:text-white">192</dd>
            <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                <span>View Records</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M1.5 12s4.5-7.5 10.5-7.5 10.5 7.5 10.5 7.5-4.5 7.5-10.5 7.5S1.5 12 1.5 12z"></path>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                </svg>
            </dd>
        </dl>
    </div>
</a>

<a href="#!">
    <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
        <dl class="space-y-2">
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">August</dt>
            <dd class="text-5xl font-light md:text-6xl dark:text-white">192</dd>
            <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                <span>View Records</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M1.5 12s4.5-7.5 10.5-7.5 10.5 7.5 10.5 7.5-4.5 7.5-10.5 7.5S1.5 12 1.5 12z"></path>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                </svg>
            </dd>
        </dl>
    </div>
</a>

<a href="#!">
    <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
        <dl class="space-y-2">
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">September</dt>
            <dd class="text-5xl font-light md:text-6xl dark:text-white">192</dd>
            <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                <span>View Records</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M1.5 12s4.5-7.5 10.5-7.5 10.5 7.5 10.5 7.5-4.5 7.5-10.5 7.5S1.5 12 1.5 12z"></path>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                </svg>
            </dd>
        </dl>
    </div>
</a>

<a href="#!">
    <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
        <dl class="space-y-2">
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">October</dt>
            <dd class="text-5xl font-light md:text-6xl dark:text-white">192</dd>
            <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                <span>View Records</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M1.5 12s4.5-7.5 10.5-7.5 10.5 7.5 10.5 7.5-4.5 7.5-10.5 7.5S1.5 12 1.5 12z"></path>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                </svg>
            </dd>
        </dl>
    </div>
</a>

<a href="#!">
    <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
        <dl class="space-y-2">
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">November</dt>
            <dd class="text-5xl font-light md:text-6xl dark:text-white">192</dd>
            <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                <span>View Records</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M1.5 12s4.5-7.5 10.5-7.5 10.5 7.5 10.5 7.5-4.5 7.5-10.5 7.5S1.5 12 1.5 12z"></path>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                </svg>
            </dd>
        </dl>
    </div>
</a>

<a href="#!">
    <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
        <dl class="space-y-2">
            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">December</dt>
            <dd class="text-5xl font-light md:text-6xl dark:text-white">192</dd>
            <dd class="flex items-center space-x-1 text-sm font-medium text-green-500 dark:text-green-400">
                <span>View Records</span>
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M1.5 12s4.5-7.5 10.5-7.5 10.5 7.5 10.5 7.5-4.5 7.5-10.5 7.5S1.5 12 1.5 12z"></path>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                </svg>
            </dd>
        </dl>
    </div>
</a> --}}

