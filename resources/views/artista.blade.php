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
    <link rel="stylesheet" href="{{asset('css/artista.css')}}">

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
                        <a class="dropdown-item" href="/home">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Salir</a>
                    </div>
                </div>
                @else
                <span tooltip="Eres un artista?" flow="down"><a href="/eresartista" style="color:black"><i class="fas fa-paint-brush fa-lg icon" style="padding-right:15px"></i></a></span>
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
                        <a href="/artistas" class="breadcrumb__point r-link">Artistas</a>
                        <span class="breadcrumb__divider" aria-hidden="true">›</span>
                    </li>
                    <li class="breadcrumb__group">
                        <span class="breadcrumb__point" aria-current="page">{{$artista->nomcomplert}}</span>
                    </li>

                </ol>
            </nav>
        </div>
        <!-- endbreadcrum -->
    </header>

    <div class="container">
        <div class="row">
            <div class="col-xl-5 justify-content-center d-flex">
                <figure class="snip1344 "><img src="{{asset('storage/'.$artista->imgArtista)}}" alt="profile-sample1" class="background" /><img src="{{asset('storage/'.$artista->imgArtista)}}" class="profile" />
                    <figcaption>
                        <h3>{{$artista->nomcomplert}}<span><i style="font-size: 1rem;" class=" fas fa-map-pin"></i>{{$artista->localitat}}</span><span><i style="font-size: 1rem;" class="fas fa-phone-square"></i>{{$artista->telefon}}</span></h3>
                        <div class="icons"><a href="#"><i class="ion-social-reddit-outline"></i></a><a href="#"> <i class="ion-social-twitter-outline"></i></a><a href="#"> <i class="ion-social-vimeo-outline"></i></a></div>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xl-6 textdescriptiu mt-4 ">
                <p>{{$artista->textDescriptiu}}</p>
            </div>
        </div>
        <div class="line mt-5"></div>
        <div class="row title mt-5 ml-3 mb-5">
            <h4>Trabajos de {{$artista->nomcomplert}}</h4>
        </div>
        <div class="row mb-5">
            @foreach($artistaForeing as $producteArtista)
            @if($producteArtista->nomcomplert == $artista->nomcomplert)
            <div class="producte col-lg-6 col-xl-4 col-sm-6 mb-5">
                <a style="margin-left:0px" href="{{route('product', $producteArtista->titol)}}"><img src="{{asset('storage/'.$producteArtista->img)}}" class="img-fluid rounded mx-auto cuadrosartistas"></a>
                <div class="row mx-auto">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-xl-12 col-lg-12 ">
                        <p class="textproducte" style="margin-top:10px">{{$producteArtista->alt}} x {{$producteArtista->ample}} x {{$producteArtista->profunditat}} cm</p>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-md-12  col-xs-12 col-sm-12 col-xl-12 col-lg-12 NOM mt-0">
                        <p class="textproducte" style="margin-top:-10px;"><a style="margin-left:0px;text-decoration:none;color:black" href="{{route('product', $producteArtista->titol)}}">{{$producteArtista->titol}}</a></p>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-xl-12 col-lg-12  NOM mt-0">
                        <p class="textproducte" style="margin-top:-10px">{{$producteArtista->preu}} €</p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </div>

    @include('layouts.footer');


</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<!-- BOOSTRAP SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(".hover").mouseleave(
        function() {
            $(this).removeClass("hover");
        }
    );


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