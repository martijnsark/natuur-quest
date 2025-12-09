<x-app-layout>
    <!-- Diagonal background like homepage -->
    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>

    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <section class="bg-white/80 dark:bg-gray-900/80 p-8 rounded-xl shadow-lg w-full max-w-md text-center">

            <!-- page header -->
            <header class="text-center">
                <x-header-h1 id="change-password-heading" class="text-4xl font-bold mb-4 font-heading text-black dark:text-white">
                    Wachtwoord vergeten
                </x-header-h1>

                <p class="mb-6 text-sm font-text text-gray-700 dark:text-gray-300">
                    Wachtwoord vergeten? Geen probleem. Laat ons uw e-mailadres weten en we sturen u een link om uw wachtwoord te resetten, waarmee u een nieuw wachtwoord kunt kiezen.
                </p>
            </header>

            <!-- session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- email -->
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

                <section aria-labelledby="Reset wachtwoord knop">
                    <x-primary-button class="w-full py-2">
                        Krijg email voor wachtwoord reset link
                    </x-primary-button>
                </section>

                <!-- back to login -->
                <section aria-labelledby="Knop naar login">
                    <div class="mt-4 text-sm">
                        <x-main-button href="{{ route('login') }}" class="underline text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200">
                            Terug naar inloggen
                        </x-main-button>
                    </div>
                </section>
            </form>
        </section>
    </div>
</x-app-layout>
