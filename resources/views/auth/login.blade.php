<x-app-layout>
    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>

    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <!-- main login section -->
        <section class="bg-white/80 dark:bg-gray-900/80 p-8 rounded-xl shadow-lg w-full max-w-md text-center" aria-labelledby="login-page-heading">

            <!-- page heading -->
            <header class="text-center">
                <h1 id="login-page-heading" class="text-4xl font-bold mb-4 font-heading text-black dark:text-white" tabindex="0" aria-label="Loginpagina voor Natuur Quest">
                    Inloggen
                </h1>

                <p class="font-text text-lg mb-6 text-gray-800 dark:text-gray-300">
                    Log in om Natuur Quest te spelen!
                </p>
            </header>

            <!-- session status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- form section with separate aria-label -->
            <section aria-labelledby="login-form-heading">
                <!-- hidden heading for accessibility -->
                <h2 id="login-form-heading" class="sr-only">Login Formulier</h2>

                <form name="login" method="POST" action="{{ route('login') }}">
                    @csrf

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

                    <!-- remember and reset password -->
                    <div class="flex items-center justify-between mb-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Onthoud mijn gegevens</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" href="{{ route('password.request') }}">
                                Wachtwoord vergeten?
                            </a>
                        @endif
                    </div>

                    <!-- submit button -->
                    <div class="mb-4">
                        <button type="submit" class="w-full py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">
                            Inloggen
                        </button>
                    </div>

                    <!-- register link -->
                    @if (Route::has('register'))
                        <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                            Heb je nog geen account?
                            <a href="{{ route('register') }}" class="underline text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200">
                                Registreren
                            </a>
                        </p>
                    @endif
                </form>
            </section>
        </section>
    </div>
</x-app-layout>
