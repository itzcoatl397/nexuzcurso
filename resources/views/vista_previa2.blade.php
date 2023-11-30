@extends('layout.app')


@section('contenido')

@foreach ($terminacion as $termina )

<div>
    <p>Fondo</p>

<img src="{{ asset($termina->image_path) }}" alt="" srcset="" width="300" height="300">


</div>



<div>
    <h3>texto 1</h3>
    <p>{{ $termina->texto1 }}</p>
    <h3>texto 2</h3>

    <p>{{ $termina->texto2}}</p>
    <h3>texto 3</h3>
    <p>{{ $termina->texto3}}</p>



</div>
@endforeach
@endsection
