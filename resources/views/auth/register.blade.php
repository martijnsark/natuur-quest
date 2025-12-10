<x-app-layout>
    <!-- diagonal background like homepage -->
    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>

    <!-- div to center the form -->
    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <!-- main registration section -->
        <section class="bg-white/80 dark:bg-gray-900/80 p-8 rounded-xl shadow-lg w-full max-w-md text-center" aria-labelledby="register-page-heading">

            <!-- page header -->
            <header class="text-center">
                <h1 id="register-page-heading" class="text-4xl font-bold mb-4 font-heading text-black dark:text-white">
                    Registreren
                </h1>
                <p class="font-text text-lg mb-6 text-gray-800 dark:text-gray-300">
                    Creëer jouw account en begin met Natuur Quest!
                </p>
            </header>

            <!-- session status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- form section with separate aria-label -->
            <section aria-labelledby="register-form-heading">
                <!-- hidden heading for accessibility -->
                <h2 id="register-form-heading" class="sr-only">Registratie Formulier</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- name -->
                    <div class="mb-4 text-left">
                        <x-input-label for="name" :value="__('Naam')" />
                        <x-text-input
                            id="name"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                            type="text"
                            name="name"
                            :value="old('name')"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- email -->
                    <div class="mb-4 text-left">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input
                            id="email"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                            type="email"
                            name="email"
                            :value="old('email')"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- password -->
                    <div class="mb-4 text-left">
                        <x-input-label for="password" :value="__('Wachtwoord')" />
                        <x-text-input
                            id="password"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                            type="password"
                            name="password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- confirm password -->
                    <div class="mb-4 text-left">
                        <x-input-label for="password_confirmation" :value="__('Verifieer wachtwoord')" />
                        <x-text-input
                            id="password_confirmation"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                            type="password"
                            name="password_confirmation"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- submit button -->
                    <div class="mb-4">
                        <x-primary-button class="w-full py-2">
                            Registreer
                        </x-primary-button>
                    </div>

                    <!-- login link -->
                    @if (Route::has('login'))
                        <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                            Heb je al een account?
                            <a href="{{ route('login') }}" class="underline text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200">
                                Log in
                            </a>
                        </p>
                    @endif
                </form>
            </section>
        </section>
    </div>
</x-app-layout>
