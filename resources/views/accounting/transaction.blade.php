<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mx-5 my-5">
                    <h2 class="mb-2 text-[30px] font-bold text-gray-900 dark:text-white ms-8">Months</h2>
                    <div class="dark:bg-gray-800 flex justify-center items-center">
                        <section class="grid gap-6 md:grid-cols-4 p-4 md:p-8 max-w-9xl mx-auto w-full ">

                            <a href="{{ route('transaction_list') }}">
                                <div class="p-6 bg-white shadow-xl hover:shadow-2xl hover:scale-105 transform transition rounded-2xl dark:bg-gray-900">
                                    <dl class="space-y-2">
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">January</dt>
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
                            </a>

                        </section>
                    </div>
                </div>
        </div>
    </div>
</x-app-layout>
