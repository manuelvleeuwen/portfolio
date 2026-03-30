@props(['title', 'description', 'tags' => [], 'url' => null, 'github'])

<div class="border border-gray-200 dark:border-gray-800 rounded-lg p-6 hover:border-gray-300 dark:hover:border-gray-700 transition-colors">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $title }}</h3>
    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">{{ $description }}</p>
    <div class="flex flex-wrap gap-2 mb-4">
        @foreach($tags as $tag)
            <span class="text-xs px-2 py-1 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded">{{ $tag }}</span>
        @endforeach
    </div>
    <div class="flex gap-4 text-sm">
        @if($url)
            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
                {{ __('project.visit') }}
            </a>
        @endif
        <a href="{{ $github }}" target="_blank" rel="noopener noreferrer" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
            {{ __('project.github') }}
        </a>
    </div>
</div>
