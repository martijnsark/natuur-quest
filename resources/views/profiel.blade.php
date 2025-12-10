<x-app-layout>
    <!-- diagonal background like homepage -->
    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>

    <!-- div to focus form center of screen -->
    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <section aria-labelledby="Gebruiker data" class="bg-white/80 dark:bg-gray-900/80 p-8 rounded-xl shadow-lg w-full max-w-md text-center">

            <!-- page header -->
            <header class="text-center">
                <x-header-h1 id="login-heading" class="text-4xl font-bold mb-4 font-heading text-black dark:text-white">
                    Account pagina
                </x-header-h1>

                <p class="font-text text-lg mb-6 text-gray-800 dark:text-gray-300">
                    Welkom, {{ auth()->user()->name }}
                </p>
            </header>


            <form method="POST" action=" {{route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary text-gray-400">
                    logout
                </button>
            </form>

        </section>
    </div>


</x-app-layout>
