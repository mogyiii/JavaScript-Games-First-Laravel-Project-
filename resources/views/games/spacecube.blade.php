@extends('index')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('css/Star_Line.css') }}">
    <script src="{{ url('js/class/cube.js') }}"></script>
    <div id="wall">
        <img src="{{ url('img/game/StarShip/starship3.png') }}" class="starShip">
        <div class="Start-btn">Start</div>
    </div>
    <script src="{{ url('js/jquery-3.4.1.min.js') }}"></script>
    <script>
        $( document ).ready(function() {
            var end = false;
            var Cursor_Y;
            var Cursor_X;
            var i = 0;
            var array_obj = new Array();
            var height = $( document ).height();
            var width = $( document ).width();
            var starship = {
                width: $('.starShip').width(),
                height: $('.starShip').height(),
                X: $('.starShip').position().left,
                Y: $('.starShip').position().top,
                
                set set_Y(Ycord){
                    this.Y = Ycord;
                },
                set set_X(Xcord){
                    this.X = Xcord;
                },
                get get_X(){
                    return this.X;
                },
                get get_Y(){
                    return this.Y;
                },
                get get_Max_X(){
                    return (this.X + this.width);
                },
                get get_Max_Y(){
                    return (this.Y + this.height);
                }
            };
            $('body').css('cursor', 'none');
            $( document ).on( "mousemove", function( event ) {
                $('.starShip').css({'top': event.clientY - 0,  'left': event.clientX - 116});
                Cursor_Y = event.clientY;
                Cursor_X = event.clientX - 116;
                starship.set_Y = $('.starShip').position().top;
                starship.set_X = $('.starShip').position().left;
            }); 
            $( ".Start-btn" ).click(function() {
                $( ".Start-btn" ).remove();
                var run = setInterval(Runn, 1);
                function Runn(){
                    if(i%50==0){
                        array_obj.push(new cube(random_number(width,  0),-50, random_number(2, 4), i));
                        $("#wall").append("<div class='wave_cube' id=" + parseInt(array_obj[array_obj.length - 1].get_id_cube) + "></div>");
                    }
                    for(var j = 0; j < array_obj.length; j++){
                        array_obj[j].set_Y = parseInt(array_obj[j].get_Y) + parseInt(array_obj[j].get_speed);
                        $("#" + parseInt(array_obj[j].get_id_cube)).css({'top' : parseInt(array_obj[j].get_Y), 'left' : parseInt(array_obj[j].get_X)});
                        if(parseInt(array_obj[j].get_Y) > height + 50){
                            array_obj[j].set_Y = -50;
                            array_obj[j].set_X = random_number(width,  0);
                        }
                        if(!hitbox(parseInt(array_obj[j].get_X), parseInt(array_obj[j].get_Y))){
                            $("#" + parseInt(array_obj[j].get_id_cube)).css('background-color', 'white');
                            clearInterval(run);
                            alert("End");
                            break;
                        }
                    }
                    i++;
                }
            });
            function hitbox(X, Y){
                if ((starship.get_X >= (X + 2)) && (starship.get_X <= (X + 20)) || (starship.get_Max_X >= (X + 2)) && (starship.get_Max_X <= (X + 20))) {
                    if ((starship.get_Y >= (Y + 2)) && (starship.get_Y <= (Y + 20)) || (starship.get_Max_Y >= (Y + 2)) && (starship.get_Max_Y <= (Y + 20))) {
                        return false;
                    }
                }
                return true;
            }
            function random_number(max, min){
                return Math.floor((Math.random() * max) + min);
            }
        });

    </script>
@endsection