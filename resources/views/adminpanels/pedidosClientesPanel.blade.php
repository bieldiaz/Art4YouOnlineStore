@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        @if(session()->has('success_message'))
        <div class="alert alert-success col-md-6">
            {{session()->get('success_message')}}
        </div>
        @endif
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Pedidos</div>
                <div class="card-body">
                    <nav class="navbar navbar-light bg-light mb-4">
                        <button class="btn btn-warning " onclick="window.location.href='/home'"><i class="fas fa-arrow-circle-left"></i></button>

                        <form class="form-inline" action="{{route('pedidosClientes.adminpanel')}}" method="POST">
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
        </div>
    </div>
</div>
@endsection