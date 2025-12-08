<x-app-layout>
    <x-input-label for="player_one" :value="__('Speler 1')"/>
    <select name="game_id" id="game_id">
        @foreach($friends as $friend)
            <option value="{{ $friend->id }}">{{ $friend->name }}</option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('game_id')" class="mt-2"/>
</x-app-layout>
