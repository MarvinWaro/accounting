<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <section>
                    <div class="max-w-7xl mx-auto py-8 px-4 lg:py-16">
                        <h2 class="mb-8 text-xl font-bold text-gray-900 dark:text-white">Add new account</h2>

                        @if ($errors->any())
                            <div class="text-red-500">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <form action="{{ route('uacs_update', $account->id) }}" method="POST" class="flex items-center gap-4">
                            @csrf
                            @method('PUT')
                            <!-- Account No. -->
                            <div class="flex-1 basis-1/3">
                                <label for="account_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account No.</label>
                                <input type="text" name="account_no" id="account_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('account_no', $account->account_no) }}" required>
                            </div>

                            <!-- Account Description -->
                            <div class="flex-1 basis-2/3">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account Description</label>
                                <input type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('description', $account->description) }}" required>
                            </div>

                            <!-- Save Account Button -->
                            <div class="flex-none basis-1/5">
                                <button type="submit" class="mt-7 w-full inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-2 focus:ring-primary-200 dark:focus:ring-primary-900">
                                    Save Account
                                </button>
                            </div>
                        </form>


                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>
