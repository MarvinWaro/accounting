<div class="container mx-auto p-4">
   <x-toast/>
   <div class="flex justify-between items-center mb-6">
      <h2 class="text-xl font-bold text-gray-800 dark:text-white">Appropriations</h2>
      <button data-modal-target="addAppropriationModal" data-modal-toggle="addAppropriationModal" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 me-2">
              <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
          </svg>
          Add New Appropriation
      </button>
   </div>

   <x-addapproriations/>

   <div class="table-wrapper overflow-x-auto rounded-lg p-3">
      <table id="search-table" class="w-full divide-y divide-gray-200 dark:divide-gray-700">
         <thead class="bg-gray-100 dark:bg-gray-800">
             <tr>
                 <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:text-gray-300">Status</th>
                 <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:text-gray-300">Document Type</th>
                 <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:text-gray-300">Document Number</th>
                 <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:text-gray-300">Date Received</th>
                 <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:text-gray-300">Amount</th>
                 <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider dark:text-gray-300">Actions</th>
             </tr>
         </thead>
         <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
             @foreach($appropriations as $appropriation)
                 <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-150">
                     <td class="px-6 py-4 whitespace-nowrap">
                        @if($appropriation->status == 'Pending')
                           <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">{{ $appropriation->status }}</span>
                        @elseif($appropriation->status == 'In Progress')
                           <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">{{ $appropriation->status }}</span>
                        @else
                           <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">{{ $appropriation->status }}</span>
                        @endif
                     </td>
                     <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800 dark:text-white">{{ $appropriation->document_type }}</td>
                     <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-300">{{ $appropriation->document_number }}</td>
                     <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-300">{{ $appropriation->date_received }}</td>
                     <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-300">₱{{ number_format($appropriation->amount, 2) }}</td>
                     <td class="px-6 py-4 whitespace-nowrap space-x-2">
                        <a href="#" class="inline-flex items-center justify-center p-2 text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800 transition-colors duration-150" title="View">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        {{-- Edit button --}}
                        <a href="#" data-id="{{ $appropriation->id }}" class="edit-button inline-flex items-center justify-center p-2 text-amber-600 bg-amber-100 rounded-md hover:bg-amber-200 dark:bg-amber-900 dark:text-amber-300 dark:hover:bg-amber-800 transition-colors duration-150" title="Edit">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                               <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                               <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                           </svg>
                        </a>

                        <form action="{{ route('appropriations.destroy', $appropriation->id) }}" method="POST" class="delete-form inline" data-id="{{ $appropriation->id }}">
                           @csrf
                           @method('DELETE')
                           <button type="button" class="delete-button inline-flex items-center justify-center p-2 text-red-600 bg-red-100 rounded-md hover:bg-red-200 dark:bg-red-900 dark:text-red-300 dark:hover:bg-red-800 transition-colors duration-150" title="Delete">
                               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                                   <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                               </svg>
                           </button>
                        </form>
                     </td>
                 </tr>
             @endforeach
             <x-editappropriation />
         </tbody>
     </table>
   </div>
</div>
<script>
   window.App = {
       routes: {
           appropriationsStore: "{{ route('appropriations.store') }}"
       }
   };

   document.addEventListener("DOMContentLoaded", function() {
       // Select all edit buttons
       document.querySelectorAll(".edit-button").forEach(button => {
           button.addEventListener("click", function() {
               document.getElementById("edit_id").value = this.getAttribute("data-id");
               document.getElementById("edit_document_type").value = this.getAttribute("data-document-type");
               document.getElementById("edit_document_number").value = this.getAttribute("data-document-number");
               document.getElementById("edit_date_received").value = this.getAttribute("data-date-received");
               document.getElementById("edit_amount").value = this.getAttribute("data-amount");
           });
       });

       // Handle form submission
       document.getElementById("editForm").addEventListener("submit", function(event) {
           event.preventDefault();

           let id = document.getElementById("edit_id").value;
           let formData = {
               document_type: document.getElementById("edit_document_type").value,
               document_number: document.getElementById("edit_document_number").value,
               date_received: document.getElementById("edit_date_received").value,
               amount: document.getElementById("edit_amount").value,
           };

           fetch(`/appropriations/${id}`, {
               method: "PUT",
               headers: {
                   "Content-Type": "application/json",
                   "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
               },
               body: JSON.stringify(formData)
           })
           .then(response => response.json())
           .then(data => {
               alert("Appropriation updated successfully!");
               location.reload();
           });
       });
   });
</script>

@vite(['resources/js/crud-appropriations.js'])
