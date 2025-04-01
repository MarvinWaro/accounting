<!-- Modal Background Overlay (Semi-transparent) -->
@props(['appropriations'])
<div id="editModal" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-gray-500 bg-opacity-50 backdrop-blur-sm">
   <!-- Modal Content -->
   <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-1/3">
      <!-- Header -->
      <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Appropriation</h2>

      <form id="editForm" method="POST" action="{{ route('appropriations.update', ['id' => $appropriations->id]) }}">
         @csrf
         @method('PUT')
         <input type="hidden" id="editId" name="id">

         <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-2">Document Type</label>
         <select id="editDocumentType" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">
            <option value="GAA">GAA</option>
            <option value="SARO">SARO</option>
            <option value="SUBARO">SUBARO</option>
            <option value="GAARO">GAARO</option>
         </select>

         <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-2">Document Number</label>
         <input type="text" id="editDocumentNumber" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">

         <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-2">Date Received</label>
         <input type="date" id="editDateReceived" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">

         <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-2">Amount</label>
         <input type="text" id="editAmount" step="0.01" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white">

         <div class="flex justify-end mt-4">
            <button type="button" id="closeModal" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded">Cancel</button>
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
