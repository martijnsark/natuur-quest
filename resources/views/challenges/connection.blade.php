<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Spelers toevoegen</x-header-h1>
    </x-slot>

    <x-styling-arrow-right></x-styling-arrow-right>

    <div class="w-body">
        <x-card>
            <section aria-label="informatie" class="text-white text-center mt-16">
                <p class="font-text text-xl">Voeg de spelers toe aan de rollen die zij tijdens het spel op zich
                    nemen.</p>
            </section>

            <section aria-label="spelers invul form" class="text-center mt-5">
                <form class="flex-col flex gap-4" action="{{ route('challenges.start') }}" method="post">
                    @csrf
                    {{-- You can pick the users for the roles --}}
                    @foreach($roles as $role)
                        @if($role->id === 1)
                            <div>
                                {{--  Gameleader is logged-in user that is send with hidden field  --}}
                                <p class="block font-medium font-text text-lg text-white"> {{ $role->name }} </p>
                                <p class="text-white">{{ Auth::user()->name }}</p>
                                <input type="hidden" name="{{ $role->id }}" id="{{ $role->id }}"
                                       value="{{ Auth::user()->id }}">
                            </div>
                        @else
                            <div>
                                <x-input-label aria-labelledby="role" for="{{ $role->id }}" :value="$role->name"/>
                                <select class="bg-primary border-white text-white" name="{{ $role->id }}"
                                        id="{{ $role->id }}">
                                    @foreach($friends as $friend)

                                        <option value="{{ $friend->id }}">{{ $friend->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get($role->id)" class="mt-2"></x-input-error>
                            </div>
                        @endif
                    @endforeach

                    <div class="w-mainButton m-auto mt-10">
                        <x-form-button>Verstuur</x-form-button>
                    </div>
                </form>
            </section>
        </x-card>

    </div>

</x-app-layout>
