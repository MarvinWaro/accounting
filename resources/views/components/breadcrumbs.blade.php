<!-- resources/views/components/breadcrumbs.blade.php -->
<nav class="flex mb-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        @foreach ($links as $label => $url)
            <li class="inline-flex items-center">
                @if ($loop->last)
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $label }}</span>
                @else
                    <a href="{{ $url }}" class="text-sm font-medium text-blue-600 hover:text-blue-700 dark:text-blue-400">
                        {{ $label }}
                    </a>
                    <svg class="w-4 h-4 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 01-1.414-1.414L9.586 10 5.879 6.293a1 1 0 011.414-1.414l4.828 4.828a1 1 0 010 1.414l-4.828 4.828z" clip-rule="evenodd"></path>
                    </svg>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
