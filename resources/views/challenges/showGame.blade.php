<x-app-layout>

    <x-slot name="header">
        <x-header-h1>Spelers in het spel</x-header-h1>
    </x-slot>

    <x-styling-arrow-left></x-styling-arrow-left>

    {{-- Loads all the players that are part of the game and places them at the role they have --}}
    <section aria-label="rol verdeling" class="text-center text-white flex flex-col gap-10 mt-10">

        @php
            $authUser = auth()->user();
        @endphp

        @foreach($game->roles as $role)
            <article aria-label="{{ $role->name }}" class="mt-5 flex flex-col gap-2">
                <x-h2>{{ $role->name }}</x-h2>

                {{-- ✅ Spelleider-knop: ALLEEN zichtbaar voor de ingelogde spelleider --}}
                @php
                    $authPivot = $game->users
                        ->firstWhere('id', optional($authUser)->id)
                        ?->pivot;

                    $isReferee = $authPivot
                        && $authPivot->role_id === $role->id
                        && $role->name === "Spelleider";
                @endphp

                @if($isReferee)
                    <div class="w-popupButton m-auto mt-4">
                        <x-main-button href="{{ route('test.judgePhotos', ['game' => $game->id]) }}">
                            Beoordeel foto’s
                        </x-main-button>
                    </div>
                @endif

                {{-- Alle users per rol --}}
                @foreach($game->users as $user)
                    @if($role->id === $user->pivot->role_id)
                        <div class="flex flex-col gap-2">
                            <p class="font-text text-xl">{{ $user->name }}</p>

                            {{-- Spelers (geen spelleider) --}}
                            @if($role->name !== "Spelleider")
                                @php
                                    $assignment = $game->assignments()
                                        ->where('user_id', $user->id)
                                        ->first();
                                @endphp

                                {{-- Als assignment bestaat → geef score --}}
                                @if($assignment)
                                    <div class="w-popupButton m-auto">
                                        <x-main-button href="{{ route('challenges.finish', ['challenge' => $assignment->id]) }}">
                                            Geef score
                                        </x-main-button>
                                    </div>

                                    {{-- Anders: stuur opdracht --}}
                                @else
                                    <form action="{{ route('assignment.send') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="game_id" value="{{ $game->id }}">
                                        <input type="hidden" name="role_id" value="{{ $user->pivot->role_id }}">

                                        <div class="w-popupButton m-auto">
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
</x-app-layout>
