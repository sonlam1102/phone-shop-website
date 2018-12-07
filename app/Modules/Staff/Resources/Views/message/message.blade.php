@extends('staff::index')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Chat với khách hàng </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

    <form method="POST" action="/staff/message/push" id="message_form">
        @csrf
        <select id="channel" name="channel">
            <option value="-----" selected> ---------- </option>
            @foreach($channel as $item)
                <option value="{{ $item->channel }}"> {{ $item->user->fullname() }} </option>
            @endforeach
        </select>

        <textarea class="container" rows="20" id="content" disabled>

        </textarea>
        <p> Nhập nội dung: </p>
        <input class="container" id="input" name="message">
        <br>
        <button type="submit" class="btn btn-info"> Gửi </button>
    </form>
    </div>
</div>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script>
    $("#message_form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "/staff/message/push/",
            data: $("#message_form").serialize(),
            method: 'POST',
            success: function (response) {
                $("#input").val("");
            }
        });
    });
    let current_channel = $("#channel").find(":selected").val();
    Pusher.logToConsole = true;

    let pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: 'ap1',
        forceTLS: true
    });

    $("#channel").on('change', function() {
        current_channel = $(this).find(":selected").val();
        let channel = pusher.subscribe('UserMessageBroadcasting');
        channel.bind(current_channel, function(data) {
            $("#content").append(data.user + ": " + data.message + "\n");
        });
    });

</script>
@endsection
