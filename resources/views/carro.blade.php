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
    <link rel="stylesheet" href="{{asset('css/carro.css')}}">

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
                        <span class="breadcrumb__point" aria-current="page">Carro</span>
                    </li>

                </ol>
            </nav>
        </div>
        <!-- endbreadcrum -->
    </header>

    <div class="container mb-5">
        <div class="row">
            @if(session()->has('success_message'))
            <div class="alert alert-success col-md-6">
                {{session()->get('success_message')}}
            </div>
            @endif

            @if(count($errors)> 0)
            <div class="alert alert-danger col-md-6">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>
        <div class="row">

            <h4 class="ml-4">{{Cart::count()}} item(s) en el carro</h4>
        </div>
        @if(Cart::count() > 0)

        <div class="col mt-4">
            <div class="table-responsive">
                <table class="taulaproductes  ">

                    @foreach(Cart::content() as $item)
                    <tr>
                        <td class="fila">
                            <a href="{{route('product', $item->name)}}"><img src="{{asset('storage/'.$item->options->img)}}" alt="" class="imatge-producte mt-3 mb-3"></a>
                        </td>
                        <td class="nom-producte ">
                            <a href="{{route('product', $item->name)}}" class="titol">
                                <p>{{$item->name}}</p>
                            </a>
                        </td>
                        <td class="preu">
                            <p style="color:black" class="preeu" class="mt-4 ml-4">{{$item->price}} €</p>
                        </td>
                        <td class="nom-producte  ">
                            <form action="{{ route('carro.destroy', $item->rowId)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger mt-4"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td class="nom-producte  ">
                            <form action="{{ route('carro.guardarParaDespues', $item->rowId)}}" method="POST">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-warning mt-4"><i class="fas fa-history"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </table>

            </div>

        </div>
        <div class="resumenContainer">
            <div class="row resum mt-4">
                <div class="col-xl-10 col-md-9 col-sm-8 mt-5 apartat1">
                    <p style="color:black">El envio és gratis a partir de una compra superior a los 100€. Somos increíbles!</p>
                </div>
                <div class="apartat2 col-xl-2 col-md-3 col-sm-4 float-right mt-3">
                    <div class="row">
                        <p class="resumen">Subtotal: {{Cart::subtotal()}} €</p>
                    </div>
                    <div class="row">
                        <p class="resumen">IVA(21%): {{Cart::tax()}} €</p>
                    </div>
                    <div class="row">
                        <p class="total">Total: {{Cart::total()}} €</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix botonera  mt-5">
            <div class="col botonera2 ">
                <button type="button" onclick="window.location.href='{{route('Obras')}}'" class="btn btn-warning float-left"><i class="fas fa-cart-arrow-down">
                        <p>Continuar Comprando</p>
                    </i></button>
            </div>
            <div class="col botonera2 marginboton">
                <button type="button" onclick="window.location.href='{{route('checkout.index')}}'" class="btn btn-warning float-right"><i class="fas fa-cart-arrow-down">
                        <p>Finalizar Pedido</p>
                    </i></button>
            </div>

        </div>

        @else
        <div class="noitems mb-4 mt-4">
            <div class="row">
                <h4 class="mt-2 ml-3">No tienes ningun item en el carro!</h4>
            </div>
            <div class="row">
                <a href="{{route('Obras')}}" style="text-decoration: none;color: #F7CA18;font-size: 17px;">Continua comprando</a>
            </div>
        </div>
        @endif

        @if(Cart::instance('saveForLater')->count() > 0)

        <div class="row">
            <h4 class="ml-4 mt-5">{{Cart::instance('saveForLater')->count()}} obras guardadas para después</h4>
        </div>
        <div class="col mt-4">
            <div class="table-responsive">
                <table class="taulaproductes  ">
                    @foreach(Cart::instance('saveForLater')->content() as $item)
                    <tr>
                        <td class="fila">
                            <a href="{{route('product', $item->name)}}"><img src="{{asset('storage/'.$item->options->img)}}" alt="" class="imatge-producte mt-3 mb-3"></a>
                        </td>
                        <td class="nom-producte ">
                            <a href="{{route('product', $item->name)}}" class="titol">
                                <p>{{$item->name}}</p>
                            </a>
                        </td>
                        <td class="preu">
                            <p style="color:black" class="preeu" class="mt-4 ml-4">{{$item->price}} €</p>
                        </td>
                        <td class="nom-producte  ">
                            <form action="{{ route('saveForLater.destroy', $item->rowId)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger mt-4"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td class="nom-producte  ">
                            <form action="{{ route('saveForLater.guardarACarro', $item->rowId)}}" method="POST">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-success mt-4"><i class="fas fa-arrow-up"></i></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </table>

            </div>
            @else

            <div class="noitems mb-5 mt-5">
                <div class="row">
                    <h5 class="mt-2 ml-3"><i class="fas fa-history"></i> No tienes ningun item guardado para después</h5>
                </div>
            </div>
            @endif
        </div>

    </div>

    @include('layouts.footer');


</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<!-- BOOSTRAP SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</html