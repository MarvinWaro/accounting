<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('General Journal Recap') }}
        </h2>

        <br>

        <x-breadcrumbs :links="[
            'Transactions' => route('transaction'),
            'Year 2024' => route('month_transactions', 2024),
            'January' => route('transaction_list', ['year' => 2024, 'month' => 1]),
            'GJ Recap' => '#'
        ]" />

    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

            <!-- Invoice -->
            <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-6 sm:my-12">
                <!-- Header Section -->
                <div class="flex justify-between items-center mb-8 pb-6 border-b border-gray-200 dark:border-neutral-700">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-neutral-200">Invoice</h2>
                    <div class="inline-flex gap-x-3">
                        <!-- Invoice PDF Button -->
                        <a class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-md hover:bg-gray-50 focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:ring-neutral-600" href="#">
                            <svg class="shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                            Invoice PDF
                        </a>
                        <!-- Print Button -->
                        <a class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="#">
                            <svg class="shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
                            Print
                        </a>
                    </div>
                </div>

                <!-- Heading Section -->
                <div class="text-center mb-8 space-y-1">
                    <p class="text-lg font-semibold text-gray-700 dark:text-neutral-300">GENERAL JOURNAL</p>
                    <p class="text-gray-600 dark:text-neutral-400">COMMISSION ON HIGHER EDUCATION</p>
                    <p class="text-gray-600 dark:text-neutral-400">FUND 101</p>
                </div>

                <!-- Table Section -->
                <div class="bg-white dark:bg-neutral-900 border border-gray-200 dark:border-neutral-700 p-6 rounded-lg shadow-sm space-y-4">
                    <div class="hidden sm:grid sm:grid-cols-5 pb-3 border-b border-gray-200 dark:border-neutral-700">
                        <div class="col-span-2 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Particulars</div>
                        <div class="text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Code</div>
                        <div class="text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Debit</div>
                        <div class="text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500">Credit</div>
                    </div>

                    <!-- Table Rows -->
                    <div class="space-y-4">
                        <div class="grid grid-cols-3 sm:grid-cols-5 gap-4">
                            <div class="col-span-3 sm:col-span-2">
                                <p class="font-medium text-gray-800 dark:text-neutral-200">Office Supplies Expenses</p>
                            </div>
                            <div class="text-gray-800 dark:text-neutral-200">1-03-03-010-00</div>
                            <div class="text-gray-800 dark:text-neutral-200">295</div>
                            <div class="text-end text-gray-800 dark:text-neutral-200">2000</div>
                        </div>
                        <div class="grid grid-cols-3 sm:grid-cols-5 gap-4">
                            <div class="col-span-3 sm:col-span-2">
                                <p class="font-medium text-gray-800 dark:text-neutral-200">Repairs and Maintenance - Buildings and Other Structures</p>
                            </div>
                            <div class="text-gray-800 dark:text-neutral-200">1-53-73-010-00</div>
                            <div class="text-gray-800 dark:text-neutral-200">893</div>
                            <div class="text-end text-gray-800 dark:text-neutral-200">7,202.00</div>
                        </div>
                        <div class="grid grid-cols-3 sm:grid-cols-5 gap-4">
                            <div class="col-span-3 sm:col-span-2">
                                <p class="font-medium text-gray-800 dark:text-neutral-200">Due from National Government Agencies</p>
                            </div>
                            <div class="text-gray-800 dark:text-neutral-200">2-03-03-010-99</div>
                            <div class="text-gray-800 dark:text-neutral-200">23,000.00</div>
                            <div class="text-end text-gray-800 dark:text-neutral-200">3,000,213</div>
                        </div>
                    </div>
                </div>

                <!-- Totals Section -->
                <div class="mt-8 flex justify-between items-center">
                    <!-- Accountant Section -->
                    <div class="text-left">
                        <p class="font-semibold text-gray-800 dark:text-neutral-200">Philip John G. Pelingon</p>
                        <p class="text-gray-500 dark:text-neutral-400 underline">Accountant II</p>
                    </div>

                    <!-- Totals Section -->
                    <div class="w-full max-w-lg text-end space-y-2">
                        <dl class="grid grid-cols-2 text-sm gap-2">
                            <dt class="text-gray-500 dark:text-neutral-500">Total Debit:</dt>
                            <dd class="font-medium text-gray-800 dark:text-neutral-200">$2750.00</dd>
                        </dl>
                        <dl class="grid grid-cols-2 text-sm gap-2">
                            <dt class="text-gray-500 dark:text-neutral-500">Total Credit:</dt>
                            <dd class="font-medium text-gray-800 dark:text-neutral-200">$2750.00</dd>
                        </dl>
                    </div>
                </div>

            </div>
            <!-- End Invoice -->

            </div>
        </div>
    </div>
</x-app-layout>
