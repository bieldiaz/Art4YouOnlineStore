@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if(session()->has('success_message'))
        <div class="alert alert-success col-md-8">
            {{session()->get('success_message')}}
        </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: #F7CA18;">
                    {{ __('Pintores Registrados') }}</div>

                <nav class="navbar navbar-light bg-light ">
                    <button class="btn btn-warning mr-2" onclick="window.location.href='/home'"><i class="fas fa-arrow-circle-left"></i></button>
                    <form class="form-inline" action="{{route('pintoresRegistradosFiltrador')}}" method="POST">
                        {{csrf_field()}}
                        <input class="form-control mr-sm-2" type="search" placeholder="Nombre del Pintor" aria-label="Search" name="nombrefiltro" id="nombre">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="save">Filtrar</button>
                    </form>
                </nav>
                <div class="card-body">
                    @if($pintores== NULL)
                    <div class="alert alert-danger col-md-8">
                        NO SE HAN ENCONTRADO PINTORES
                    </div>
                    @else
                    @foreach($pintores as $pintoresItem)
                    <div class="row">
                        <div class="col-md-12">
                            <p>Id Registro: {{$pintoresItem->id}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Nombre del Pintor: {{$pintoresItem->nomcomplert}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Correo del Pintor: {{$pintoresItem->correo}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Telefono del Pintor: {{$pintoresItem->telefono}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Texto del Pintor: {{$pintoresItem->textoFormulario}}</p>
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