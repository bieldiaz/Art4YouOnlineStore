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
                            @if(Auth::user()->tipo == 'admin')
                            <button type=" button" class="btn btn-primary" onclick="window.location.href='/pintoresregistradospanel'"><i class="fas fa-palette"></i> Registro de pintores</button>
                            <button type=" button" class="btn btn-primary" onclick="window.location.href='/mensajescontactopanel'"><i class="far fa-envelope-open"></i> Mensajes de contacto</button>
                            <button type=" button" class="btn btn-primary" onclick="window.location.href='/pedidosclientespanel'"><i class="fas fa-shopping-cart"></i> Pedidos de Clientes</button>

                            @else
                            <button type="button" class="btn btn-primary mr-2" onclick="window.location.href='/obras'"><i class="fas fa-store-alt"></i> Hir a tienda</button>
                            <button type="button" class="btn btn-primary mr-2" onclick="window.location.href='edit/user'"><i class="fas fa-users-cog"></i> Configuración de mi usuario</button>
                            <button type=" button" class="btn btn-primary" onclick="window.location.href='/carro'"><i class="fas fa-shopping-cart"></i> Mi carro</button>
                            @endif
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


        </div>
    </div>
</div>
@endsection