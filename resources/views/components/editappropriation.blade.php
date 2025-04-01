<!-- Edit Appropriation Modal -->
<div id="editModal" class="fixed inset-0 z-50 flex justify-center items-center hidden">
   <!-- Modal Content -->
   <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-1/3">
       <!-- Header -->
       <div class="flex items-center justify-between mb-4">
           <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Appropriation</h2>
           <button type="button" onclick="closeEditModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l12 12m0-12L1 13"/>
               </svg>
           </button>
       </div>

       <form id="editAppropriationForm" method="POST">
           @csrf
           @method('PUT')
           <input type="hidden" id="editId" name="id">

           <div class="mb-4">
               <label for="editDocumentType" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Document Type</label>
               <select id="editDocumentType" name="document_type" class="mt-1 block w-full p-2 border rounded dark:bg-gray-700 dark:text-white">
                   <option value="GAA">GAA</option>
                   <option value="SARO">SARO</option>
                   <option value="SUBARO">SUBARO</option>
                   <option value="GAARO">GAARO</option>
               </select>
           </div>

           <div class="mb-4">
               <label for="editDocumentNumber" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Document Number</label>
               <input type="text" id="editDocumentNumber" name="document_number" class="mt-1 block w-full p-2 border rounded dark:bg-gray-700 dark:text-white">
           </div>

           <div class="mb-4">
               <label for="editDateReceived" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date Received</label>
               <input type="date" id="editDateReceived" name="date_received" class="mt-1 block w-full p-2 border rounded dark:bg-gray-700 dark:text-white">
           </div>

           <div class="mb-4">
               <label for="editAmount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount</label>
               <input type="text" id="editAmount" name="amount" class="mt-1 block w-full p-2 border rounded dark:bg-gray-700 dark:text-white">
           </div>

           <div class="flex justify-end mt-4">
               <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded">Cancel</button>
               <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded">Save</button>
           </div>
       </form>
   </div>
</div>



<!-- Updated JavaScript -->
{{-- <script>
  document.addEventListener('DOMContentLoaded', function () {
       const modal = document.getElementById('editModal');
       const closeModal = document.getElementById('closeModal');
       const editForm = document.getElementById('editForm');
       const editAmount = document.getElementById('editAmount');

       document.addEventListener('click', function (event) {
           if (event.target.closest('.edit-button')) {
               event.preventDefault();
               let row = event.target.closest('tr');
               if (!row) return;

               // Get row data
               let id = row.getAttribute('data-id');
               let documentType = row.children[1].innerText.trim();
               let documentNumber = row.children[2].innerText.trim();
               let dateReceived = row.children[3].innerText.trim();

               // Extract the amount correctly
               let amountTd = row.children[4]; // Ensure this is the correct column
               let amountText = amountTd.innerText.trim().replace(/[^\d.]/g, ''); // Remove non-numeric characters except "."
               let amount = parseFloat(amountText) || 0;

               // Debugging: Log extracted values
               console.log("Extracted Amount:", amountText, "Parsed:", amount);

               // Populate modal fields
               document.getElementById('editId').value = id;
               document.getElementById('editDocumentType').value = documentType;
               document.getElementById('editDocumentNumber').value = documentNumber;
               document.getElementById('editDateReceived').value = dateReceived;
               console.log("Setting Input Amount to:", amount);
               // editAmount.value = formatCurrency(amount); // Display formatted amount
               editAmount.value = amount; // Set plain numeric value first
               setTimeout(() => {
                  editAmount.value = formatCurrency(amount); // Then format it after a delay
               }, 10);

               // Show modal
               modal.classList.remove('hidden');
           }
       });

       closeModal.addEventListener('click', function () {
           modal.classList.add('hidden');
       });

       editAmount.addEventListener('input', function () {
           let rawValue = this.value.replace(/[^0-9.]/g, '');
           let numericValue = parseFloat(rawValue) || 0;
           this.value = formatCurrency(numericValue);
       });

       editForm.addEventListener('submit', function (event) {
           event.preventDefault();
           let formData = new FormData(editForm);

           let rawAmount = editAmount.value.replace(/[^0-9.]/g, '');
           formData.set('amount', rawAmount);

           fetch('appropriations/update/' + formData.get('id'), {
               method: 'POST',
               headers: {
                   'X-CSRF-TOKEN': '{{ csrf_token() }}',
                   'Accept': 'application/json'
               },
               body: formData
           })
           .then(response => response.json())
           .then(data => {
               alert('Appropriation updated successfully');
               location.reload();
           })
           .catch(error => console.error('Error:', error));
       });

       function formatCurrency(amount) {
           return '₱' + amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
       }
   });

</script> --}}
