<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <style>
        /* Custom styles for the table header */
        #search-table thead th {
            padding: 20px 24px; /* Adjust these values for top/bottom and left/right padding */
        }
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
                                            Company Name
                                        </span>
                                    </th>
                                    <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                        <span class="flex items-center">
                                            Ticker
                                        </span>
                                    </th>
                                    <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                        <span class="flex items-center">
                                            Stock Price
                                        </span>
                                    </th>
                                    <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                        <span class="flex items-center">
                                            Market Capitalization
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Apple Inc.</td>
                                    <td>AAPL</td>
                                    <td>$192.58</td>
                                    <td>$3.04T</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Microsoft Corporation</td>
                                    <td>MSFT</td>
                                    <td>$340.54</td>
                                    <td>$2.56T</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Alphabet Inc.</td>
                                    <td>GOOGL</td>
                                    <td>$134.12</td>
                                    <td>$1.72T</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Apple Inc.</td>
                                    <td>AAPL</td>
                                    <td>$192.58</td>
                                    <td>$3.04T</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Microsoft Corporation</td>
                                    <td>MSFT</td>
                                    <td>$340.54</td>
                                    <td>$2.56T</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Alphabet Inc.</td>
                                    <td>GOOGL</td>
                                    <td>$134.12</td>
                                    <td>$1.72T</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Apple Inc.</td>
                                    <td>AAPL</td>
                                    <td>$192.58</td>
                                    <td>$3.04T</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Microsoft Corporation</td>
                                    <td>MSFT</td>
                                    <td>$340.54</td>
                                    <td>$2.56T</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Alphabet Inc.</td>
                                    <td>GOOGL</td>
                                    <td>$134.12</td>
                                    <td>$1.72T</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Apple Inc.</td>
                                    <td>AAPL</td>
                                    <td>$192.58</td>
                                    <td>$3.04T</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Microsoft Corporation</td>
                                    <td>MSFT</td>
                                    <td>$340.54</td>
                                    <td>$2.56T</td>
                                </tr>
                                <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">Alphabet Inc.</td>
                                    <td>GOOGL</td>
                                    <td>$134.12</td>
                                    <td>$1.72T</td>
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

</x-app-layout>
