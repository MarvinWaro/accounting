<x-app-layout>
   <x-slot name="header">
      <!-- Toast component - positioned absolutely within header -->
         <x-toast/>
       <nav class="flex" aria-label="Breadcrumb">
           <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
               <li class="inline-flex items-center">
                  <a href="{{ route('accounting_dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-hand-coins-icon lucide-hand-coins w-4 h-4 me-2.5"><path d="M11 15h2a2 2 0 1 0 0-4h-3c-.6 0-1.1.2-1.4.6L3 17"/><path d="m7 21 1.6-1.4c.3-.4.8-.6 1.4-.6h4c1.1 0 2.1-.4 2.8-1.2l4.6-4.4a2 2 0 0 0-2.75-2.91l-4.2 3.9"/><path d="m2 16 6 6"/><circle cx="16" cy="9" r="2.9"/><circle cx="6" cy="5" r="3"/></svg>
                     Budget Management
                  </a>
               </li>
               <li>
                     <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-land-plot-icon lucide-land-plot w-4 h-4">
                           <path d="m12 8 6-3-6-3v10"/><path d="m8 11.99-5.5 3.14a1 1 0 0 0 0 1.74l8.5 4.86a2 2 0 0 0 2 0l8.5-4.86a1 1 0 0 0 0-1.74L16 12"/><path d="m6.49 12.85 11.02 6.3"/><path d="M17.51 12.85 6.5 19.15"/>
                        </svg>
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">RAPAL</a>
                     </div>
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
{{--
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
   @endif --}}

   <div class="py-12">
       <div class=" mx-auto sm:px-6 lg:px-8">
           <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
               {{-- <div class="mx-5 my-5">
                   <a href="{{ route('transaction.create') }}" type="button" class="my-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-hidden focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
                                         <button id="dropdownButton-{{ $transaction->id }}" data-dropdown-toggle="dropdown-{{ $transaction->id }}" class="text-gray-800 bg-transparent border border-gray-300 hover:text-gray-500 focus:ring-4 focus:outline-hidden focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-transparent dark:border-gray-600 dark:text-gray-300 dark:hover:text-gray-400 dark:focus:ring-gray-800" type="button">
                                            Action
                                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                         </button>

                                         <div id="dropdown-{{ $transaction->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton-{{ $transaction->id }}">
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
                                                        <button id="destroy-btn-transaction-{{$transaction->id}}" type="button" class="delete-button w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex items-center focus:outline-hidden">
                                                              <i class="fa-solid fa-trash me-2 text-red-500"></i><span class="text-red-500">Delete</span>
                                                        </button>
                                                     </form>
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
               </div> --}}
               <x-appropriations-table :appropriations="$appropriations" />
           </div>
       </div>
   </div>

   <script>

     document.addEventListener('DOMContentLoaded', function () {
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
           const dataTable = new simpleDatatables.DataTable("#search-table", {
                 searchable: true,
                 sortable: false
           });

           // Function to initialize Flowbite dropdowns
           function initFlowbiteDropdowns() {
                 const dropdowns = document.querySelectorAll('[data-dropdown-toggle]');
                 dropdowns.forEach(dropdown => {
                    const toggleId = dropdown.getAttribute('data-dropdown-toggle');
                    const menu = document.getElementById(toggleId);
                    if (menu && !menu.classList.contains('flowbite-initialized')) {
                       new Dropdown(menu, dropdown); // Flowbite's Dropdown class
                       menu.classList.add('flowbite-initialized'); // Prevent reinitialization
                    }
                 });
           }

           // Function to initialize delete button event listeners
         //   function initDeleteButtons() {
         //         document.querySelectorAll('.delete-button').forEach(function (button) {
         //            // Remove existing listeners to avoid duplicates
         //            const newButton = button.cloneNode(true);
         //            button.parentNode.replaceChild(newButton, button);

         //            newButton.addEventListener('click', function (e) {
         //               e.preventDefault();
         //               const appropriationId = this.id.split('destroy-btn-transaction-')[1];

         //               Swal.fire({
         //                     title: "Are you sure?",
         //                     text: `You are about to delete transaction with ID: ${transactionId}`,
         //                     icon: "warning",
         //                     showCancelButton: true,
         //                     confirmButtonColor: "#3085d6",
         //                     cancelButtonColor: "#d33",
         //                     confirmButtonText: "Yes, delete it!"
         //               }).then((result) => {
         //                     if (result.isConfirmed) {
         //                        document.getElementById(`delete-form-transaction-${transactionId}`).submit();
         //                     }
         //               });
         //            });
         //         });
         //   }

           // Initial initialization
           initFlowbiteDropdowns();
         //   initDeleteButtons();

           // Reinitialize after table updates (e.g., after search or clear)
           dataTable.on('datatable.update', function () {
                 initFlowbiteDropdowns();
               //   initDeleteButtons();
           });
        }
     });

   </script>

</x-app-layout>
<script>
   window.App = {
       routes: {
           appropriationsStore: "{{ route('appropriations.store') }}"
       }
   };
</script>
@vite(['resources/js/crud-appropriations.js'])
