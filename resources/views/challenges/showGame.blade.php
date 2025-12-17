<x-app-layout>

    <x-slot name="header">
        <x-header-h1>Spelers in het spel</x-header-h1>
    </x-slot>

    <x-styling-arrow-left></x-styling-arrow-left>
    <x-card>
        {{-- Loads all the players that are part of the game and places them at the role they have --}}
        <section aria-label="rol verdeling" class="text-center text-white flex flex-col gap-10 mt-10">
            @foreach($game->roles as $role)
                <article aria-label="{{ $role->name }}" class="mt-5 flex flex-col items-center gap-2">
                    <x-h2>{{ $role->name }}</x-h2>

                    @foreach($game->users as $user)
                        @if($role->id === $user->pivot->role_id)
                            <div class="flex flex-col justify-center gap-2">
                                <p class="font-text text-xl">{{ $user->name }}</p>

                                @if($role->name !== "Spelleider")
                                    @php
                                        $assignment = $game->assignments()
                                            ->where('user_id', $user->id)
                                            ->first();
                                    @endphp

                                        <!-- change button if invite is send to add score-->
                                    @if($assignment)
                                        <div class="w-popupButton flex">
                                            <!-- route "spel leider" to assign score page based on the assignments id-->
                                            <x-main-button
                                                href="{{ route('challenges.finish', ['challenge' => $assignment->id]) }}">
                                                Geef score
                                            </x-main-button>

                                        </div>
                                        {{-- Send the assignment to the player --}}
                                    @else
                                        <form action="{{ route('assignment.send')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <input type="hidden" name="game_id" value="{{ $game->id }}">
                                            <input type="hidden" name="role_id" value="{{ $user->pivot->role_id }}">

                                            <div class="w-popupButton flex">
                                                <x-form-button>
                                                    Stuur opdracht
                                                </x-form-button>
                                            </div>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        @endif
                    @endforeach
                </article>
            @endforeach
        </section>
    </x-card>
</x-app-layout>
