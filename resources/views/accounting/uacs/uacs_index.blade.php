<x-app-layout>
    <x-slot name="header">

        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('accounting_dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">UACS</a>
                    </div>
                </li>
                {{-- <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Flowbite</span>
                    </div>
                </li> --}}
            </ol>
        </nav>

    </x-slot>

    @if (session('success'))
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
                    <a href="{{ route('uacs_create') }}" type="button" class="my-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 me-3">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                        </svg>
                        Add new account
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
                                            ID
                                        </span>
                                    </th>
                                    <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                        <span class="flex items-center">
                                            Account No.
                                        </span>
                                    </th>
                                    <th class="bg-gray-500 text-gray-100 dark:bg-gray-900 dark:text-gray-100 px-10 py-4">
                                        <span class="flex items-center">
                                            Account Description
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $account)
                                    <tr class="hover:bg-gray-200 dark:hover:bg-gray-700">
                                        <td>
                                            <button
                                                id="dropdownDefaultButton"
                                                data-dropdown-toggle="dropdown{{$account->id}}"
                                                class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800"
                                                type="button">
                                                Action
                                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                                </svg>
                                            </button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdown{{$account->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                                    <li>
                                                        <a href="{{ route('uacs_edit', $account->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                                        </a>
                                                    </li>
                                                    <hr class="w-[90%] mx-auto">
                                                    <li>
                                                        <!-- Delete Form -->
                                                        <form action="{{ route('uacs_destroy', $account->id) }}" method="POST" class="delete-form" id="delete-form-uacs-{{$account->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button id="destroy-btn-{{$account->id}}" type="button" class="delete-button w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex items-center focus:outline-none">
                                                                <i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span>
                                                            </button>
                                                        </form>

                                                        <script>
                                                            // Use a unique ID for the button click handler
                                                            $('#destroy-btn-{{$account->id}}').on('click', function(e){
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
                                                                        // Submit the correct form if confirmed
                                                                        $('#delete-form-uacs-{{$account->id}}').submit();  // Correct form ID
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $account->id }}</td>

                                        <!-- Formatted account number -->
                                        <td>{{ substr($account->account_no, 0, 1) }}-{{ substr($account->account_no, 1, 2) }}-{{ substr($account->account_no, 3, 2) }}-{{ substr($account->account_no, 5, 3) }}-{{ substr($account->account_no, 8, 2) }}</td>
                                        {{-- <td>{{ \Illuminate\Support\Str::limit($account->description, 100, '...') }}</td> --}}
                                        <td>{{ $account->description }}</td>
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
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false
            });

            // Override the default search method
            dataTable.on('datatable.search', function(query) {
                const normalizedQuery = query.replace(/-/g, ''); // Remove dashes from search input

                // Iterate over each row to normalize account_no (remove dashes)
                dataTable.rows().forEach(function(row, index) {
                    let accountNoCell = row.cells[2].textContent; // Assuming account_no is in the third column (index 2)
                    let normalizedAccountNo = accountNoCell.replace(/-/g, ''); // Remove dashes from account_no

                    // Check if the normalized account_no contains the search query
                    if (normalizedAccountNo.includes(normalizedQuery)) {
                        dataTable.rows().show([index]);
                    } else {
                        dataTable.rows().hide([index]);
                    }
                });
            });
        }
    </script>
    <script>
        function confirmDelete(accountId) {
            // Show a confirmation prompt
            if (confirm("Are you sure you want to delete this account?")) {
                // If confirmed, submit the form
                document.getElementById('delete-form-' + accountId).submit();
            }
        }
    </script>

</x-app-layout>
