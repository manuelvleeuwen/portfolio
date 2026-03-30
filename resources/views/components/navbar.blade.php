@php
    $links = [
        ['label' => __('nav.home'),     'url' => '/'],
        ['label' => __('nav.about'),    'url' => '/about'],
        ['label' => __('nav.projects'), 'url' => '/projects'],
        ['label' => __('nav.contact'),  'url' => '/contact'],
    ];
    $otherLocale = app()->getLocale() === 'en' ? 'nl' : 'en';
    $otherLocaleFlag = $otherLocale === 'en' ? 'gb' : $otherLocale;
@endphp

<nav class="border-b border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-950">
    <div class="max-w-4xl mx-auto px-6 flex items-center justify-between h-16">
        <a href="/" class="flex items-center gap-2 font-semibold text-lg text-gray-900 dark:text-white">
            <x-heroicon-s-code-bracket class="w-6 h-6" />
            Manuel van Leeuwen
        </a>

        {{-- Desktop navigation bar + menu --}}
        <div class="hidden sm:flex items-center gap-6">
            @foreach($links as $link)
                <a href="{{ $link['url'] }}"
                   class="{{ request()->url() === url($link['url']) ? 'text-gray-900 dark:text-white font-medium' : 'text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white' }} transition-colors text-sm">
                    {{ $link['label'] }}
                </a>
            @endforeach
            <a href="{{ route('locale.switch', $otherLocale) }}"
               class="transition-opacity opacity-75 hover:opacity-100"
               aria-label="Switch language">
                <img src="{{ asset('images/flags/' . $otherLocaleFlag . '.svg') }}" alt="{{ __('lang.' . $otherLocale) }}" class="w-6 h-4 rounded-sm object-cover" width="24" height="16">
            </a>
            <button onclick="toggleTheme()" class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors" aria-label="Toggle theme">
                <x-heroicon-o-sun class="w-5 h-5 hidden dark:block" />
                <x-heroicon-o-moon class="w-5 h-5 block dark:hidden" />
            </button>
        </div>

        {{-- Mobile navigation bar --}}
        <div class="flex items-center gap-3 sm:hidden">
            <a href="{{ route('locale.switch', $otherLocale) }}"
               class="transition-opacity opacity-75 hover:opacity-100"
               aria-label="Switch language">
                <img src="{{ asset('images/flags/' . $otherLocaleFlag . '.svg') }}" alt="{{ __('lang.' . $otherLocale) }}" class="w-6 h-4 rounded-sm object-cover" width="24" height="16">
            </a>
            <button onclick="toggleTheme()" class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors" aria-label="Toggle theme">
                <x-heroicon-o-sun class="w-5 h-5 hidden dark:block" />
                <x-heroicon-o-moon class="w-5 h-5 block dark:hidden" />
            </button>
            <button onclick="toggleMobileMenu()" class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors" aria-label="Toggle menu" aria-expanded="false" aria-controls="mobile-menu" id="mobile-menu-button">
                <x-heroicon-o-bars-3 id="mobile-menu-icon-open" class="w-5 h-5 block" />
                <x-heroicon-o-x-mark id="mobile-menu-icon-close" class="w-5 h-5 hidden" />
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div id="mobile-menu" class="overflow-hidden sm:hidden max-h-0 transition-[max-height] duration-300 ease-in-out" data-open="false">
        <div class="border-t border-gray-200 dark:border-gray-800">
            <div class="max-w-4xl mx-auto px-6 py-4 flex flex-col gap-4">
                @foreach($links as $link)
                    <a href="{{ $link['url'] }}"
                       class="{{ request()->url() === url($link['url']) ? 'text-gray-900 dark:text-white font-medium' : 'text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white' }} transition-colors text-sm">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const button = document.getElementById('mobile-menu-button');
        const iconOpen = document.getElementById('mobile-menu-icon-open');
        const iconClose = document.getElementById('mobile-menu-icon-close');
        const isOpen = menu.dataset.open === 'true';

        if (isOpen) {
            menu.style.maxHeight = '0px';
            menu.dataset.open = 'false';
        } else {
            menu.style.maxHeight = menu.scrollHeight + 'px';
            menu.dataset.open = 'true';
        }
        button.setAttribute('aria-expanded', String(!isOpen));
        iconOpen.classList.toggle('hidden', !isOpen);
        iconClose.classList.toggle('hidden', isOpen);
    }
</script>
