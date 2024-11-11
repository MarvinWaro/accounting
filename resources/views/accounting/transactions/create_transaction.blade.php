<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Transaction') }}
        </h2>

        <br>

        <x-breadcrumbs :links="[
            'Transactions' => route('transaction'),
            'Year 2024' => route('month_transactions', 2024),
            'January' => route('transaction_list', ['year' => 2024, 'month' => 1]),
            'Add Transaction' => '#'
        ]" />

    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <section>
                    <div class="max-w-7xl mx-auto py-8 px-4 lg:py-16">
                        <h2 class="mb-8 text-xl font-bold text-gray-900 dark:text-white">Add new entry</h2>
                        <form action="#">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full">
                                    <label for="transaction_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                    <input type="date" name="transaction_date" id="transaction_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                </div>

                                <div class="w-full">
                                    <label for="jev" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">JEV No</label>
                                    <input type="text" name="jev" id="jev" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                </div>

                                <!-- Particulars and Mode with 70% and 30% width, plus an Add button -->
                                <div class="sm:col-span-3 grid grid-cols-11 gap-5 items-end particulars-container">
                                    <!-- Particulars field taking 70% width -->
                                    {{-- For entries transactions --}}
                                    <div class="sm:col-span-4">
                                        <label for="particulars" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Particulars</label>
                                        <select id="particulars" name="particulars" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="">Select category</option>
                                            <option value="TV">Subsidy from National Government</option>
                                            <option value="PC">Fund transfer for the operational and manpower complement of the LGSO regional coordination team for the period of January to December 2024</option>
                                            <option value="GA">Advances to Officers and Employers</option>
                                            <option value="PH">Other Payables</option>
                                        </select>
                                    </div>

                                    <div class="col-span-2">
                                        <label for="uacs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UACS Code</label>
                                        <input type="text" name="uacs" id="uacs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" disabled required>
                                    </div>


                                    <!-- Mode field taking 30% width -->
                                    <div class="col-span-2">
                                        <label for="mode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mode</label>
                                        <select id="mode" name="mode[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected="">Mode of Payment</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Debit">Debit</option>
                                        </select>
                                    </div>

                                    <div class="col-span-2">
                                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                                        <input type="amount" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                    </div>

                                    <!-- Plus button for adding more rows -->
                                    <div class="col-span-1 flex justify-center pb-2">
                                        <button type="button" id="addRowButton" class=" text-primary-700 hover:text-primary-800 dark:text-primary-400 dark:hover:text-primary-500">
                                            <!-- Plus icon (using Heroicons or Font Awesome) -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <label for="ref" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ref</label>
                                    <input type="text" name="ref" id="ref" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                </div>

                                <div class="w-full">
                                    <label for="payee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payee</label>
                                    <input type="text" name="payee" id="payee" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"></textarea>
                                </div>

                            </div>

                            <!-- Button section aligned to the lower right -->
                            <div class="flex justify-end gap-4 mt-10 me-5">
                                <!-- Back button -->
                                <a href="{{ route('transaction_list') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-center text-white bg-secondary-600 rounded-lg hover:bg-secondary-700 focus:ring-2 focus:ring-secondary-200 dark:text-white dark:bg-secondary-800 dark:hover:bg-secondary-900 dark:focus:ring-secondary-900">
                                    Back
                                </a>
                                <!-- Save button -->
                                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-2 focus:ring-primary-200 dark:focus:ring-primary-900">
                                    Save Entry
                                </button>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>


