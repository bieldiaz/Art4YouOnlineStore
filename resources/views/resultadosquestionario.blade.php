<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Art4You · Resultados</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Lobster&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/questionario.css')}}">

</head>

<body>


    <div class="modal resultados" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Este es tú resultado!</h4>
                    <a href="/"><img src="{{asset('img/logooficial.png')}}" alt="" style="width:90px;heigth:25px;"></a>
                </div>
                <div class="modal-bodyresultados">


                    @foreach($resultados as $resultadosItem)
                    <div class="linia"></div>
                    <div class="row mt-5 mb-5 mx-auto">
                        <div class="col-md-6">
                            <a href="{{route('product', $resultadosItem->titol)}}"><img src="{{asset('storage/'.$resultadosItem->img)}}" alt="" class="imgresultats img-responsive"></a>
                        </div>
                        <div class="col-md-6 mt-2">
                            <p>Titulo: <a href="{{route('product', $resultadosItem->titol)}}" style="color:#F7CA18;text-decoration:none">{{$resultadosItem->titol}}</a></p>
                            <p>Precio: {{$resultadosItem->preu}} €</p>
                            <p>Estilo: {{$resultadosItem->estilo}}</p>

                        </div>
                    </div>
                    <div class="linia"></div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>







</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<!-- BOOSTRAP SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>

</script>

</html