<x-layouts.app title="{{ __('contact.title') }}">
    <section class="max-w-4xl mx-auto px-6 py-24">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ __('contact.heading') }}</h1>
        <p class="text-gray-600 dark:text-gray-400 mb-8">{{ __('contact.subtitle') }}</p>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg text-green-700 dark:text-green-400 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->has('form_error'))
            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg text-red-700 dark:text-red-400 text-sm">
                {{ $errors->first('form_error') }}
            </div>
        @endif

        <form id="contact-form" method="POST" action="/contact" class="space-y-5 max-w-lg">
            @csrf
            {{-- Honeypot --}}
            <div class="hidden" aria-hidden="true">
                <input type="text" name="website" tabindex="-1" autocomplete="off">
            </div>

            <x-form-input id="name" name="name" :label="__('contact.name')" :value="old('name')" />
            <x-form-input id="email" name="email" type="email" :label="__('contact.email')" :value="old('email')" />
            <x-form-input id="subject" name="subject" :label="__('contact.subject')" :value="old('subject')" />
            <x-form-textarea id="message" name="message" :label="__('contact.message')" :value="old('message')" />

            <button type="submit"
                    class="px-6 py-2 bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-lg text-sm font-medium hover:bg-gray-700 dark:hover:bg-gray-100 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                {{ __('contact.send') }}
            </button>
        </form>

        <script>
            const form = document.getElementById('contact-form');
            const btn  = form.querySelector('[type=submit]');

            form.addEventListener('submit', () => {
                btn.disabled    = true;
                btn.textContent = '{{ __('contact.sending') }}';
            });

            window.addEventListener('pageshow', (e) => {
                if (e.persisted) {
                    btn.disabled    = false;
                    btn.textContent = '{{ __('contact.send') }}';
                }
            });
        </script>
    </section>
</x-layouts.app>
