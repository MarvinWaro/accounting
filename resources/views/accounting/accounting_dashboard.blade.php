<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('accounting_dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
            </ol>
        </nav>
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
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mx-5 my-5">
                    <a href="{{ route('transaction.create') }}" type="button" class="my-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                                        <span class="flex items-center">
                                            Action
                                        </span>
                                    </th>
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
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td>
                                        <button id="dropdownButton_{{ $transaction->id }}" data-dropdown-toggle="dropdown_{{ $transaction->id }}" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">
                                            Action
                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>

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
                                                <hr class="w-[90%] mx-auto">
                                                <li>
                                                    <form action="{{ route('transaction.destroy', $transaction->id) }}" method="POST" class="delete-form" id="delete-form-transaction-{{$transaction->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button id="destroy-btn-transaction-{{$transaction->id}}" type="button" class="delete-button w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex items-center focus:outline-none">
                                                            <i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span>
                                                        </button>
                                                    </form>
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            // Attach click event to all delete buttons
                                                            document.querySelectorAll('.delete-button').forEach(function(button) {
                                                                button.addEventListener('click', function(e) {
                                                                    e.preventDefault(); // Prevent default action

                                                                    // Get the transaction ID from the button's ID
                                                                    const transactionId = this.id.split('destroy-btn-transaction-')[1];

                                                                    Swal.fire({
                                                                        title: "Are you sure?",
                                                                        text: `You are about to delete transaction with ID: ${transactionId}`,  // Show the transaction ID
                                                                        icon: "warning",
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: "#3085d6",
                                                                        cancelButtonColor: "#d33",
                                                                        confirmButtonText: "Yes, delete it!"
                                                                    }).then((result) => {
                                                                        if (result.isConfirmed) {
                                                                            // Submit the form corresponding to the clicked button
                                                                            document.getElementById(`delete-form-transaction-${transactionId}`).submit();
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                        });
                                                    </script>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>


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

{{-- <script>

    const options = {
    chart: {
        height: "100%",
        maxWidth: "100%",
        type: "area",
        fontFamily: "Inter, sans-serif",
        dropShadow: {
        enabled: false,
        },
        toolbar: {
        show: false,
        },
    },
    tooltip: {
        enabled: true,
        x: {
        show: false,
        },
    },
    fill: {
        type: "gradient",
        gradient: {
        opacityFrom: 0.55,
        opacityTo: 0,
        shade: "#1C64F2",
        gradientToColors: ["#1C64F2"],
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        width: 6,
    },
    grid: {
        show: false,
        strokeDashArray: 4,
        padding: {
        left: 2,
        right: 2,
        top: 0
        },
    },
    series: [
        {
        name: "New users",
        data: [6500, 6418, 6456, 6526, 6356, 6456],
        color: "#1A56DB",
        },
    ],
    xaxis: {
        categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
        labels: {
        show: false,
        },
        axisBorder: {
        show: false,
        },
        axisTicks: {
        show: false,
        },
    },
    yaxis: {
        show: false,
    },
    }

    if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("area-chart"), options);
    chart.render();
    }

</script> --}}


