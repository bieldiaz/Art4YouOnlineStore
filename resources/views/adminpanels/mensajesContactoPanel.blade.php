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
                <div class="card-header">Registro de Mensajes de Contacto</div>
                <div class="card-body">
                    <nav class="navbar navbar-light bg-light mb-4">
                        <button class="btn btn-warning " onclick="window.location.href='/home'"><i class="fas fa-arrow-circle-left"></i></button>

                        <form class="form-inline" action="{{route('mensajesContacto.adminpanel')}}" method="POST">
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
        </div>
    </div>
</div>
@endsection