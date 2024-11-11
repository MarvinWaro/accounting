<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>

        <br>

        <x-breadcrumbs :links="[
            'Transactions' => route('transaction'),
            'Year 2024' => route('month_transactions', 2024),
            'January' => route('transaction_list', ['year' => 2024, 'month' => 1])
        ]" />

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
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td>
                                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-eye me-2"></i>View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <hr class="w-[90%] mx-auto">
                                                <li>
                                                    <!-- Unique class for each form to handle SweetAlert -->
                                                    <form action="#!" method="POST" class="delete-form delete-form">
                                                        <!-- Button styled to behave like a link -->
                                                        <button type="submit" class="delete-button w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex items-center focus:outline-none">
                                                            <i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">2021/03/21</td>
                                    <td>MSFT</td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>Cash, MDS</li>
                                            <li>Traveling Expenses-Local</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>123-456-789</li>
                                            <li>987-654-321</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>Debit</li>
                                            <li>Credit</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>10,000.00</li>
                                            <li>27,566.00</li>
                                        </ul>
                                    </td>
                                    <td>GJ</td>
                                    <td>NTA-2401-002</td>
                                    <td>Training expenses for team</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td>
                                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-eye me-2"></i>View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <hr class="w-[90%] mx-auto">
                                                <li>
                                                    <!-- Unique class for each form to handle SweetAlert -->
                                                    <form action="#!" method="POST" class="delete-form delete-form">
                                                        <!-- Button styled to behave like a link -->
                                                        <button type="submit" class="delete-button w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex items-center focus:outline-none">
                                                            <i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">2021/05/15</td>
                                    <td>TSLA</td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>Consulting Fees</li>
                                            <li>Legal Services</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>321-654-987</li>
                                            <li>987-123-456</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>Debit</li>
                                            <li>Credit</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>50,000.00</li>
                                            <li>75,000.00</li>
                                        </ul>
                                    </td>
                                    <td>PV</td>
                                    <td>NTA-2401-008</td>
                                    <td>Payment for consulting and legal services</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td>
                                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-eye me-2"></i>View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <hr class="w-[90%] mx-auto">
                                                <li>
                                                    <!-- Unique class for each form to handle SweetAlert -->
                                                    <form action="#!" method="POST" class="delete-form delete-form">
                                                        <!-- Button styled to behave like a link -->
                                                        <button type="submit" class="delete-button w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex items-center focus:outline-none">
                                                            <i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">2021/04/10</td>
                                    <td>APPL</td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>Office Supplies</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>123-987-654</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>Credit</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>15,000.00</li>
                                        </ul>
                                    </td>
                                    <td>JV</td>
                                    <td>INV-1001</td>
                                    <td>Purchase of office supplies</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td>
                                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-eye me-2"></i>View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <hr class="w-[90%] mx-auto">
                                                <li>
                                                    <!-- Unique class for each form to handle SweetAlert -->
                                                    <form action="#!" method="POST" class="delete-form delete-form">
                                                        <!-- Button styled to behave like a link -->
                                                        <button type="submit" class="delete-button w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex items-center focus:outline-none">
                                                            <i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">2021/06/05</td>
                                    <td>AMZN</td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>Shipping Costs</li>
                                            <li>Marketing</li>
                                            <li>Office Rent</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>234-567-890</li>
                                            <li>123-456-789</li>
                                            <li>098-765-432</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>Credit</li>
                                            <li>Debit</li>
                                            <li>Debit</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>5,000.00</li>
                                            <li>10,000.00</li>
                                            <li>20,000.00</li>
                                        </ul>
                                    </td>
                                    <td>GJ</td>
                                    <td>INV-3003</td>
                                    <td>Expenses for monthly operations</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td>
                                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">Action
                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-eye me-2"></i>View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#!" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <hr class="w-[90%] mx-auto">
                                                <li>
                                                    <!-- Unique class for each form to handle SweetAlert -->
                                                    <form action="#!" method="POST" class="delete-form delete-form">
                                                        <!-- Button styled to behave like a link -->
                                                        <button type="submit" class="delete-button w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex items-center focus:outline-none">
                                                            <i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">2021/08/10</td>
                                    <td>FB</td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>Maintenance</li>
                                            <li>Hosting Services</li>
                                            <li>Employee Benefits</li>
                                            <li>Office Supplies</li>
                                            <li>Rent</li>
                                            <li>Insurance</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>101-202-303</li>
                                            <li>303-404-505</li>
                                            <li>202-303-404</li>
                                            <li>606-707-808</li>
                                            <li>404-505-606</li>
                                            <li>707-808-909</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>Credit</li>
                                            <li>Debit</li>
                                            <li>Credit</li>
                                            <li>Debit</li>
                                            <li>Credit</li>
                                            <li>Debit</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-disc list-inside">
                                            <li>12,000.00</li>
                                            <li>10,000.00</li>
                                            <li>18,000.00</li>
                                            <li>8,000.00</li>
                                            <li>25,000.00</li>
                                            <li>5,500.00</li>
                                        </ul>
                                    </td>
                                    <td>PV</td>
                                    <td>INV-5505</td>
                                    <td>Monthly expenses and overhead</td>
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


        function toggleDropdown(button) {
            const content = button.nextElementSibling;
            content.classList.toggle('hidden');
        }
    </script>

</x-app-layout>
