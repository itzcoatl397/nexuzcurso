<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- En el head -->

  
<script src="{{ asset('js') }}"></script>
@vite('resources/js/app.js')

@stack('styles')

</head>
</head>
<body>

<header>

    @auth
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Nexus Cursos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
            <p> Hola {{ auth()->user()->username }}</p>
              </li>
              <li class="nav-item">
                <a class="nav-link active"       href="{{ route('dashboard.index') }}">Home</a>
                  </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard.controlCursos') }}"> control de cursos</a>
                <br>
                <a class="nav-link active" href="{{ route('dashboard.altaUsuario') }}"> control usuarios</a>

                  </li>

              <li class="nav-item">

                <form action="{{ route('logout-universal') }}" method="POST">

                    @csrf
                    <button type="submit" class="btn">Cerrar sesion </button>
                </form>
              </li>



            </ul>
          </div>
        </div>
      </nav>
    @endauth

    @guest
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Nexus Cursos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('login') }}"">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Registro</a>
              </li>



            </ul>
          </div>
        </div>
      </nav>
    @endguest
</header>

<main>
  <div class="flex">
    @yield('contenido')

  </div>
  @yield('contenido_info2')

 <div class="grid col-6">
    @yield('contenido_info')
 </div>

</main>

@stack('scripts')
<script>

    $(function () {
        $('select').selectpicker();
    });
    </script>
</body>
</html>
