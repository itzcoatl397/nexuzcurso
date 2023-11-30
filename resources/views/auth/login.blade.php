
@extends('layout.app')




@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inicia Sesion</div>

                <div class="card-body">
                    <form method="POST" novalidate ="{{ route('login') }}">
                        @csrf


                        @if (session('mensaje'))
                        <p>{{ session('mensaje') }}</p>

                        @endif

                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @error('email')
                            <p>{{$message}}</p>

                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @error('password')
                            <p>{{$message}}</p>

                          @enderror

                        </div>



                        <button type="submit" class="btn btn-primary mt-2 ">
                            Iniciar sesion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
