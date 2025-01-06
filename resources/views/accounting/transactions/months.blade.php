<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transactions for ') }} {{ $year }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-8 space-y-6">
                <h1 class="text-lg font-bold">Transactions in {{ $year }}</h1>

                <!-- Display the months and their transaction count -->
                <ul class="space-y-4">
                    @foreach ($months as $month)
                        <li>
                            <a href="{{ route('transaction.entries', ['year' => $year, 'month' => $month->month]) }}" class="text-blue-500 hover:text-blue-700">
                                {{ \Carbon\Carbon::createFromFormat('m', $month->month)->format('F') }} ({{ $month->transaction_count }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>

