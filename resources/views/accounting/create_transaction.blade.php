<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <section>
                    <div class="py-8 px-4 mx-8 lg:py-16">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add new entry</h2>
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
                                <div class="sm:col-span-3 grid grid-cols-11 gap-5 items-end">
                                    <!-- Particulars field taking 70% width -->
                                    <div x-data="{ open: false, selected: 'Select category' }" class="relative col-span-5">
                                        <label for="particulars" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Particulars</label>
                                        <div class="relative">
                                            <button @click="open = !open" type="button" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 flex justify-between">
                                                <span x-text="selected"></span>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" :class="{ 'rotate-180': open }">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <ul x-show="open" @click.away="open = false" class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-lg shadow-lg max-h-48 overflow-y-auto dark:bg-gray-700">
                                                <li class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <button @click="selected = 'TV/Monitors'; open = false" type="button" value="TV" class="w-full text-left">TV/Monitors</button>
                                                </li>
                                                <li class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <button @click="selected = 'PC'; open = false" type="button" value="PC" class="w-full text-left">PC</button>
                                                </li>
                                                <li class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <button @click="selected = 'Gaming/Console'; open = false" type="button" value="GA" class="w-full text-left">Gaming/Console</button>
                                                </li>
                                                <li class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <button @click="selected = 'Phones'; open = false" type="button" value="PH" class="w-full text-left">Phones</button>
                                                </li>
                                                <!-- Add more options here -->
                                                <li class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <button @click="selected = 'Other'; open = false" type="button" value="Other" class="w-full text-left">Other</button>
                                                </li>
                                                <li class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <button @click="selected = 'More'; open = false" type="button" value="More" class="w-full text-left">More</button>
                                                </li>
                                                <li class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <button @click="selected = 'Extra'; open = false" type="button" value="Extra" class="w-full text-left">Extra</button>
                                                </li>
                                                <li class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <button @click="selected = 'Another'; open = false" type="button" value="Another" class="w-full text-left">Another</button>
                                                </li>
                                                <li class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <button @click="selected = 'Final'; open = false" type="button" value="Final" class="w-full text-left">Final</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Mode field taking 30% width -->
                                    <div class="col-span-3">
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
                                    <label for="uacs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UACS Code</label>
                                    <input type="text" name="uacs" id="uacs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                </div>
                                <div class="w-full">
                                    <label for="ref" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ref</label>
                                    <input type="text" name="ref" id="ref" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                </div>



                                <div class="sm:col-span-2">
                                    <label for="payee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payee</label>
                                    <input type="text" name="payee" id="payee" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"></textarea>
                                </div>

                            </div>

                            <!-- Button section spanning across two columns -->
                            <div class="sm:col-span-2 grid grid-cols-2 gap-4 mt-10">
                                <!-- Back button -->
                                <a href="#" class="inline-flex w-full items-center justify-center px-5 py-2.5 text-sm font-medium text-center text-white bg-secondary-600 rounded-lg hover:bg-secondary-700 focus:ring-2 focus:ring-secondary-200 dark:text-white dark:bg-secondary-800 dark:hover:bg-secondary-900 dark:focus:ring-secondary-900">
                                    Back
                                </a>
                                <!-- Save button -->
                                <button type="submit" class="inline-flex w-full items-center justify-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-2 focus:ring-primary-200 dark:focus:ring-primary-900">
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
