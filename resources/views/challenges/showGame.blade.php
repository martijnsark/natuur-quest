<x-app-layout>
    @foreach($game->roles as $role)
        <p>{{ $role->name }}</p>
        @foreach($game->users as $user)
            @if($role->id === $user->pivot->role_id)
                <p>{{ $user->name }}</p>
            @endif
        @endforeach
    @endforeach
</x-app-layout>
