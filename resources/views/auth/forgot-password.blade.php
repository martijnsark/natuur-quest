<x-app-layout>
    <!-- Diagonal background like homepage -->
    <x-styling-arrow-left></x-styling-arrow-left>

    <!-- center form container -->
    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <!-- main reset password section -->
        <section class="bg-white/80 dark:bg-gray-900/80 p-8 rounded-xl shadow-lg w-full max-w-md text-center" aria-labelledby="reset-password-page-heading">

            <!-- page header -->
            <header class="text-center">
                <x-header-h1 id="reset-password-page-heading" class="text-4xl font-bold mb-4 font-heading text-black dark:text-white" tabindex="0" aria-label="Wachtwoord reset pagina voor Natuur Quest">
                    Wachtwoord vergeten
                </x-header-h1>

                <p class="mb-6 text-sm font-text text-gray-700 dark:text-gray-300">
                    Geen probleem. Laat ons uw e-mailadres weten en we sturen een link om uw wachtwoord te resetten, zodat u een nieuw wachtwoord kunt kiezen.
                </p>
            </header>

            <!-- session status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- form section with separate aria-label -->
            <section aria-labelledby="reset-password-form-heading">
                <!-- hidden heading for accessibility -->
                <h2 id="reset-password-form-heading" class="sr-only">Wachtwoord Reset Formulier</h2>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- email input -->
                    <div class="mb-4 text-left">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input
                            id="email"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm
                                   focus:ring-indigo-500 focus:border-indigo-500
                                   dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                            type="email"
                            name="email"
                            :value="old('email')"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- submit button -->
                    <div class="mb-4">
                        <x-primary-button class="w-full py-2">
                            Stuur reset link
                        </x-primary-button>
                    </div>

                    <!-- back to login link -->
                    @if (Route::has('login'))
                        <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                            Terug naar
                            <a href="{{ route('login') }}" class="underline text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200">
                                inloggen
                            </a>
                        </p>
                    @endif
                </form>
            </section>
        </section>
    </div>
</x-app-layout>
