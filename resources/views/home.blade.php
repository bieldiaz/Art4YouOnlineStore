@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido <p style="color:#F7CA18;display:inline">{{ Auth::user()->name }}</p> a ART 4 YOU</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h5>Que quieres hacer?</h5>
                    <div class="row">
                        <div class="col mt-3">
                            <button type="button" class="btn btn-primary mr-2" onclick="window.location.href='/obras'"><i class="fas fa-store-alt"></i> Hir a tienda</button>
                            <button type="button" class="btn btn-primary mr-2" onclick="window.location.href='edit/user'"><i class="fas fa-users-cog"></i> Configuración de mi usuario</button>
                            <button type=" button" class="btn btn-primary" onclick="window.location.href='/carro'"><i class="fas fa-shopping-cart"></i> Mi carro</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header"><i class="fas fa-shopping-bag"></i> Mis pedidos</div>
                <div class="card-body">
                    @if($pedidoIndividual->isEmpty())
                    <div class="alert alert-success col-md-12 mt-4" role="alert">
                        No has hecho ningun pedido!
                    </div>
                    @else
                    @foreach($pedidoIndividual as $misPedidos)
                    <div class="row">
                        <div class="col-md-12">
                            <p>Id message: {{$misPedidos->id}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Data: {{$misPedidos->created_at}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Nom persona: {{$misPedidos->nombrecompleto}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Teléfono: {{$misPedidos->telefono}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Correo electronico: {{$misPedidos->correo}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Dirección: {{$misPedidos->provincia}}, {{$misPedidos->direccion}}, {{$misPedidos->ciudad}}, {{$misPedidos->codigopostal}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="color: green">Precio cobrado: {{$misPedidos->precioACobrar}} €</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="color: #F7CA18">Obras compradas: {{$misPedidos->obras}}</p>
                        </div>
                    </div>
                    <div class="linia col"></div>
                    @endforeach
                    @endif
                </div>
            </div>




            @if(Auth::user()->tipo == 'admin')
            <div class="card mt-5">
                <div class="card-header">Admin Panel</div>
                <div class="card-body">
                    <nav class="navbar navbar-light bg-light mb-4">
                        <form class="form-inline" action="{{route('home.adminpanel')}}" method="POST">
                            {{csrf_field()}}
                            <input class="form-control mr-sm-2" type="search" placeholder="Nombre" aria-label="Search" name="nombrefiltro" id="nombre">
                            <input class="form-control mr-sm-2" type="date" placeholder="Data" aria-label="Search" name="data" id="data">

                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="save">Filtrar</button>
                        </form>
                    </nav>
                    <h4>Mensajes de contacto:</h4>

                    @if(is_null($messagesContacto))
                    <div class="alert alert-danger col-md-12 mt-4" role="alert">
                        Algunos de los campos esta vacio!
                    </div>
                    @else
                    @foreach($messagesContacto as $messagesContacto)
                    <div class="linia col"></div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <p>Id message: {{$messagesContacto->id}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Data: {{$messagesContacto->created_at}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Nom persona: {{$messagesContacto->nombre}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Telefono: {{$messagesContacto->telefono}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Correo: {{$messagesContacto->email}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Mensage: {{$messagesContacto->message}}</p>
                        </div>
                    </div>
                    <div class="linia col"></div>
                    @endforeach
                    @endif
                </div>
            </div>

            <!-- SECTION PEDIDOS -->
            <div class="card mt-5">
                <div class="card-header">Pedidos</div>
                <div class="card-body">
                    <nav class="navbar navbar-light bg-light mb-4">
                        <form class="form-inline" action="{{route('home.adminpanel')}}" method="POST">
                            {{csrf_field()}}
                            <input class="form-control mr-sm-2" type="search" placeholder="Correo" aria-label="Search" name="emailpedidos" id="emailpedidos">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="saveFiltro">Filtrar</button>
                        </form>
                    </nav>

                    <h4>Todos los pedidos:</h4>
                    <div class="linia col mb-3"></div>
                    @if(is_null($pedidos))
                    <div class="alert alert-danger col-md-12 mt-4" role="alert">
                        Correo esta vacio!
                    </div>
                    @else

                    @foreach($pedidos as $pedidosItem)
                    <div class="row">
                        <div class="col-md-12">
                            <p>ID Pedido: {{$pedidosItem->id}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Nombre comprador: {{$pedidosItem->nombrecompleto}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Obras: {{$pedidosItem->obras}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p style="color: green">Precio A Cobrar: {{$pedidosItem->precioACobrar}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p>Correo: {{$pedidosItem->correo}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Ciudad: {{$pedidosItem->ciudad}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Direccion: {{$pedidosItem->direccion}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Provincia: {{$pedidosItem->provincia}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Codigo Postal: {{$pedidosItem->codigopostal}}</p>
                        </div>
                    </div>
                    <div class="linia col mb-3"></div>

                    @endforeach
                    @endif
                </div>

            </div>
            @endif



        </div>
    </div>
</div>
@endsection