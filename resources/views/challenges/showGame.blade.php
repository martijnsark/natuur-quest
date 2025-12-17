<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Spelers in het spel</x-header-h1>
    </x-slot>

    <x-styling-arrow-left></x-styling-arrow-left>

    <x-card>
        {{-- Overzicht van rollen + spelers in deze game.
             Spelleider ziet extra knop: "Beoordeel foto’s" --}}
        <section aria-label="rol verdeling" class="text-center text-white flex flex-col gap-10 mt-10">

            @php
                // Ingelogde gebruiker (kan speler of spelleider zijn)
                $authUser = auth()->user();

                // Pivot van ingelogde gebruiker in deze game (role_id komt uit user_game_role)
                $authPivot = $game->users
                    ->firstWhere('id', optional($authUser)->id)
                    ?->pivot;
            @endphp

            @foreach($game->roles as $role)
                <article aria-label="{{ $role->name }}" class="mt-5 flex flex-col items-center gap-2">
                    <x-h2>{{ $role->name }}</x-h2>

                    @php
                        // Alleen de ingelogde spelleider ziet de beoordelingsknop
                        $isReferee =
                            $authPivot &&
                            (int)$authPivot->role_id === (int)$role->id &&
                            $role->name === 'Spelleider';
                    @endphp

                    @if($isReferee)
                        <div class="w-popupButton flex mt-4">
                            <x-main-button href="{{ route('test.judgePhotos', ['game' => $game->id]) }}">
                                Beoordeel foto’s
                            </x-main-button>
                        </div>
                    @endif

                    {{-- Toon alle users die deze rol hebben (via pivot role_id) --}}
                    @foreach($game->users as $user)
                        @if((int)$role->id === (int)$user->pivot->role_id)
                            <div class="flex flex-col justify-center gap-2">
                                <p class="font-text text-xl">{{ $user->name }}</p>

                                {{-- Alleen voor spelers (niet voor spelleider) tonen we "Stuur opdracht" / "Geef score" --}}
                                @if($role->name !== "Spelleider")
                                    @php
                                        // Bestaat er al een assignment voor deze user in dit game?
                                        $assignment = $game->assignments()
                                            ->where('user_id', $user->id)
                                            ->first();
                                    @endphp

                                    {{-- Als assignment bestaat → "Geef score" --}}
                                    @if($assignment)
                                        <div class="w-popupButton flex">
                                            <x-main-button href="{{ route('challenges.finish', ['challenge' => $assignment->id]) }}">
                                                Geef score
                                            </x-main-button>
                                        </div>
                                    @else
                                        {{-- Anders → "Stuur opdracht" --}}
                                        <form action="{{ route('assignment.send') }}" method="post">
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
        {{-- 🔴 STOP SPEL – simpele knop naar homepage --}}
        <div class="mt-12 border-t border-white/20 pt-8 flex justify-center">
            <a
                href="{{ route('home') }}"
                class="inline-flex items-center justify-center
                       rounded-md bg-red-600 px-6 py-3
                       text-white font-extrabold text-lg
                       hover:bg-red-700 transition
                       focus:outline-none focus:ring-4 focus:ring-red-400/40 w-96"
            >
                Stop het spel!!!
            </a>
        </div>
    </x-card>
    </div>
</x-app-layout>
