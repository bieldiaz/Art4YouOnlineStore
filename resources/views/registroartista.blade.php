@extends('layouts.app')

@section('content')
@if(session()->has('success_message'))
<div class="alert alert-success col-md-9">
    {{session()->get('success_message')}}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quieres formar parte de Art 4 You?</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h5>Eres un artista?</h5>

                    <p ALIGN="justify">Art 4 You está en constante crecimiento y quiere gente como tú. Con ganas de crecer y llegar a gente dispuesta a pagar tus magnificas obras! <br><br>
                        Si estas dispuesto a pertenecer a esta gran familia Art 4 You te da una oportunidad para que expongas tus obras en nuestra web. Solo necesitaremos que contactes via correo con nosotros ya que cada artista es diferente.
                    </p>
                </div>
                <button class="btn btn-warning" onclick="window.location.href='/formularioartista'">Quiero ser un artista!</button>
            </div>
        </div>
    </div>
</div>

@endsection