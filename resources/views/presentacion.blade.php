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


    <div class="modalINICIO " tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bienvenido a la Presentación</h5>

                </div>
                <div class="modal-body">
                    <p>Bienvenido a la presentación de mi proyecto de final de curso que he estado desarrollando estos últimos meses. En este apartado encontraras la presentación de Art 4 You y todo lo que te falta saber de este gran proyecto. <br>
                    </p>

                    <a href="/"><img src="{{asset('img/logooficial.png')}}" alt="" style="width:200px;heigth:200px;" class="mx-auto d-flex"></a>

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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Índex</h4>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Presentació del projecte</li>
                        <li>Perquè he triat fer Art 4 You?</li>
                        <li>Com m'he planificat?</li>
                        <li>Tecnologies utilitzades</li>
                        <li>Com ho he fet?</li>
                        <li>Demo del projecte - Ordinador</li>
                        <li>Demo del projecte - Telèfon</li>
                        <li>Conclusions</li>
                    </ul>
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
                                <p class="negreta">Arte Figurativo: </p>
                                <p>És el arte que, al contrario que el arte abstracto, se define por la representación1​ de figuras, entendiendo estas como objetos identificables mediante imágenes reconocibles</p>
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
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Presentació del Projecte</h4>
                </div>
                <div class="modal-body">

                    <div class="row mt-5 mb-5">
                        <div class="col-xl-12 text-center">
                            <a href="/"><img src="{{asset('img/logo2.png')}}" alt="" style="width:70%"></a>

                        </div>
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

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Perquè he triat fer Art 4 You?</h4>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default btn-prev"><i class="fas fa-chevron-circle-left fa-lg "></i></button>
                    <button type="button" class="btn btn-default btn-next float-left d-flex"><i class="fas fa-chevron-circle-right fa-lg"></i></button>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Com m'he planificat?</h4>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default btn-prev"><i class="fas fa-chevron-circle-left fa-lg "></i></button>
                    <button type="button" class="btn btn-default btn-next float-left d-flex"><i class="fas fa-chevron-circle-right fa-lg"></i></button>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tecnologies utilitzades</h4>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default btn-prev"><i class="fas fa-chevron-circle-left fa-lg "></i></button>
                    <button type="button" class="btn btn-default btn-next float-left d-flex"><i class="fas fa-chevron-circle-right fa-lg"></i></button>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Com ho he fet?</h4>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default btn-prev"><i class="fas fa-chevron-circle-left fa-lg "></i></button>
                    <button type="button" class="btn btn-default btn-next float-left d-flex"><i class="fas fa-chevron-circle-right fa-lg"></i></button>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Demo del projecte - Ordinador</h4>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default btn-prev"><i class="fas fa-chevron-circle-left fa-lg "></i></button>
                    <button type="button" class="btn btn-default btn-next float-left d-flex"><i class="fas fa-chevron-circle-right fa-lg"></i></button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Demo del projecte - Telèfon</h4>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default btn-prev"><i class="fas fa-chevron-circle-left fa-lg "></i></button>
                    <button type="button" class="btn btn-default btn-next float-left d-flex"><i class="fas fa-chevron-circle-right fa-lg"></i></button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Conclusions</h4>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default btn-prev"><i class="fas fa-chevron-circle-left fa-lg "></i></button>
                    <button type="button" class="btn btn-default btn-next float-left d-flex"><i class="fas fa-chevron-circle-right fa-lg"></i></button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        <div class="col">
                            <h1>FI DE LA PRESENTACIÓ</h1>
                            <img src="{{asset('img/gracies.jpg')}}" alt="" style="width:400px;heigth:400px;" class="mx-auto d-flex">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-warning empezar " onclick="window.location.href='/'">
                        <i class="fas fa-home"></i> TORNAR INICI
                    </button>
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