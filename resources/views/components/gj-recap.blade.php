{{-- <div class="py-12">
   <div class=" mx-auto sm:px-6 lg:px-8">
       <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

       <!-- Invoice -->
       <div class=" max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-6 sm:my-12">
           <!-- Header Section -->
           <div class="flex justify-between items-center mb-8 pb-6 border-b border-gray-200 dark:border-neutral-700">
               <h2 class="text-3xl font-bold text-gray-800 dark:text-neutral-200">Invoice</h2>
               <div class="inline-flex gap-x-3">
                   <!-- Invoice PDF Button -->
                   <a class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-md hover:bg-gray-50 focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:ring-neutral-600" href="#">
                       <svg class="shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                       Invoice PDF
                   </a>
                   <!-- Print Button -->
                   <a class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="#">
                       <svg class="shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
                       Print
                   </a>
               </div>
           </div>

           <!-- Heading Section -->
           <div class="text-center mb-8 space-y-1">
               <p class="text-lg font-semibold text-gray-700 dark:text-neutral-300">GENERAL JOURNAL</p>
               <p class="text-gray-600 dark:text-neutral-400">COMMISSION ON HIGHER EDUCATION</p>
               <p class="text-gray-600 dark:text-neutral-400">FUND 101</p>
           </div>

           <!-- Table Section -->
           <div class="bg-white dark:bg-neutral-900 border border-gray-200 dark:border-neutral-700 p-6 rounded-lg shadow-sm space-y-4">
               <div class="hidden sm:grid sm:grid-cols-5 pb-3 border-b border-gray-200 dark:border-neutral-700">
                   <div class="col-span-2 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Particulars</div>
                   <div class="text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Code</div>
                   <div class="text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Debit</div>
                   <div class="text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500">Credit</div>
               </div>

               <!-- Table Rows -->
               <div class="space-y-4">
                   <div class="grid grid-cols-3 sm:grid-cols-5 gap-4">
                       <div class="col-span-3 sm:col-span-2">
                           <p class="font-medium text-gray-800 dark:text-neutral-200">Office Supplies Expenses</p>
                       </div>
                       <div class="text-gray-800 dark:text-neutral-200">1-03-03-010-00</div>
                       <div class="text-gray-800 dark:text-neutral-200">295</div>
                       <div class="text-end text-gray-800 dark:text-neutral-200">2000</div>
                   </div>
                   <div class="grid grid-cols-3 sm:grid-cols-5 gap-4">
                       <div class="col-span-3 sm:col-span-2">
                           <p class="font-medium text-gray-800 dark:text-neutral-200">Repairs and Maintenance - Buildings and Other Structures</p>
                       </div>
                       <div class="text-gray-800 dark:text-neutral-200">1-53-73-010-00</div>
                       <div class="text-gray-800 dark:text-neutral-200">893</div>
                       <div class="text-end text-gray-800 dark:text-neutral-200">7,202.00</div>
                   </div>
                   <div class="grid grid-cols-3 sm:grid-cols-5 gap-4">
                       <div class="col-span-3 sm:col-span-2">
                           <p class="font-medium text-gray-800 dark:text-neutral-200">Due from National Government Agencies</p>
                       </div>
                       <div class="text-gray-800 dark:text-neutral-200">2-03-03-010-99</div>
                       <div class="text-gray-800 dark:text-neutral-200">23,000.00</div>
                       <div class="text-end text-gray-800 dark:text-neutral-200">3,000,213</div>
                   </div>
               </div>
           </div>

           <!-- Totals Section -->
           <div class="mt-8 flex justify-between items-center">
               <!-- Accountant Section -->
               <div class="text-left">
                   <p class="font-semibold text-gray-800 dark:text-neutral-200">Philip John G. Pelingon</p>
                   <p class="text-gray-500 dark:text-neutral-400 underline">Accountant II</p>
               </div>

               <!-- Totals Section -->
               <div class="w-full max-w-lg text-end space-y-2">
                   <dl class="grid grid-cols-2 text-sm gap-2">
                       <dt class="text-gray-500 dark:text-neutral-500">Total Debit:</dt>
                       <dd class="font-medium text-gray-800 dark:text-neutral-200">$2750.00</dd>
                   </dl>
                   <dl class="grid grid-cols-2 text-sm gap-2">
                       <dt class="text-gray-500 dark:text-neutral-500">Total Credit:</dt>
                       <dd class="font-medium text-gray-800 dark:text-neutral-200">$2750.00</dd>
                   </dl>
               </div>
           </div>

       </div>
       <!-- End Invoice -->

       </div>
   </div>
</div> --}}

