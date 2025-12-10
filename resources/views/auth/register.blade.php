<x-app-layout>
    <!-- diagonal background like homepage -->
    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>

    <!-- div to focus form center of screen -->
    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <section aria-labelledby="Registratie formulier" class="bg-white/80 dark:bg-gray-900/80 p-8 rounded-xl shadow-lg w-full max-w-md text-center">

            <!-- page header -->
            <header class="text-center">
                <x-header-h1 id="register-heading" class="text-4xl font-bold mb-4 font-heading text-black dark:text-white">
                    Registreren
                </x-header-h1>

                <p class="font-text text-lg mb-6 text-gray-800 dark:text-gray-300">
                    Creëer jouw account en begin met Natuur Quest!
                </p>
            </header>

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

                <!-- confirm Password -->
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

                <!-- submit -->
                <section aria-labelledby="Registreer knop">
                    <x-primary-button class="w-full py-2">
                        Registreer
                    </x-primary-button>
                </section>

                <!-- login Link -->
                <section aria-labelledby="Knop naar login">
                    @if (Route::has('login'))
                        <p class="mt-4 text-sm text-gray-700 dark:text-gray-300">
                            Heb je al een account?
                            <a href="{{ route('login') }}" class="underline text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200">
                                Log in
                            </a>
                        </p>
                    @endif
                </section>
            </form>
        </section>
    </div>
</x-app-layout>
