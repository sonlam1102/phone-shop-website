<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Điện thoại Online </title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="/css/style.css" rel="stylesheet" />
    <link href="/css/main.css" rel="stylesheet" />
    <link href="/css/mislider.css" rel="stylesheet">
    <link href="/css/mislider-skin-cameo.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Company and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><strong>Điện thoại Online</strong></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
    <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <input type="text" id="channel" value="{{ $channel->channel }}" hidden>
        <input type="text" id="channel_id" value="{{ $channel->id }}" hidden>
        <form method="POST" action="/customer/message/push" id="message_form">
            @csrf
            <textarea class="container" rows="20" id="content" disabled></textarea>
            <p> Nhập nội dung: </p>
            <input class="container" id="input" name="message">
            <br>
            <button type="submit" class="btn btn-info"> Gửi </button>
        </form>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<!--Footer -->
@include('layouts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>
<script src="/js/mislider.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<!-- receive notifications -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>

<script>
    $(document).ready(function () {
        $.ajax({
            url: "/customer/message/" + $("#channel_id").val() + "/message",
            method: 'GET',
            dataType: "json",
            success: function (data) {
                $("#content").html("");
                for (let i=0; i< data.length; i++) {
                    $("#content").append(data[i].user + ": " + data[i].message + "\n");
                }
            }
        });

        $("#message_form").submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "/customer/message/push",
                method: 'POST',
                data: $("#message_form").serialize(),
                success: function (response) {
                    $("#input").val("");
                }
            });
        });

        Pusher.logToConsole = true;

        let pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: 'ap1',
            forceTLS: true
        });

        let channel = pusher.subscribe('UserMessageBroadcasting');

        channel.bind($("#channel").val(), function(data) {
            $("#content").append(data.user + ": " + data.message + "\n");
        });
    })
</script>
</body>
</html>
