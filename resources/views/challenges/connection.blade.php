<x-app-layout>
    <form action="{{ route('test.name') }}" method="post">
        @csrf
        @foreach($roles as $role)
            <x-input-label for="{{ $role->id }}" :value="__('{{$role->name}}')"/>
            <select name="{{ $role->id }}" id="{{ $role->id }}">
                @foreach($friends as $friend)
                    <option value="{{ $friend->id }}">{{ $friend->name }}</option>
                @endforeach
            </select>
        @endforeach

        <x-form-button>Send</x-form-button>

    </form>
</x-app-layout>
