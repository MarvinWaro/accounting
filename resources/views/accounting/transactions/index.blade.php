<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transactions for ') }} {{ $month }} / {{ $year }}
        </h2>
    </x-slot>

    <style>
        /* Custom styles for the table header */
        #search-table thead th {
            padding: 20px 24px; /* Adjust these values for top/bottom and left/right padding */
        }

        .dropdown-content {
        display: none;
        position: absolute;
        background-color: white;
        padding: 5px;
        border: 1px solid gray;
        border-radius: 5px;
        z-index: 1;
        }

    </style>


    @if (session('success') && !session('deletion'))
        <script>
            $(document).ready(function () {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: '{{ session('success') }}',
                    showConfirmButton: true, // Show the OK button
                    confirmButtonText: "OK" // Customize the button text
                });
            });
        </script>
    @endif

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-8 space-y-6">
                <h1 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                    Transactions for {{ \Carbon\Carbon::createFromFormat('m', $month)->format('F') }} {{ $year }}
                </h1>

                <a href="#!" type="button" class="my-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 me-3">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                    </svg>
                    Add New Transaction
                </a>

                <div class="table-wrapper overflow-x-auto">
                    <table id="search-table">
                        <thead>
                            <tr>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">Action</span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">Date</span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">JEV No.</span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">Particulars</span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">UACS Code</span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">Mode of Payment</span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">Amount</span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">Payee</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>
                                        <button id="dropdownButton_{{ $transaction->id }}" data-dropdown-toggle="dropdown_{{ $transaction->id }}" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">
                                            Action
                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdown_{{ $transaction->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton_{{ $transaction->id }}">
                                                <li>
                                                    <a href="{{ route('transaction.show', $transaction->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-eye me-2"></i>View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('transaction.edit', $transaction->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('transaction.destroy', $transaction->id) }}" id="delete-form-transaction-{{$transaction->id}}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" id="destroy-btn-transaction-{{$transaction->id}}" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <i class="fa-solid fa-trash me-2"></i>Delete
                                                        </button>
                                                    </form>
                                                </li>
                                                <script>
                                                    $('#destroy-btn-transaction-{{$transaction->id}}').on('click', function(e){
                                                        e.preventDefault(); // Prevent the default form submission behavior
                                                        Swal.fire({
                                                            title: "Are you sure?",
                                                            text: "You won't be able to revert this!",
                                                            icon: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#3085d6",
                                                            cancelButtonColor: "#d33",
                                                            confirmButtonText: "Yes, delete it!"
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                // Submit the form if confirmed
                                                                $('#delete-form-transaction-{{$transaction->id}}').submit();
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $transaction->transaction_date }}
                                    </td>
                                    <td class="text-gray-900 dark:text-gray-100">{{ $transaction->jev_no }}</td>
                                    <td class="text-gray-900 dark:text-gray-100">
                                        <ul class="list-disc list-inside">
                                            @foreach($transaction->details as $detail)
                                                <li class="particulars" data-fulltext="{{ $detail->particulars }}">
                                                    {{ Str::limit($detail->particulars, 40) }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-gray-900 dark:text-gray-100">
                                        <ul class="list-disc list-inside">
                                            @foreach($transaction->details as $detail)
                                                <li>
                                                    {{ substr($detail->uacs_code, 0, 1) . '-' . substr($detail->uacs_code, 1, 2) . '-' . substr($detail->uacs_code, 3, 2) . '-' . substr($detail->uacs_code, 5, 3) . '-' . substr($detail->uacs_code, 8, 2) }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-gray-900 dark:text-gray-100">
                                        <ul class="list-disc list-inside">
                                            @foreach($transaction->details as $detail)
                                                <li>{{ $detail->mode_of_payment }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-gray-900 dark:text-gray-100">
                                        <ul class="list-disc list-inside">
                                            @foreach($transaction->details as $detail)
                                                <li>{{ number_format($detail->amount, 2) }}</li> <!-- Format the amount with 2 decimal places -->
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="text-gray-900 dark:text-gray-100">{{ $transaction->payee }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var table = $('#search-table').DataTable({
                searchable: true,
                sortable: false
            });

            // Custom search function
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                // Get the search term from the search input
                var searchTerm = table.search().toLowerCase();

                // Get the full text from data-fulltext attributes for "particulars" and "remarks"
                var particulars = $('td .particulars', table.row(dataIndex).node()).data('fulltext').toLowerCase();
                var remarks = $('td .remarks', table.row(dataIndex).node()).data('fulltext').toLowerCase();

                // Check if the search term exists in either the fulltext attributes
                if (particulars.indexOf(searchTerm) !== -1 || remarks.indexOf(searchTerm) !== -1) {
                    return true; // Show the row
                }

                return false; // Otherwise, hide the row
            });

            // Trigger a redraw when the search is performed
            $('#search-table_filter input').on('keyup', function() {
                table.draw();
            });
        });
    </script>

    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false
            });
        }


        function toggleDropdown(button) {
            const content = button.nextElementSibling;
            content.classList.toggle('hidden');
        }
    </script>

</x-app-layout>
