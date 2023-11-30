<div>
    @foreach ($altaCursos as $altaCurso)

    @if ($altaCurso->visible == 1)

    <td scope="row">{{ $altaCurso->nombre_curso }}</td>
    <td scope="row">{{ $altaCurso->descripcion_curso }}</td>

    <td> <img src="{{ asset($altaCurso->image_path) }}" width="200" alt=""
            srcset=""></td>
    <td>


        @foreach ($categorias as $categoria)
            @if ($categoria->id == $altaCurso->categoria_id)
                <option value="{{ $categoria->id }}" selected>
                    {{ $categoria->nombre_categoria }}
                </option>
            @endif
        @endforeach

    @endif
    @endforeach
</div>
