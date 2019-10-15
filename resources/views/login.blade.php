@extends('index')
@section('content')
<div class="container">
    <div class="login-page">
        <form class="text-center form-border p-5 mt-5" action="{{ route('SignIn') }}" id="send_form" method="POST">
            {{ csrf_field() }}
            <p class="h4 mb-4">Sign in</p>

            <input name="email" type="email" class="form-control mb-4" id="email" placeholder="E-mail" required>

            <input name="password" type="password"  class="form-control mb-4" placeholder="Password" required>

            <button class="login_btn mt-2" type="submit" id="submit">Login</button>
        </form>
    </div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/notify.js"></script>
<script>
    $('#send_form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: $('#send_form').attr('action'),
            type: "POST",
            data: $('#send_form').serialize(),
            success: function( response ) {
                if(response != 'false'){
                   $.notify('Login Success!', {
                        style: 'bootstrap',
                        className: 'success',
                        position:"right"
                    }); 
                    Cookies.set('UsersID', response);
                    $(location).attr('href', '/');
                }else{
                    $.notify('Login Fail!', {
                        style: 'bootstrap',
                        className: 'warning',
                        position:"right"
                    }); 
                }
            }
        });
    });

</script>
@endsection