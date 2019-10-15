@extends('index')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container">
    <div class="login-page">
        <form class="text-center form-border p-5 mt-5" action="{{ route('SignUp') }}" id="send_form" method="POST">
            {{ csrf_field() }}
            <p class="h4 mb-4">Sign up</p>

            <input name="username" type="text" class="form-control mb-4" id="name" placeholder="Username" required>

            <input name="email" type="email" class="form-control mb-4" id="email" placeholder="E-mail" required>

            <input name="password" type="password"  class="form-control mb-4" placeholder="Password" required>

            <input name="re_password" type="password" class="form-control mb-4" placeholder="Re_Password" required>

            <div class="d-flex justify-content-around">Do you have account? <a href="{{ url('/login') }}">Login it</a></div>
            <button class="login_btn mt-2" type="submit" name="submit" id="submit">Sign up</button>
        </form>
    </div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/notify.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        
    });
    $('#email').focusout(function(event) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post({
			url: "{{ route('Emailcheck') }}",
			data: {
                _token: CSRF_TOKEN,
				email: $('#email').val()
			},
			success: function(output) {
                if (output == "true") {
                    $.notify('Email is already taken!', {
                        style: 'bootstrap',
                        className: 'error',
                        position:"right"
                    });
                    $('#submit').prop('disabled', true);
                    $('#email').css("color","red !important");
                }else{
	   				$('#email').css("color","black !important");
	   				$('#submit').prop('disabled', false);
                }
			}
		});
    });
    $('#name').focusout(function(event) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post({
			url: "{{ route('Usernamecheck') }}",
			data: {
                _token: CSRF_TOKEN,
				username: $('#name').val()
			},
			success: function(output) {
                if (output == "true") {
                    $.notify('Username is already taken!', {
                        style: 'bootstrap',
                        className: 'error',
                        position:"right"
                    });
                    $('#name').css("color","red !important");
                    $('#submit').prop('disabled', true);
                }else{
	   				$('#name').css("color","black !important");
	   				$('#submit').prop('disabled', false);
                }
			}
		});
    });
    $('#send_form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: $('#send_form').attr('action'),
            type: "POST",
            data: $('#send_form').serialize(),
            success: function( response ) {
                $.notify(response, {
                    style: 'bootstrap',
                    className: 'info',
                    position:"right"
                });
            }
        });
    });

</script>
@endsection