<!-- GJ Recap Modal -->
<div id="gj-recap-modal" class="flex fixed inset-0 items-center justify-center bg-black bg-opacity-50 hidden backdrop-blur-sm" style="
margin-top: 0px;
">
   <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-5xl w-full">
       <!-- Header Section -->
       <div class="flex justify-between items-center mb-8 pb-6 border-b border-gray-200 dark:border-neutral-700">
           <h2 class="text-3xl font-bold text-gray-800 dark:text-neutral-200">Invoice</h2>
           <div class="inline-flex gap-x-3">
               <!-- Invoice PDF Button -->
               <a class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-md hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300" href="#">
                   Invoice PDF
               </a>
               <!-- Print Button -->
               <a class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700" href="#">
                   Print
               </a>
           </div>
       </div>

       <!-- Heading Section -->
       <div class="text-center mb-8 space-y-1">
           <p class="text-lg font-semibold text-gray-700 dark:text-neutral-300">GENERAL JOURNAL</p>
           <p class="text-gray-600 dark:text-neutral-400">COMMISSION ON HIGHER EDUCATION</p>
           <p class="text-gray-600 dark:text-neutral-400">FUND 101</p>
       </div>

       <!-- Table Section -->
       <div class="bg-white dark:bg-neutral-900 border border-gray-200 dark:border-neutral-700 p-6 rounded-lg shadow-sm space-y-4">
           <div class="hidden sm:grid sm:grid-cols-5 pb-3 border-b border-gray-200 dark:border-neutral-700">
               <div class="col-span-2 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Particulars</div>
               <div class="text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Code</div>
               <div class="text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Debit</div>
               <div class="text-xs font-medium text-gray-500 uppercase text-end dark:text-neutral-500">Credit</div>
           </div>

           <!-- Table Rows (Dynamically Inserted) -->
           <div id="transactions-content" class="space-y-4">
               <!-- Transactions will be dynamically inserted here -->
           </div>
       </div>

       <!-- Totals & Accountant Section -->
       <div class="mt-8 flex justify-between items-center">
           <!-- Accountant Section (Static) -->
           <div class="text-left">
               <p class="font-semibold text-gray-800 dark:text-neutral-200">Philip John G. Pelingon</p>
               <p class="text-gray-500 dark:text-neutral-400 underline">Accountant II</p>
           </div>

           <!-- Totals Section -->
           <div class="w-full max-w-lg text-end space-y-2">
               <dl class="grid grid-cols-2 text-sm gap-2">
                   <dt class="text-gray-500 dark:text-neutral-500">Total Debit:</dt>
                   <dd id="total-debit" class="font-medium text-gray-800 dark:text-neutral-200">₱0.00</dd>
               </dl>
               <dl class="grid grid-cols-2 text-sm gap-2">
                   <dt class="text-gray-500 dark:text-neutral-500">Total Credit:</dt>
                   <dd id="total-credit" class="font-medium text-gray-800 dark:text-neutral-200">₱0.00</dd>
               </dl>
           </div>
       </div>

       <!-- Close Button -->
       <div class="text-right mt-4">
           <button onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Close</button>
       </div>
   </div>
</div>

{{-- <script>
   document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".gj-recap-btn").forEach(button => {
         button.addEventListener("click", function () {
               let month = this.getAttribute("data-month");
               let monthName = new Date(2023, month - 1).toLocaleString('en', { month: 'long' });

               fetch(`/transactions/recap/${month}`)
                  .then(response => response.json())
                  .then(data => {
                     let transactionsHTML = "";
                     let totalDebit = 0;
                     let totalCredit = 0;

                     data.forEach(transaction => {
                           transactionsHTML += `
                              <div class="grid grid-cols-3 sm:grid-cols-5 gap-4">
                                 <div class="col-span-3 sm:col-span-2">
                                       <p class="font-medium text-gray-800 dark:text-neutral-200">${transaction.particulars}</p>
                                 </div>
                                 <div class="text-gray-800 dark:text-neutral-200">${transaction.code}</div>
                                 <div class="text-gray-800 dark:text-neutral-200">${transaction.debit}</div>
                                 <div class="text-end text-gray-800 dark:text-neutral-200">${transaction.credit}</div>
                              </div>
                           `;
                           totalDebit += parseFloat(transaction.debit);
                           totalCredit += parseFloat(transaction.credit);
                     });

                     // Insert transactions into modal
                     document.getElementById("transactions-content").innerHTML = transactionsHTML;

                     // Update totals
                     document.getElementById("total-debit").innerText = `$${totalDebit.toFixed(2)}`;
                     document.getElementById("total-credit").innerText = `$${totalCredit.toFixed(2)}`;

                     // Show the modal
                     document.getElementById("gj-recap-modal").classList.remove("hidden");
                  })
                  .catch(error => {
                     document.getElementById("transactions-content").innerHTML = "<p class='text-red-500'>Error loading transactions.</p>";
                  });
         });
      });
   });

   function closeModal() {
      document.getElementById("gj-recap-modal").classList.add("hidden");
   }
</script> --}}
