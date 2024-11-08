<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction January') }}
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
        .hidden { display: none; }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mx-5 my-5">
                    <a href="{{ url('create_transaction') }}" type="button" class="my-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 me-3">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                        </svg>
                        Add New Transaction
                    </a>

                    <div class="table-wrapper">
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
                                            Ref
                                        </span>
                                    </th>
                                    <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                        <span class="flex items-center">
                                            Payee
                                        </span>
                                    </th>
                                    <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                        <span class="flex items-center">
                                            Description
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- First entry with a single particular -->
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td rowspan="2">2021/03/21</td>
                                    <td rowspan="2">GJ 101-24-01-0001</td>
                                    <td>Cash, MDS</td>
                                    <td>123456</td>
                                    <td>Debit</td>
                                    <td>10,000.00</td>
                                    <td rowspan="2">GJ</td>
                                    <td rowspan="2">NTA-2401-002</td>
                                    <td rowspan="2">Training expenses for team</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="pl-8">Traveling Expenses-Local</td>
                                    <td>123456</td>
                                    <td>Credit</td>
                                    <td>27,566.00</td>
                                </tr>

                                <!-- Second entry with a single particular -->
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td rowspan="2">2021/04/15</td>
                                    <td rowspan="2">GJ 102-34-02-0002</td>
                                    <td>Cash, MDS</td>
                                    <td>654321</td>
                                    <td>Debit</td>
                                    <td>5,000.00</td>
                                    <td rowspan="2">GJ</td>
                                    <td rowspan="2">NTA-2401-003</td>
                                    <td rowspan="2">Office supplies for training</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="pl-8">Stationery Expenses</td>
                                    <td>654321</td>
                                    <td>Credit</td>
                                    <td>3,000.00</td>
                                </tr>

                                <!-- Third entry with a single particular -->
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td rowspan="2">2021/05/10</td>
                                    <td rowspan="2">GJ 103-45-03-0003</td>
                                    <td>Bank Transfer</td>
                                    <td>987654</td>
                                    <td>Debit</td>
                                    <td>20,000.00</td>
                                    <td rowspan="2">GJ</td>
                                    <td rowspan="2">NTA-2401-004</td>
                                    <td rowspan="2">Employee training costs</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="pl-8">Training Materials</td>
                                    <td>987654</td>
                                    <td>Credit</td>
                                    <td>15,000.00</td>
                                </tr>

                                <!-- Fourth entry with a single particular -->
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td rowspan="2">2021/06/18</td>
                                    <td rowspan="2">GJ 104-56-04-0004</td>
                                    <td>Cash, MDS</td>
                                    <td>112233</td>
                                    <td>Debit</td>
                                    <td>8,000.00</td>
                                    <td rowspan="2">GJ</td>
                                    <td rowspan="2">NTA-2401-005</td>
                                    <td rowspan="2">Conference registration</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="pl-8">Registration Fee</td>
                                    <td>112233</td>
                                    <td>Credit</td>
                                    <td>8,000.00</td>
                                </tr>

                                <!-- Fifth entry with a single particular -->
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td rowspan="2">2021/07/25</td>
                                    <td rowspan="2">GJ 105-67-05-0005</td>
                                    <td>Bank Transfer</td>
                                    <td>445566</td>
                                    <td>Debit</td>
                                    <td>12,500.00</td>
                                    <td rowspan="2">GJ</td>
                                    <td rowspan="2">NTA-2401-006</td>
                                    <td rowspan="2">Team building expenses</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false
            });
        }
    </script>

<script>
    function toggleDropdown(button) {
        const content = button.nextElementSibling;
        content.classList.toggle('hidden');
    }
</script>

</x-app-layout>
