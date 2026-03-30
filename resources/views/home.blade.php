<x-layouts.app title="{{ __('home.title') }}">
    @push('head')
        <script>
            window.typedStrings = {!! json_encode([__('home.typed.1'), __('home.typed.2'), __('home.typed.3'), __('home.typed.4'), __('home.typed.5')]) !!};
        </script>
    @endpush
    <section class="max-w-4xl mx-auto px-6 py-24">
        {{-- Changed --}}
        <div class="flex flex-col-reverse gap-10 sm:flex-row sm:items-center">
            <div class="flex-1">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Manuel van Leeuwen</h1>
                <p class="text-xl text-gray-600 dark:text-gray-400 mb-8 h-8">
                    <span id="typed-text"></span>
                </p>
                <p class="text-gray-600 dark:text-gray-400 max-w-xl leading-relaxed mb-10">
                    {{ __('home.intro') }}
                </p>
                <a href="{{ url('/projects') }}" class="inline-block bg-gray-900 hover:bg-gray-800 text-white dark:bg-white dark:hover:bg-gray-200 dark:text-gray-900 font-semibold text-lg px-8 py-4 rounded-xl transition-colors duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2">
                    {{ __('home.view_projects') }}
                </a>
            </div>
            <div class="shrink-0">
                {{-- Changed --}}
                <img
                    src="{{ asset('images/profile.jpg') }}"
                    alt="{{ __('home.profile_alt') }}"
                    class="w-64 h-64 sm:w-80 sm:h-80 rounded-2xl object-cover shadow-lg"
                >
                <a href="https://www.facebook.com/thepictureartoftabletennis" target="_blank" rel="noopener noreferrer" class="text-gray-600 dark:text-gray-400 mt-1 block">
                    &copy; The Picture Art of Tabletennis
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
