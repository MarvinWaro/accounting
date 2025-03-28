@props(['active', 'dropdown' => false])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 dark:border-indigo-600 text-sm font-medium leading-5 text-white dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
@endphp

<div class="relative group flex justify-center items-center">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        @if ($dropdown)
            <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        @endif
    </a>

   @if ($dropdown)
      <!-- Dropdown menu -->
      <div class="absolute left-0 mt-28 hidden group-hover:block bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-200 rounded-lg shadow-lg min-w-max z-10">
         <ul class="py-2 text-sm">
            <x-dropdown-menu-item label="Fund 101" route="accounting_dashboard"></x-dropdown-menu-item>
            <x-dropdown-menu-item label="Fund 151" route="accounting_dashboard"></x-dropdown-menu-item>
         </ul>
      </div>
   @endif
</div>
