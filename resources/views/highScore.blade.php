@extends('index')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container">
        <div class="row justify-content-center">
            <div class="login-page">
                <form class="text-center form-border p-5 mt-5" action="{{ route('getHighScore') }}" id="send_form" method="POST">
                    {{ csrf_field() }}
                    <p class="h4 mb-4">HighScore</p>
                    <select name="getGame">
                    @foreach($games as $game)
                         <option value="{{ ($game->GameName)}}">{{ ($game->GameName)}}</option>
                    @endforeach
                    </select> 
                    <input class="login_btn mt-2" type="submit" id="submit" value="Search">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="content_HighScore form-border"></div>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script>
        $('#send_form').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: $('#send_form').attr('action'),
                type: "POST",
                data: $('#send_form').serialize(),
                success: function( response ) {
                    response = $.parseHTML(response); 
                    $(".content_HighScore").empty().append(response)
                }
            });
        });
    </script>
@endsection