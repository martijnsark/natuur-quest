<x-app-layout>

    <x-slot name="header">
        <x-header-h1>Spelers in het spel</x-header-h1>
    </x-slot>

    <x-styling-arrow-left></x-styling-arrow-left>

    {{-- Loads all the players that are part of the game and places them at the role they have --}}
    <section aria-label="rol verdeling" class="text-center text-white flex flex-col gap-10 mt-10">
        @foreach($game->roles as $role)
            <article aria-label="{{ $role->name }}" class="mt-5 flex flex-col gap-2">
                <x-h2>{{ $role->name }}</x-h2>
                @foreach($game->users as $user)
                    @if($role->id === $user->pivot->role_id)
                        <div class="flex flex-col gap-2">
                            <p class="font-text text-xl">{{ $user->name }}</p>
                            @if($role->name !== "Spelleider")
                                <form action="{{ route('assignment.send')}}" method="post">
                                    @csrf
                                    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                                    <input type="hidden" id="game_id" name="game_id" value="{{ $game->id }}">
                                    <input type="hidden" id="role_id" name="role_id"
                                           value="{{ $user->pivot->role_id }}">

                                    {{-- Send the assignment to the player --}}
                                    <div class="w-popupButton m-auto">
                                        <x-form-button>
                                            Stuur opdracht
                                        </x-form-button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    @endif
                @endforeach
            </article>
        @endforeach
    </section>
</x-app-layout>
