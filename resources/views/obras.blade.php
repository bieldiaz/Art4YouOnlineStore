<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Art4You · Obras</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Heebo&display=swap" rel="stylesheet">
    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/5.*/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/obras.css')}}">

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
                <span tooltip="Eres un artista?" flow="down"><a href="/eresartista" style="color:black"><i class="fas fa-paint-brush fa-lg icon" style="padding-right:15px"></i></a></span>
                <span tooltip="Iniciar Sesión" flow="down"><a href="/login" style="color:black"><i class="fas fa-sign-in-alt fa-lg icon" style="padding-right:15px"></i></a></span>
                <span tooltip="Registro" flow="down"><a href="/register" style="color:black"><i class="fas fa-door-open fa-lg icon"></i></a></span>
                @endif
            </div>
        </div>

        <!--         login i registro-->
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
                        <span class="breadcrumb__point" aria-current="page">Obras</span>
                    </li>

                </ol>
            </nav>
        </div>
        <!-- endbreadcrum -->
    </header>

    <div class="container ">
        <div class="row">
            <div class="filtrador mb-2 col-md-4 ml-2">
                <div class="apartat mb-5">
                    <div class="row">
                        <div class="col-md-5" style="border-bottom:1px solid #e1e1e1 ">
                            <h5 style="margin-left:-15px;margin-bottom:20px">ESTILO</h5>
                        </div>
                    </div>
                    @foreach($estil as $estilItem)
                    <div class="row mt-2">
                        <div class="col-md-1 mt-2">
                            <a id="filtradorNoms" class="filtradorNoms" href="{{route('Obras',['valorEstil' => $estilItem->valor])}}" style="font-size:16px;margin-left:-15px">{{$estilItem->nom}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="apartat mb-5">
                    <div class="row">
                        <div class="col-md-5" style="border-bottom:1px solid #e1e1e1 ">
                            <h5 style="margin-left:-15px;margin-bottom:20px">PRECIO</h5>
                        </div>
                    </div>
                    <!-- @foreach($filter as $preu)
                    <div class="row mt-2">
                        <div class="col-md-1 mt-2">
                            <a class="filtradorNoms" href="{{route('Obras',['valor1' => $preu->valor, 'valor2' => $preu->valor2])}}" style="font-size:16px;margin-left:-15px">{{$preu->nom}}</a>
                        </div>
                    </div>
                    @endforeach -->
                </div>
                <!-- APARTAT FILTRADOR PREU -->
                <div class="apartat mb-5 ">
                    <form action="{{route('Obras')}}" method="GET">
                        <input type="text" id="test-2" name="test-2" class="circle-range-select" value="0;3000" data-boundry="0;10000" data-min="1000" data-max="10000" data-unit="€">
                        <button type="submit" class="btn btn-warning mt-4 col-md-6">Filtrar</button>
                    </form>
                </div>
                <!--APARTAT FILTRADOR PREU -->

            </div>
            <!-- end filtrador -->

            <div class="col-md-7 resultats">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="ml11 text-center">
                            <span class="text-wrapper">
                                <span class="line line1"></span>
                                <span class="letters">Cuadros</span>
                            </span>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="textintroductori">
                            <p>Ponemos a tu disposición una galería de cuadros única. Cuadros originales en venta que podrás adquirir
                                directamente del artista que los crea. Descubre todo tipo de cuadros y pinturas creadas mediante diferentes
                                técnicas. Comprando cuadros en ART4YOU te asegurás la compra de cuadros y pinturas 100% exclusivos y únicos.
                                Creadas por auténticos artistas actuales.</p>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12 ">
                        <div class="filtradordreta">
                            <h6>Cuadros ({{count($products)}})</h6>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($artistaForeing as $product)
                    @if($valor1 <= $product->preu && $valor2 >= $product->preu || $valor1=='' && $valor2=='' && $valorEstil=='' || $product->estilo == $valorEstil)
                        <div class="productes col-md-6 col-xs-6 col-sm-12 col-xl-4 col-lg-6 mt-5 mb-5 mt-5 ">
                            <div class="producte">
                                <a href="{{route('product', $product->titol)}}" style="margin-left:0px"><img src="{{asset('storage/'.$product->img)}}" class="cuadrosartistas img-fluid rounded" alt=""></a>
                                <div class="row mx-auto">
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-xl-12 col-lg-12 ">
                                        <p class="textproducte" style="margin-top:10px">{{$product->alt}} x {{$product->ample}} x {{$product->profunditat}} cm</p>
                                    </div>
                                </div>
                                <div class="row mx-auto">
                                    <div class="col-md-12  col-xs-12 col-sm-12 col-xl-12 col-lg-12 NOM mb-3">
                                        <a class="NOMPRODUCTE" href="{{route('product', $product->titol)}}" style="font-size:17px;margin-left:0px;text-decoration:none;color:black">{{$product->titol}}</a>
                                    </div>
                                </div>
                                <div class="row mx-auto">
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-xl-12 col-lg-12  NOM mt-0">
                                        <p class="textproducte" style="margin-top:-10px">{{$product->preu}} €</p>
                                    </div>
                                </div>
                                <div class="row mx-auto">
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-xl-12 col-lg-12 NOM mt-0">
                                        <a href="{{route('artista.show', $product->nomcomplert)}}" class="textproducte" style="margin-top:-15px;color:grey;font-size:15px;margin-left:0px">
                                            @if(!is_null($product->imgArtista))
                                            <img class="fotoArtista" src="{{asset('storage/'.$product->imgArtista)}}" alt="">
                                            @else
                                            <i style="color:black" class="fas fa-user-circle fa-2x"></i>
                                            @endif
                                            {{$product->nomcomplert}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif

                        @endforeach
                </div>

            </div>
        </div>

    </div>


    <div class="justify-content-center d-flex mb-3">
        <div class="row">
            {{ $artistaForeing->links("vendor.pagination.bootstrap-4") }}
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


    //===SLIDER===

    (function(root, factory) {
        var $ = root.jQuery;

        if (typeof define === 'function' && define.amd) {
            // AMD
            if ($) {
                define([], factory.bind(null, $));
            } else {
                define(['jquery'], factory);
            }
        } else if (typeof exports === 'object') {
            // Node, CommonJS-like
            if ($) {
                module.exports = factory($);
            } else {
                module.exports = factory(require('jquery'));
            }
        } else {
            // Browser globals (root is window)
            if ($) {
                factory($); // no global needed as we store it as a jQuery plugin on jQuery.fn
            } else {
                throw 'Missing required jQuery dependency';
            }
        }
    }(this, function($) {
        var isDragging = false;
        var $currentHandle = null;

        function drawCircle($container, degreeStart, degreeEnd) {
            var
                $canvas = $container.find('canvas'),
                canvas = $canvas[0];

            var outerWidth = $container.outerWidth();
            var innerWidth = $container.innerWidth();
            var borderWidth = outerWidth - innerWidth;
            $canvas.css('left', borderWidth * -1);
            $canvas.css('top', borderWidth * -1);


            var radius = (outerWidth - borderWidth / 2) / 2;
            canvas.width = outerWidth + borderWidth;
            canvas.height = canvas.width;
            var context = canvas.getContext('2d');
            context.clearRect(0, 0, canvas.width, canvas.height);
            context.beginPath();



            context.arc(canvas.width / 2, canvas.width / 2, radius, degreesToRadians(degreeStart) - Math.PI / 2, degreesToRadians(degreeEnd) - Math.PI / 2, false);
            context.lineWidth = borderWidth / 2;
            context.strokeStyle = $canvas.css('color');
            context.stroke();
        }

        function degreesToRadians(degrees) {
            return degrees * (Math.PI / 180);
        }

        function updateWidget($container) {
            var $handles = $container.find('.handle');
            var $handle1 = $container.find('.handle1');
            var $handle2 = $container.find('.handle2');

            var outerWidth = $container.outerWidth();
            var innerWidth = $container.innerWidth();
            var borderWidth = (outerWidth - innerWidth) / 2;
            var handleWidth = $handles.outerWidth();

            var radius = (outerWidth - borderWidth) / 2;

            var $input = $container.find('input');
            var minValue = $input.attr('data-min') || 0;
            var maxValue = $input.attr('data-max') || 360;
            var unit = $input.attr('data-unit') || '&deg;';
            var steps = maxValue - minValue
            var stepSize = 360 / steps;

            $handles.each(function(idx, handle) {
                var $handle = $(handle);
                var value = $handle.attr('data-value');
                var deg = value * stepSize;

                var X = Math.round(radius + radius * Math.sin(deg * Math.PI / 180));
                var Y = Math.round(radius + radius * -Math.cos(deg * Math.PI / 180));
                $handle.css({
                    left: X,
                    top: Y
                });
                $container.find($handle.attr('data-value-target')).html($handle.attr('data-value') + unit);
            });

            value1 = $handle1.attr('data-value');
            value2 = $handle2.attr('data-value');
            drawCircle($container, value1 * stepSize, value2 * stepSize);
            $input.val(value1 + ';' + value2).trigger('change');
        }

        function init($input) {
            var values = $input.val() || '0;0';
            values = values.split(';');
            var value1 = parseInt(values[0], 10);
            var value2 = parseInt(values[1], 10);

            $container = $('<div class="circle-range-select-wrapper"></div>');
            $input.wrap($container);
            $container = $input.parent();

            $container.append('<div class="handle handle1" data-value="' + value1 + '" data-value-target=".value1"></div>');
            $container.append('<div class="handle handle2" data-value="' + value2 + '" data-value-target=".value2"></div>');
            $container.append('<div class="values"><span class="value1"></span> - <span class="value2"></span></div>');
            $container.append('<canvas class="selected-range"></canvas>');

            updateWidget($container);

            $container.on('mousedown touchstart', '.handle', function(e) {
                isDragging = true;
                e.preventDefault();
                $currentHandle = $(e.target);
                $(document).one('mouseup touchend', function() {
                    isDragging = false;
                    $currentHandle = null;
                });
            });

            $(window).on('resize', updateWidget.bind(null, $container));
        }

        $(document).on('mousemove touchmove', function(e) {
            if (isDragging) {
                var $container = $currentHandle.closest('.circle-range-select-wrapper');
                var radius = $container.width() / 2;

                if (!e.offsetX && e.originalEvent.touches) {
                    // touch events
                    var targetOffset = $(e.target).offset();
                    e.offsetX = e.originalEvent.touches[0].pageX - targetOffset.left;
                    e.offsetY = e.originalEvent.touches[0].pageY - targetOffset.top;
                } else if (typeof e.offsetX === "undefined" || typeof e.offsetY === "undefined") {
                    // firefox compatibility
                    var targetOffset = $(e.target).offset();
                    e.offsetX = e.pageX - targetOffset.left;
                    e.offsetY = e.pageY - targetOffset.top;
                }

                var mPos = {
                    x: e.target.offsetLeft + e.offsetX,
                    y: e.target.offsetTop + e.offsetY
                };

                var atan = Math.atan2(mPos.x - radius, mPos.y - radius);
                var deg = -atan / (Math.PI / 180) + 180; // final (0-360 positive) degrees from mouse position

                var $input = $container.find('input');
                var minValue = $input.attr('data-min') || 0;
                var maxValue = $input.attr('data-max') || 360;
                var steps = maxValue - minValue
                var stepSize = 360 / steps;

                var value = Math.round(deg / stepSize);
                //if (value == maxValue) {
                //  value = minValue;
                //}
                var boundry = $input.attr("data-boundry"),
                    boundryValue = boundry.split(";"),
                    startBoundy = boundryValue[0],
                    endBoundry = boundryValue[1];
                // if(value > 180){
                //   return;
                // }
                var currentValueOfSlider = $input.val();

                var values = $input.val() || '0;0';
                values = values.split(';');

                var startValue = parseInt(values[0], 10);
                var endValue = parseInt(values[1], 10);
                if ($currentHandle.hasClass("handle1")) {
                    if ((value >= (endValue - 10)) || (value <= startBoundy)) {
                        return;
                    }
                } else {
                    if ((value <= (startValue + 10)) || (value >= endBoundry)) {
                        return;
                    }
                }

                $currentHandle.attr('data-value', value);

                updateWidget($container);
            }
        });


        $.fn.lcnCircleRangeSelect = function() {
            return this.each(function() {
                init($(this));
            });

        };

    }));
    jQuery('#test-1').lcnCircleRangeSelect();
    jQuery('#test-2').lcnCircleRangeSelect();
    jQuery('#test-3').lcnCircleRangeSelect();
</script>



</html>