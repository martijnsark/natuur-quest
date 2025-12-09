<x-app-layout>
    <!-- diagonal background like homepage -->
    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>

    <!-- div to focus form center of screen -->
    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <section aria-labelledby="Login formulier" class="bg-white/80 dark:bg-gray-900/80 p-8 rounded-xl shadow-lg w-full max-w-md text-center">

            <!-- page header -->
            <header class="text-center">
                <h1 id="login-heading" class="text-4xl font-bold mb-4 font-heading text-black dark:text-white">
                    Inloggen
                </h1>

                <p class="font-text text-lg mb-6 text-gray-800 dark:text-gray-300">
                    Welkom, log in om games te gaan spelen!
                </p>
            </header>

            <!-- session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
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

                <!-- remember me -->
                <div class="flex items-center justify-between mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Onthoud mij</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" href="{{ route('password.request') }}">
                           Wachtwoord vergeten?
                        </a>
                    @endif
                </div>

                <!-- submit -->
                <x-primary-button class="w-full py-2">
                    Inloggen
                </x-primary-button>

                <!-- register Link -->
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
    </div>

</x-app-layout>
