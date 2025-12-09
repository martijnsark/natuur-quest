<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Spelers toevoegen</x-header-h1>
    </x-slot>

    <x-styling-arrow-right></x-styling-arrow-right>

    <section class="text-white text-center mt-16">
        <p class="font-text text-xl">Voeg de spelers toe aan de rollen die deze persoon in zal nemen tijdens het
            spel.</p>
    </section>

    <section class="text-center mt-10">
        <form class="flex-col flex gap-4" action="{{ route('test.name') }}" method="post">
            @csrf
            {{-- You can pick the users for the roles --}}
            @foreach($roles as $role)
                <div>
                    <x-input-label for="{{ $role->id }}" :value="$role->name"/>
                    <select class="bg-primary border-white text-white" name="{{ $role->id }}" id="{{ $role->id }}">
                        @foreach($friends as $friend)
                            <option value="{{ $friend->id }}">{{ $friend->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach
            <div class="w-mainButton m-auto mt-10">
                <x-form-button>Send</x-form-button>
            </div>
        </form>
    </section>

</x-app-layout>
