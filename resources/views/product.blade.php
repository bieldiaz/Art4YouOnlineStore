<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Art4You · {{$product->titol}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Heebo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/5.*/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/product.css')}}">
    <!-- ZOOM -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/magiczoom.css')}}" />
    <script type="text/javascript" src="{{URL::asset('js/magiczoom.js') }}"></script>
</head>

<body>
    <header>
        @include('cookieConsent::index')

        <!--         login i registro-->
        <div class="row float-right mr-5 mt-4">
            <div class="col-md-12">
                @if (Auth::check())
                <div class="col-auto btn-group ">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/home"><i class="fas fa-cog"></i> Configuración</a>
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
                    <a class="buscadorlletres" href="/artistas" style="color:black">
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
                        <a href="/obras" class="breadcrumb__point r-link">Obras</a>
                        <span class="breadcrumb__divider" aria-hidden="true">›</span>
                    </li>
                    <li class="breadcrumb__group">
                        <span class="breadcrumb__point" aria-current="page">{{$product->titol}}</span>
                    </li>

                </ol>
            </nav>
        </div>
        <!-- endbreadcrum -->
    </header>

    <div class="container mb-4">
        <div class="row pintor mb-5">
            <div class="col-xl-6 col-md-6 col-sm-5  col-xs-2 display-inline-block  mt-5 mb-3 float-left">
                <?php $contador = 1; ?>
                @foreach($artistaForeing as $artistanom)
                @if($artistanom->id_artista == $product->id_artista && $contador==1)
                <a href="{{route('artista.show', $artistanom->nomcomplert)}}" class="nompintor">
                    {{$artistanom->nomcomplert}}
                    <?php $contador++; ?>
                </a>
                @endif
                @endforeach
            </div>
            <div class="imatge-dreta col-xl-6 col-md-6 col-sm-6 col-xs-6 display-inline-block mt-3 mb-3 float-right">
                <?php $contadorFoto = 0; ?>
                @foreach($artistaForeing as $producteArtista)
                @if($product->id_artista == $producteArtista->id_artista && $contadorFoto!=3)
                <a href="{{route('product', $producteArtista->titol)}}" class="nompintor">
                    <img src="{{asset('storage/'.$producteArtista->img)}}" alt="" id="cuadroartistas" class="float-right ml-2">
                </a>
                <?php $contadorFoto++; ?>

                @endif
                @endforeach

            </div>
        </div>

        <div class="row producte mb-5">
            <div class="col-xl-6 col-lg-6 col-md-7 col-sm-auto col-xs-6 fotografia">
                <a href="{{asset('storage/'.$product->img)}}" class="MagicZoom"><img src="{{asset('storage/'.$product->img)}}"></a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6  col-xs-6">
                <div class="row mb-4">
                    <div class="col">
                        <h3 class="nomcuadro" style="color:#787878">{{$product->titol}}</h3>
                    </div>
                </div>
                <div class="row mb-5 ">
                    <div class="col">
                        <h3 class="preu" style="color:#787878">{{$product->preu}}€</h3>
                    </div>
                </div>
                <div class="liniapreu mb-5"></div>

                <div class="row">
                    <h5 style="color:#787878;margin-left:5px">Información adicional</h5>
                </div>
                <div class="row ">
                    <table class="tauladescripcio table table-striped">
                        <tr>
                            <td>Tecnica</td>
                            <td>{{$product->tecnica}}</td>
                        </tr>
                        <tr>
                            <td>Estilo</td>
                            <td>{{$product->estilo}}</td>
                        </tr>
                        <tr>
                            <td>Año</td>
                            <td>{{$product->any}}</td>
                        </tr>
                        <tr>
                            <td>Alto</td>
                            <td>{{$product->alt}}</td>
                        </tr>
                        <tr>
                            <td>Ancho</td>
                            <td>{{$product->ample}}</td>
                        </tr>
                        <tr>
                            <td>Profundidad</td>
                            <td>{{$product->profunditat}}</td>
                        </tr>

                    </table>
                </div>
                @if(is_null($product->vendido))

                <div class="row justify-content-center d-flex">
                    <form action="{{route('carro.store', $product)}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$product->id_producte}}" required>
                        <input type="hidden" name="titol" value="{{$product->titol}}" required>
                        <input type="hidden" name="preu" value="{{$product->preu}}" required>
                        <input type="hidden" name="img" value="{{$product->img}}">

                        <button type="submit" class="snip1535">Añadir al carro</button>
                    </form>
                </div>
                @else
                <div class="w3-panel w3-red">
                    <h3>No disponible!</h3>
                    <p>Esta obra ha sido vendida, actualmente no està disponible.</p>
                </div>
                @endif

            </div>
        </div>
        <!-- END PRODUCT -->
        <div class="liniapreu mb-5"></div> <!-- LINIA SEPARADORA -->
        <div class="row " class="otrasobras">
            <div class="col-xl-12">
                <h3>Otras obras que te podrian interesar</h3>
            </div>
            @foreach($productosAlsoLike as $product)
            <div class="productesdestacats col-md-6 col-sm-12 col-xl-4 col-lg-6 mt-5 mb-5" style="padding-right:-10px">
                <div class="producte">
                    <a href="{{route('product', $product->titol)}}" style="margin-left:0px"><img src="{{asset('storage/'.$product->img)}}" class="img-fluid rounded imgdestacat" alt=""></a>
                    <div class="row mx-auto">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-xl-12 col-lg-12 ">
                            <p class="textproducte" style="margin-top:10px">{{$product->alt}} x {{$product->ample}} x {{$product->profunditat}} cm</p>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-md-12 NOM mt-0">
                            <p style="margin-top:-10px"><a class="textproducte" style="margin-left:0px" href="{{route('product', $product->titol)}}">{{$product->titol}}</a> </p>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-md-12 NOM mt-0">
                            <p class="textproducte">{{$product->preu}} €</p>
                        </div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-md-12 NOM mt-0">
                            <p class="textproducte" style="margin-top:-10px;color:grey">
                                <?php $contador = 1; ?>
                                @foreach($artistaForeing as $artistanom)
                                @if($artistanom->id_artista == $product->id_artista && $contador==1)
                                <a class="textproducte" style="margin-left:0px;font-size:17px" href="{{route('artista.show', $artistanom->nomcomplert)}}">

                                    @if(!is_null($artistanom->imgArtista))
                                    <img class="fotoArtista" src="{{asset('storage/'.$artistanom->imgArtista)}}" alt="">
                                    @else
                                    <i style="color:black" class="fas fa-user-circle fa-2x"></i>
                                    @endif

                                    {{$artistanom->nomcomplert}}</a>
                                <?php $contador++; ?>
                                @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('layouts.footer');


    <script>

    </script>
</body>