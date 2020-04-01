<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Art4You · Contacto</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Heebo&display=swap" rel="stylesheet">
    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/5.*/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/contacto.css')}}">

</head>

<body>
    <header>
        <!--         login i registro-->
        <div class="row float-right mr-5 mt-4">
            <div class="col-md-12">
                @if (Auth::check())
                <div class="btn-group mr-3">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/home"><i class="fas fa-cog"></i> Configuración</a>

                    </div>
                </div>
                @else
                <span tooltip="Iniciar Sesión" flow="down"><a href="/login" style="color:black"><i class="fas fa-sign-in-alt fa-lg icon" style="padding-right:15px"></i></a></span>
                <span tooltip="Registro" flow="down"><a href="/register" style="color:black"><i class="fas fa-door-open fa-lg icon"></i></a></span>
                @endif
            </div>
        </div>
        <!--    END      login i registro-->
        <div class="container partsuperior mt-3">
            <div class="row">
                <div class="col-md-3 d-inline col-xs-1 col-sm-1 col-xl-6 col-lg-4">
                    <a href="/"><img src="{{asset('img/logooficial.png')}}" alt="" style="width:130px;heigth:25px;"></a>
                </div>
                <div class="buscador topLeftBorders col-md-9 d-inline mt-4 col-sm-12 col-xl-6 col-lg-8 col-xs-11 d-flex ">
                    <a class="buscadorlletres" href="/obras" style="color:black">
                        <p>Obras</p>
                    </a>
                    <a class="buscadorlletres" href="/artistas" style="color:black">
                        <p>Artistas</p>
                    </a>
                    <a class="buscadorlletres" href="/contacto" style="color:black">
                        <p>Contacto</p>
                    </a>
                    <a class="buscadorlletres" href="/nosotros" style="color:black">
                        <p>Nosotros</p>
                    </a>
                    <a class="buscadorlletres" href="/carro" style="color:black">
                        <p>Carro
                            @if(Cart::instance('default')->count() > 0)
                            <span class="badge">{{Cart::instance('default')->content()->count()}}</span>
                            @endif
                        </p>
                    </a>
                </div>
            </div>
        </div>

        <!-- breadcrum -->
        <div class="page__section mb-5">
            <nav class="breadcrumb breadcrumb_type5" aria-label="Breadcrumb">
                <ol class="breadcrumb__list r-list ml-5">
                    <li class="breadcrumb__group">
                        <a href="/" class="breadcrumb__point r-link">Home</a>
                        <span class="breadcrumb__divider" aria-hidden="true">›</span>
                    </li>

                    <li class="breadcrumb__group">
                        <span class="breadcrumb__point" aria-current="page">Contacto</span>
                    </li>

                </ol>
            </nav>
        </div>
        <!-- endbreadcrum -->
    </header>

    <div class="container ">
        <div class="row">
            <div class="col-xl-12 resultats">
                <h1 class="ml11 text-center">
                    <span class="text-wrapper">
                        <span class="line line1"></span>
                        <span class="letters mx-auto">Contacto</span>
                    </span>
                </h1>
            </div>
        </div>


        <div class="row mt-5 mb-5">
            <div class="float-left col-xl-6 col-md-6 ">
                @if(Session::has('flash_message'))
                <div class="alert alert-success">{{Session::get('flash_message')}}</div>
                @endif
                <form class="form-horizontal" role="form" method="post" action="{{ route('contacto.store') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-sm-12" style="padding:0px">
                            <input type="text" class="form-control" id="name" placeholder="Nombre" name="nombre" value="">
                            @if($errors->has('nombre'))
                            <small class="form-text invalid-feedback">{{$errors->first('nombre')}} </small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12" style="padding:0px">
                            <input type="email" class="form-control" id="email" placeholder="Correo" name="email" value="">
                            @if($errors->has('email'))
                            <small class="form-text invalid-feedback">{{$errors->first('email')}} </small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12" style="padding:0px">
                            <input type="number" class="form-control" id="mobile" placeholder="Teléfono" name="telefono" value="">
                            @if($errors->has('telefono'))
                            <small class="form-text invalid-feedback">{{$errors->first('email')}} </small>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12 form-group" style="padding:0px">
                        <textarea class="form-control" rows="10" placeholder="Pon tu texto aquí" name="message"></textarea>
                        @if($errors->has('message'))
                        <small class="form-text invalid-feedback">{{$errors->first('message')}} </small>
                        @endif
                    </div>

                    <div class="col-sm-12" style="padding:0px;display:flex">
                        <button class="btn btn-warning send-button justify-content-center d-flex" id="submit" type="submit" value="SEND">
                            <div class="button">
                                <i class="fa fa-paper-plane "></i><span class="send-text">ENVIAR</span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>

            <div class="float-right col-xl-6 col-md-6 mt-5" style="padding-left:100px ">
                <table style="margin-left:-40px">
                    <tr>
                        <td><i class="fa fa-map-marker fa-2x"></i></td>
                        <td><span class="contact-text place">Vic | Cat</span></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-phone fa-2x"></i></td>
                        <td><span class="contact-text phone" style="padding-left:53px">633 811 729</span></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-envelope fa-2x"></i></td>
                        <td><span class="contact-text gmail">bieldg99@gmail.com</span></td>
                    </tr>
                </table>

            </div>

        </div>
    </div>


    @include('layouts.footer');

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    anime.timeline({
            loop: false
        })
        .add({
            targets: '.ml5 .line',
            opacity: [0.5, 1],
            scaleX: [0, 1],
            easing: "easeInOutExpo",
            duration: 700
        }).add({
            targets: '.ml5 .line',
            duration: 600,
            easing: "easeOutExpo",
            translateY: (el, i) => (-0.625 + 0.625 * 2 * i) + "em"
        }).add({
            targets: '.ml5 .ampersand',
            opacity: [0, 1],
            scaleY: [0.5, 1],
            easing: "easeOutExpo",
            duration: 600,
            offset: '-=600'
        }).add({
            targets: '.ml5 .letters-left',
            opacity: [0, 1],
            translateX: ["0.5em", 0],
            easing: "easeOutExpo",
            duration: 600,
            offset: '-=300'
        }).add({
            targets: '.ml5 .letters-right',
            opacity: [0, 1],
            translateX: ["-0.5em", 0],
            easing: "easeOutExpo",
            duration: 600,
            offset: '-=600'
        }).add({
            targets: '.ml5',
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });

    var textWrapper = document.querySelector('.ml11 .letters');
    textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

    anime.timeline({
            loop: false
        })
        .add({
            targets: '.ml11 .line',
            scaleY: [0, 1],
            opacity: [0.5, 1],
            easing: "easeOutExpo",
            duration: 700
        })
        .add({
            targets: '.ml11 .line',
            translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
            easing: "easeOutExpo",
            duration: 700,
            delay: 100
        }).add({
            targets: '.ml11 .letter',
            opacity: [0, 1],
            easing: "easeOutExpo",
            duration: 600,
            offset: '-=775',
            delay: (el, i) => 34 * (i + 1)
        }).add({
            targets: '.ml11',
            opacity: 1,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000
        });
</script>

</html>