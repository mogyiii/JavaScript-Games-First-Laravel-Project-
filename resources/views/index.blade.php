<html lang="{{ app()->getLocale() }}">
    <head>
        <!--META-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="{{ url('img/favicon.ico') }}" type="image/x-icon" />
        <title>Javascript Játékok</title>
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="{{ url('css/Main_page_style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/HighScore.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/Forms.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!--JS-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/6096ca5492.js"></script>
        <script src="{{ url('js/jquery-3.4.1.min.js') }}"></script>
        <script>
            $( document ).ready(function() {
                
            });
        </script>
    </head>
<body>
    <div class="Menu">
        <a href="{{ url('/') }}">
            <div class="logo">
                <i class="fab fa-js"></i>
            </div>
        </a>
        <a href="{{ url('/list') }}">
            <div class="menu-btn">
                <i class="fas fa-list"></i>
            </div>
        </a>
        <a href="{{ url('/highscore') }}">
            <div class="menu-btn">
                <i class="fas fa-star-half-alt"></i>
            </div>
        </a>
        @if(!session('UsersID'))
            <a href="{{ url('/register') }}">
                <div class="menu-btn">
                    <i class="fas fa-user"></i>
                </div>
            </a>
        @endif
        
    </div>
    <div class="container-content">
        @yield('content')
    </div>
    
</body>
</html>