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
    <link rel="stylesheet" href="{{asset('css/checkout.css')}}">

    <!-- Stripe es per tarjeta de credit -->
    <script src="https://js.stripe.com/v3/"></script>

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
                        <a href="/carro" class="breadcrumb__point r-link">Carro</a>
                        <span class="breadcrumb__divider" aria-hidden="true">›</span>
                    </li>
                    <li class="breadcrumb__group">
                        <span class="breadcrumb__point" aria-current="page">Datos del Pedido</span>
                    </li>

                </ol>
            </nav>
        </div>
        <!-- endbreadcrum -->
    </header>

    <div class="container">
        @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
        @endif

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                {!! $error !!}
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row titol-productes  ">
            <h1 class="ml11 ">
                <span class="text-wrapper1">
                    <span class="line line1"></span>
                    <span class="letters" id="featuresproducts">Datos del Pedido</span>
                </span>
            </h1>
        </div>

        <div class="row">
            <div class="col-xl-6 billing-details mt-3 mb-5">
                <form class="form-horizontal" id="payment-form" method="POST" action="{{route('checkout.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-sm-12" style="padding:0px">
                            <h5>Nombre Completo</h5>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="@if (Auth::check()){{ Auth::user()->name }}@endif" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" style="padding:0px">
                            <h5>Correo Electronico</h5>
                            <input type="email" class="form-control" id="email" name="email" value="@if (Auth::check()){{ Auth::user()->email }}@endif" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" style="padding:0px">
                            <h5>Direccion</h5>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="@if (Auth::check()){{ Auth::user()->direccion }}@endif" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12" style="padding:0px">
                            <h5>Ciudad</h5>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" value="@if (Auth::check()){{ Auth::user()->ciudad }}@endif" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" style="padding:0px">
                            <h5>Provincia</h5>
                            <input type="text" class="form-control" id="provincia" name="provincia" value="@if (Auth::check()){{ Auth::user()->provincia }}@endif" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" style="padding:0px">
                            <h5>Codigo Postal</h5>
                            <input type="number" class="form-control" id="postal" name="postal" value="@if (Auth::check()){{ Auth::user()->postal }}@endif" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12" style="padding:0px">
                            <h5>Teléfono</h5>
                            <input type="number" class="form-control" id="telefono" name="telefono" value="@if (Auth::check()){{ Auth::user()->telefono }}@endif" required>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="mt-4">Detalles del pago</h4>

                    </div>
                    <!-- <div class="form-group">
                        <div class="col-sm-12" style="padding:0px">
                            <h5>Nombre del titular</h5>
                            <input type="number" class="form-control" value="" required>
                        </div>
                    </div> -->
                    <!-- stripe element label-->
                    <div class="form-group">
                        <div class="form-row">
                            <h5>Tarjeta de credito o debito</h5>

                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <div id="card-errors" role="alert"></div>
                            <!-- Used to display form errors. -->
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="newTotal" name="newTotal" value="{{$newTotal}}" required>


                    <div class="row">
                        <div class="col mb-5">
                            <button type="submit" id="complete-order" class="btn btn-success w-100">Completar compra</button>
                        </div>
                    </div>

                </form>

            </div>
            <div class="col-xl-6  " style="padding-left:40px;">
                <div class="row ">
                    <h4>Tu pedido</h4>
                </div>
                <table class="taulaproductes">
                    @foreach(Cart::content() as $item)
                    <tr>
                        <td class="fila">
                            <img src="{{asset('storage/'.$item->options->img)}}" alt="" class="imatge-producte mt-3 mb-3">
                        </td>
                        <td class="nom-producte">
                            <a href="{{route('product', $item->name)}}" style="text-decoration: none;font-size:15px;margin-left:0px;color:black">{{$item->name}}</a>
                            <p>{{$item->price}} €</p>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="row mt-4 mb-5">
                    <div class="col totalpayment">
                        <div class="row mt-3">
                            <div class="col float-left">
                                <p>Subtotal: </p>
                            </div>
                            <div class="col float-right">
                                <p>{{Cart::subtotal()}} €</p>
                            </div>
                        </div>
                        <!--SECCION DEL CUPON -->
                        @if(session()->has('coupon'))
                        <div class="row ">
                            <div class="col float-left">
                                <p>Descuento ({{session()->get('coupon')['name']}}):

                                </p>
                            </div>
                            <div class="col float-right d-inline-block">
                                <div class="row ml-0">
                                    <p>- {{$discount}} € </p>
                                    <form action="{{ route('coupon.destroy')}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" style="font-size:8px;margin-left:10px" class="btn btn-danger d-flex float-right">Quitar</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="border-top:1px solid black">
                            <div class="col float-left mt-2">
                                <p>Nuevo Subtotal: </p>
                            </div>
                            <div class="col float-right mt-2">
                                <p>{{$newSubtotal}} €</p>
                            </div>
                        </div>
                        @endif
                        <!--SECCION DEL CUPON -->

                        <div class="row">
                            <div class="col float-left">
                                <p>IVA(21%): </p>
                            </div>
                            <div class="col float-right">
                                <p>{{$newTax}} €</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col float-left">
                                <p class="total">Total: </p>
                            </div>
                            <div class="col float-right">
                                <p class="total">{{$newTotal}} €</p>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!session()->has('coupon'))
                <div class="have-code-container mb-5">

                    <h5 class="have-code">Tienes codigo descuento?</h5>
                    <form action="{{route('coupon.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col">
                                <input type="text" class="inputvalue" name="coupon_code" id="coupon_code">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-warning">Aplicar</button>
                            </div>

                        </div>
                    </form>
                </div>
                @endif
            </div>

        </div> <!-- end-billingdetails -->




    </div>

    @include('layouts.footer');

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>


<!-- BOOSTRAP SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script>
    // Create a Stripe client.
    var stripe = Stripe('pk_test_APkZQJvQ630E3Hsxb4ziPHik00GrsoJA6M');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style,
        hidePostalCode: true
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        var options = {
            name: document.getElementById('nombre').value,
            address_line1: document.getElementById('direccion').value,
            address_city: document.getElementById('ciudad').value,
            address_state: document.getElementById('provincia').value,
            address_zip: document.getElementById('postal').value
        }
        stripe.createToken(card, options).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>

</html>