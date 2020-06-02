<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Art4You · Questionario</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Lobster&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/questionario.css')}}">

</head>

<body>
    <form action="{{ route('questionario.guardarPreguntes')}}" method="POST">
        {{csrf_field()}}

        <div class="modalINICIO" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bienvenido {{ Auth::user()->name }} al Questionario</h5>

                    </div>
                    <div class="modal-body">
                        <p>Te preguntaras para que es todo esto? En este sitio de la pagina te ayudaremos a escojer tu obra ideal,
                            dentro de tu presupuesto y tus ideas. Si quieres comenzar dale click a empezar! <br>
                        </p>
                        <p class="lletrapetita mt-5">En este formulario te encontraras con 4 preguntas muy especificas</p>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-warning empezar " onclick="window.location.href='/'">
                            <i class="fas fa-home"></i> Volver a inicio
                        </button>

                        <button type="button" class="btn btn-warning empezar" data-toggle="modal" data-target="#myModal1">
                            Empezar <i class="fas fa-chevron-circle-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Que estilo buscas?</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estilo" id="estilo" value="abstracto" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Abstracto
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estilo" id="estilo" value="realismo">
                            <label class="form-check-label" for="exampleRadios2">
                                Realismo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estilo" id="estilo" value="impresionismo">
                            <label class="form-check-label" for="exampleRadios2">
                                Impresionismo
                            </label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="dropdown col " style="margin-left:0px;display:flex">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-question-circle"></i>
                            </button>
                            <div class="dropdown-menu row" aria-labelledby="dropdownMenu2">
                                <div class="col">
                                    <p class="negreta">Arte Abstracto: </p>
                                    <p>El arte abstracto es una forma de expresión artística que prescinde de toda figuración y propone una nueva realidad distinta a la natural</p>
                                    <p class="negreta">Arte Realista: </p>
                                    <p>És el arte que, al contrario que el arte abstracto, se define por la representación1​ de figuras, entendiendo estas como objetos identificables mediante imágenes reconocibles</p>
                                    <p class="negreta">Arte Impresionista: </p>
                                    <p>Los cuadros impresionistas se construyen técnicamente a partir de manchas bastas de colores, las cuales actúan como puntos de una policromía más amplia, que es la obra en sí.</p>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-default btn-next float-left d-flex"><i class="fas fa-chevron-circle-right fa-lg"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <!--     <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
        Player 2
    </button> -->

        <!-- Modal -->


        <!-- Modal -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Que medidas buscas?</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="medidas" id="medidas" value="Pequeño" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Pequeño
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="medidas" id="medidas" value="Mediano">
                            <label class="form-check-label" for="exampleRadios2">
                                Mediano
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="medidas" id="medidas" value="Grande">
                            <label class="form-check-label" for="exampleRadios2">
                                Grande
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="medidas" id="Extra medidas" value="Extra Grande">
                            <label class="form-check-label" for="exampleRadios2">
                                Extra Grande
                            </label>
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default btn-prev"><i class="fas fa-chevron-circle-left fa-lg "></i></button>
                        <button type="button" class="btn btn-default btn-next float-left d-flex"><i class="fas fa-chevron-circle-right fa-lg"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Que presupuesto tienes?</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="presupuesto" id="presupuesto" value="0€-500€" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                0€ - 500€
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="presupuesto" id="presupuesto" value="500€-1000€">
                            <label class="form-check-label" for="exampleRadios2">
                                500€ - 1000€
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="presupuesto" id="presupuesto" value="1000€-2000€">
                            <label class="form-check-label" for="exampleRadios2">
                                1000€ - 2000€
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="presupuesto" id="presupuesto" value="2000€-5000€">
                            <label class="form-check-label" for="exampleRadios2">
                                2000€ - 5000€
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="presupuesto" id="presupuesto" value=">5000€">
                            <label class="form-check-label" for="exampleRadios2">
                                > 5000€
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-prev"><i class="fas fa-chevron-circle-left fa-lg "></i></button>

                        <button type="submit" class="btn btn-default btn-next float-left d-flex">Finalizar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<!-- BOOSTRAP SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(".empezar").click(function() {
            $(".modalINICIO").css("display", "none");
        });

        $(".finalizar").click(function() {
            $(".resultados").css("display", "block");
        });

    });

    $("div[id^='myModal']").each(function() {
        var currentModal = $(this);
        //click next
        currentModal.find('.btn-next').click(function() {
            currentModal.modal('hide');
            currentModal.closest("div[id^='myModal']").nextAll("div[id^='myModal']").first().modal('show');
        });
        //click prev
        currentModal.find('.btn-prev').click(function() {
            currentModal.modal('hide');
            currentModal.closest("div[id^='myModal']").prevAll("div[id^='myModal']").first().modal('show');
        });
    });
</script>

</html