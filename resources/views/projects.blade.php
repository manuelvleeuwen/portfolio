<x-layouts.app title="{{ __('projects.title') }}">
    <section class="max-w-4xl mx-auto px-6 py-24">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">{{ __('projects.heading') }}</h1>
        <div class="grid gap-6 sm:grid-cols-2">
            @foreach($projects as $project)
                <x-project
                    :title="__($project['title'])"
                    :description="__($project['description'])"
                    :tags="$project['tags']"
                    :url="$project['url'] ?? null"
                    :github="$project['github']"
                />
            @endforeach
        </div>
    </section>
</x-layouts.app>
