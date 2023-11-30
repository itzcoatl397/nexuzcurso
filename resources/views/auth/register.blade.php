
@extends('layout.app')




@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro</div>

                <div class="card-body">
                    <form method="POST" novalidate ="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                        @error('nombre')
                          <p>{{$message}}</p>

                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="username">Nombre de Usuario</label>
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                            @error('username')
                            <p>{{$message}}</p>

                          @enderror

                        </div>

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

                        <div class="form-group">
                            <label for="password-confirm">Confirmar Contraseña</label>
                            <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required>
                            @error('password_confirm')
                            <p>{{$message}}</p>

                          @enderror

                        </div>

                        <button type="submit" class="btn btn-primary mt-2 ">
                            Registrarse
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
