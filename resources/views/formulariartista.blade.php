@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: #F7CA18;">{{ __('Formulario de Artista') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('artistaForm.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo  ') }}</label>

                            <div class="col-md-6">
                                <input id="nombrecompleto" type="text" class="form-control @error('name') is-invalid @enderror" name="nombrecompleto" value="{{ old('name') }}" required>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="correo" type="email" class="form-control @error('email') is-invalid @enderror" name="correo" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" required autocomplete="telefono">

                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('Cuentanos Sobre ti') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" rows="10" placeholder="Redacta un pequeño texto contandonos tu perfil" name="about"></textarea>


                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style="background-color:#F7CA18">
                                    {{ __('Darme de alta!') }}
                                </button>
                            </div>
                        </div>
                        <p style="color:grey; margin-top:10px; font-size:10px">Cuando completes este formulario contactaremos contigo en cuanto podamos!</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection