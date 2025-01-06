<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction Years') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-8 space-y-6">
                <h1 class="text-lg font-bold text-gray-800 dark:text-gray-200">Available Years</h1>

                <!-- Display the years -->
                <ul class="space-y-4">
                    @foreach ($years as $year)
                        <li>
                            <a href="{{ route('transaction.months', ['year' => $year]) }}"
                                class="text-gray-900 dark:text-gray-100 hover:text-blue-700 dark:hover:text-blue-300">
                                {{ $year }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>



