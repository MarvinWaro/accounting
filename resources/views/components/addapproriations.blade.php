<!-- Add Appropriation Modal -->
<div id="addAppropriationModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-y-auto overflow-x-hidden md:inset-0 h-[calc(100%-1rem)] max-h-full">
   <div class="relative w-full max-w-md max-h-full">
       <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
           <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
               <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                   Add New Appropriation
               </h3>
               <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addAppropriationModal">
                   <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l12 12m0-12L1 13"/>
                   </svg>
               </button>
           </div>
           <form id="addAppropriationForm" action="{{ route('appropriations.store') }}" method="POST" class="p-4">
            @csrf
            <div class="mb-4">
                <label for="document_type" class="block text-sm font-medium text-gray-900 dark:text-white">Document Type</label>
                <select name="document_type" id="document_type" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                    <option value="GAA">GAA</option>
                    <option value="SARO">SARO</option>
                    <option value="SUBARO">SUBARO</option>
                    <option value="GAARO">GAARO</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <select name="status" id="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="document_number" class="block text-sm font-medium text-gray-900 dark:text-white">Document Number</label>
                <input type="text" name="document_number" id="document_number" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="date_received" class="block text-sm font-medium text-gray-900 dark:text-white">Date Received</label>
                <input type="date" name="date_received" id="date_received" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                <input type="number" step="0.01" name="amount" id="amount" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg">Save</button>
        </form>
       </div>
   </div>
</div>
