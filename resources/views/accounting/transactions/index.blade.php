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

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-8 space-y-6">
                <h1 class="text-lg font-bold">Transactions for {{ \Carbon\Carbon::createFromFormat('m', $month)->format('F') }} {{ $year }}</h1>

                <div class="table-wrapper overflow-x-auto">
                    <table id="search-table">
                        <thead>
                            <tr>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">
                                        Date
                                    </span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">
                                        JEV No.
                                    </span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">
                                        Particulars
                                    </span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">
                                        UACS Code
                                    </span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">
                                        Mode of Payment
                                    </span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">
                                        Amount
                                    </span>
                                </th>
                                <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                    <span class="flex items-center">
                                        Payee
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $transaction->transaction_date }}</td>
                                    <td>{{ $transaction->jev_no }}</td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            @foreach($transaction->details as $detail)
                                                <li class="particulars" data-fulltext="{{ $detail->particulars }}">
                                                    {{ Str::limit($detail->particulars, 40) }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            @foreach($transaction->details as $detail)
                                                <li>{{ substr($detail->uacs_code, 0, 1) . '-' . substr($detail->uacs_code, 1, 2) . '-' . substr($detail->uacs_code, 3, 2) . '-' . substr($detail->uacs_code, 5, 3) . '-' . substr($detail->uacs_code, 8, 2) }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            @foreach($transaction->details as $detail)
                                                <li>{{ $detail->mode_of_payment }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            @foreach($transaction->details as $detail)
                                                <li>{{ number_format($detail->amount, 2) }}</li> <!-- Format the amount with 2 decimal places -->
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $transaction->payee }}</td>
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
