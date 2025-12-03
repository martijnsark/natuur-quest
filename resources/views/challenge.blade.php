<x-app-layout>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="chat">
        <img src="/images/empty-profile-picture.png" alt="Avatar">
        <div class="top">
            <p>Gebruiker 1</p>
            <small>online</small>
        </div>

        <div class="messages">
            @include('receive', ['message' => "Hey"])
        </div>

        <div class="bottom">
            <form>
                <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                <input type="submit">
            </form>
        </div>
    </div>

    <script>
        const pusher = new Pusher('{{ config("broadcasting.connections.pusher.key") }}', {
            forceTLS: true
        });
        const channel = pusher.subscribe('public');

        channel.bind('chat', function (data) {
            $.post("/receive", {
                _token: '{{csrf_token()}}',
                message: data.message
            }).done(function (res) {
                $(".messages").append(res);
                $(document).scrollTop($(document).height());
            });
        });

        $("form").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "/broadcast",
                method: 'POST',
                headers: {
                    'X-Socket-Id': pusher.connection.socket_id
                },
                data: {
                    _token: '{{csrf_token()}}',
                    message: $("#message").val(),
                }
            }).done(function (res) {
                $(".messages > .message").last().after(res);
                $("#message").val('');
                $(document).scrollTop($(document).height());
            });
        });
    </script>
</x-app-layout>
