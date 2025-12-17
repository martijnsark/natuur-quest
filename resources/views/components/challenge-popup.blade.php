@auth
    @if(!empty($assignment))
        {{-- if there is a assignment it fills the popup --}}
        <section class="flex flex-col gap-4 bg-primary text-white w-popup
            m-auto rounded-2xl p-4 text-center border-black border-2 mb-2">
            <x-h3>Je hebt een opdracht!</x-h3>
            <div class="flex gap-4 justify-center">
                {{-- Makes sure that te person who is player 1 is on this side --}}
                @if($assignment->role->name === "Speler 1")
                    <p>{{ $assignment->user->name }}</p>
                @else
                    <p>{{ App\Models\User::find($assignment->game->roles[1]->pivot->user_id)->name }}</p>
                @endif
                <p>VS</p>
                {{-- Makes sure that te person who is player 2 is on this side --}}
                @if($assignment->role->name === "Speler 2")
                    <p>{{ $assignment->user->name }}</p>
                @else
                    <p>{{ App\Models\User::find($assignment->game->roles[2]->pivot->user_id)->name }}</p>
                @endif
            </div>
            {{-- Route to the challenge index that sends the assignment id --}}
            <div class="w-popupButton m-auto">
                <x-main-button :href="route('challenges.show', $assignment->id)">Voer uit</x-main-button>
            </div>
        </section>
    @endif
@endauth
