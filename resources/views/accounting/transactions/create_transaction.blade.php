<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Transaction') }}
        </h2>
    </x-slot>


    <!-- Add this CSS to override Select2 styling -->
    <style>
        .select2-container--default .select2-selection--single {
            background-color: #f8fafc; /* Light background */
            border-color: #d1d5db; /* Gray border */
            height: 42px; /* Match other inputs */
            padding: 0.625rem; /* Match padding */
            border-radius: 0.5rem; /* Rounded corners like Tailwind */
            font-size: 0.875rem; /* Font size */
            color: #1f2937; /* Text color */
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); /* Small shadow */
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.25rem; /* Vertical alignment of text */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 10px; /* Arrow positioning */
            right: 10px; /* Align arrow with Tailwind style */
        }

        .select2-dropdown {
            background-color: #f8fafc; /* Dropdown background */
            border-radius: 0.5rem; /* Rounded dropdown corners */
            border: 1px solid #d1d5db; /* Match border */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); /* Box shadow */
        }

        .select2-results__option {
            padding: 0.5rem 1rem; /* Option padding */
            font-size: 0.875rem; /* Font size */
            color: #1f2937; /* Option text color */
        }

        .select2-results__option--highlighted {
            background-color: #3b82f6; /* Highlighted option background */
            color: white; /* Highlighted text color */
        }
    </style>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <section>
                    <div class="max-w-7xl mx-auto py-8 px-4 lg:py-16">
                        <h2 class="mb-8 text-xl font-bold text-gray-900 dark:text-white">Add New Entry</h2>
                        <form action="{{ route('transaction.store') }}" method="POST">
                            @csrf
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full">
                                    <label for="transaction_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                                    <input type="date" name="transaction_date" id="transaction_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                    @error('transaction_date')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-full">
                                    <label for="jev" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">JEV No</label>
                                    <input type="text" name="jev" id="jev" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                                    @error('jev')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div id="transaction-fields-container" class="sm:col-span-2 space-y-4">
                                    <!-- Dynamic Fields Will Be Added Here -->
                                </div>

                                <!-- Button to Add New Transaction Row -->
                                <div class="col-span-full mt-4">
                                    <button type="button" id="addRowButton" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                                        <div class="button-wrapper flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M12 4v16m8-8H4" />
                                            </svg>
                                            <span class="ms-2">Add Transaction</span>
                                        </div>
                                    </button>
                                </div>

                                <div class="w-full">
                                    <label for="ref" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ref</label>
                                    <input type="text" name="ref" id="ref" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    @error('ref')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-full">
                                    <label for="payee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payee</label>
                                    <input type="text" name="payee" id="payee" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    @error('payee')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"></textarea>
                                    @error('description')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button Section -->
                            <div class="flex justify-end gap-4 mt-10">
                                <a href="{{ route('transaction.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-center text-white bg-secondary-600 rounded-lg hover:bg-secondary-700 focus:ring-2 focus:ring-secondary-200 dark:text-white dark:bg-secondary-800 dark:hover:bg-secondary-900 dark:focus:ring-secondary-900">
                                    Back
                                </a>
                                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-2 focus:ring-primary-200 dark:focus:ring-primary-900">
                                    Save Entry
                                </button>
                            </div>
                        </form>
                    </div>

                    <script>
                        // Pass the accounts array from PHP to JavaScript
                        const accounts = @json($accounts);
                    </script>

                    <!-- Updated Script -->
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const container = document.getElementById("transaction-fields-container");
                            const addRowButton = document.getElementById("addRowButton");
                            const form = document.querySelector('form');
                            let rowIndex = 0;

                            // Pass accounts from PHP to JavaScript
                            const accounts = @json($accounts);

                            function formatNumberWithCommas(value) {
                                value = value.replace(/[^\d.]/g, '');
                                const parts = value.split('.');
                                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                                return parts.join('.');
                            }

                            function attachAmountInputEvent(input) {
                                input.addEventListener('input', function () {
                                    const rawValue = input.value.replace(/[^\d.]/g, '');
                                    const formattedValue = formatNumberWithCommas(rawValue);
                                    const cursorPosition = input.selectionStart;
                                    const cursorAdjustment = formattedValue.length - rawValue.length;
                                    input.value = formattedValue;
                                    input.setSelectionRange(cursorPosition + cursorAdjustment, cursorPosition + cursorAdjustment);
                                });
                            }

                            function createTransactionRow() {
                                const row = document.createElement("div");
                                row.classList.add("sm:col-span-3", "grid", "grid-cols-11", "gap-5", "items-end");

                                row.innerHTML = `
                                    <div class="col-span-4">
                                        <label for="details[${rowIndex}][particulars]" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Particulars</label>
                                        <select name="details[${rowIndex}][particulars]" class="particulars-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="">Select Particulars</option>
                                            ${accounts.map(account => `<option value="${account.description}">${account.description}</option>`).join('')}
                                        </select>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="details[${rowIndex}][uacs_code]" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UACS Code</label>
                                        <input type="text" name="details[${rowIndex}][uacs_code]" class="uacs-code-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="details[${rowIndex}][mode_of_payment]" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Normal Balance</label>
                                        <select name="details[${rowIndex}][mode_of_payment]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="">Select Normal Balance</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Debit">Debit</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="details[${rowIndex}][amount]" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                                        <input type="text" name="details[${rowIndex}][amount]" class="amount-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter amount">
                                    </div>
                                    <div class="col-span-1 flex justify-center mb-3">
                                        <button type="button" class="removeRowButton text-red-600 hover:text-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M18 12H6" />
                                            </svg>
                                        </button>
                                    </div>
                                `;

                                container.appendChild(row);

                                // Attach the formatting event listener to the new amount input
                                const amountInput = row.querySelector('.amount-input');
                                attachAmountInputEvent(amountInput);

                                // Attach event listener to the remove button
                                row.querySelector(".removeRowButton").addEventListener("click", function () {
                                    row.remove();
                                });

                                // Handle particulars selection and fill UACS code
                                const particularsSelect = row.querySelector('.particulars-select');
                                const uacsCodeInput = row.querySelector('.uacs-code-input');

                                // Initialize Select2
                                $(particularsSelect).select2();

                                // Listen for Select2 'select' event
                                $(particularsSelect).on('select2:select', function () {
                                    const selectedParticular = particularsSelect.value;
                                    const account = accounts.find(account => account.description === selectedParticular);

                                    // Set the UACS code input value
                                    uacsCodeInput.value = account ? account.account_no : '';
                                });

                                rowIndex++;
                            }

                            // Attach event listener to the "Add Row" button
                            addRowButton.addEventListener("click", createTransactionRow);

                            // Before form submission, remove commas from the amount fields
                            form.addEventListener('submit', function () {
                                const amountInputs = document.querySelectorAll('.amount-input');
                                amountInputs.forEach(function (input) {
                                    input.value = input.value.replace(/,/g, ''); // Remove commas before submission
                                });
                            });
                        });
                    </script>


                </section>

            </div>
        </div>
    </div>
</x-app-layout>
