<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-8 space-y-6">
                <!-- Transaction Info -->
                <div class="space-y-4">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200"><span class="me-3">#{{ $transaction->id }}</span>Transaction Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Date</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $transaction->transaction_date }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">JEV No.</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $transaction->jev_no }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Reference</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $transaction->ref }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Payee</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $transaction->payee }}</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $transaction->description }}</p>
                    </div>
                </div>
                <!-- Transaction Details -->
                <h4 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mt-8">Transaction Items</h4>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-900">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase">Particulars</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase">UACS Code</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase">Mode of Payment</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 dark:text-gray-400 uppercase">Amount</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($transaction->details as $detail)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $detail->particulars }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $detail->uacs_code }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ $detail->mode_of_payment }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ number_format($detail->amount, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-100 dark:bg-gray-900">
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-right text-xs font-bold text-gray-500 dark:text-gray-400 uppercase">Total Debit</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-bold text-gray-900 dark:text-gray-100">{{ number_format($totalDebit, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-right text-xs font-bold text-gray-500 dark:text-gray-400 uppercase">Total Credit</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-bold text-gray-900 dark:text-gray-100">{{ number_format($totalCredit, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-right text-xs font-bold text-gray-500 dark:text-gray-400 uppercase">Grand Total</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-bold text-gray-900 dark:text-gray-100">{{ number_format($totalAmount, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
