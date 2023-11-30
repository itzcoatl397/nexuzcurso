@extends('layout.app')


@section('contenido')

@foreach ($reconocimientos as $reconocimiento )

<div>
    <p>Fondo</p>

<img src="{{ asset($reconocimiento->image_path_fondo) }}" alt="" srcset="" width="300" height="300">


</div>
<div>
    <p>pie </p>

<img src="{{ asset($reconocimiento->image_path_pie) }}" alt="" srcset="" width="300" height="300">


</div>
<div>
    <p>encabezado</p>

<img src="{{ asset($reconocimiento->image_path_encabezado) }}" alt="1050 especificaciones_prodocutos" srcset="" width="300" height="300">


</div>
<div>
    <h3>texto 1</h3>
    <p>{{ $reconocimiento->texto1 }}</p>
    <h3>texto 2</h3>

    <p>{{ $reconocimiento->texto2}}</p>
    <h3>texto 3</h3>

    <p>{{ $reconocimiento->texto3 }}</p>
    <h3>texto 4</h3>

    <p>{{ $reconocimiento->texto4 }}</p>
    <h3>texto 5</h3>

    <p>{{ $reconocimiento->texto5 }}</p>


</div>
@endforeach
@endsection
