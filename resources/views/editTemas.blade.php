@extends('layout.app')



@push('scripts')

<link rel="stylesheet" href="{{ asset('css/editarTema.css') }}">

@endpush
@section('contenido')


    <h1>Tema {{ $temas[0]->nombre_tema }}</h1>
    <div>


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#actualizarTema">
            Editar Tema
        </button>


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
            Editar Tema
        </button>


        <div class="modal fade" id="actualizarTema" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Tema</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @foreach ($temas as $tema)
                            <form method="POST" action="{{ route('actualizar-tema', ['id' => $tema->id]) }}">
                                @csrf
                                @method('put')
                                <div>
                                    <div class="error"
                                        style="
                            background-color: red;
                            text-align: center;
                            font-weight: 700;
                            text-transform: uppercase;
                            color:white;
                            border-radius: 15px;
                            ">
                                    </div>
                                    <label for="">Nombre del tema</label>
                                    <input type="text" name="nombre_tema" value="{{ $tema->nombre_tema }}"
                                        class="form-control nombre_tema">
                                </div>

                                <div class="form-data">
                                    <div class="error2"
                                        style="
                        background-color: red;
                        text-align: center;
                        font-weight: 700;
                        text-transform: uppercase;
                        color:white;
                        border-radius: 15px

                        ">
                                    </div>
                                    <label for="">Descripcion</label>
                                    <textarea name="descripcion" id="" cols="5" rows="5" class=" descripcion form-control">{{ $tema->descripcion }}</textarea>
                                </div>


                                <input type="submit" class="btn btn-primary" id="boton" value="Actualizar">

                            </form>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->


    <!-- Modal para Subir Imagen -->


    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Formulario de Subida</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('alta-bloque', ['id' => $temas[0]->id]) }}" method="post"
                        enctype="multipart/form-data">

                        @csrf
                        <div class="form-check">
                            <input type="checkbox" class="subir_imagen  form-check-input" id="subir_imagen">
                            <label class=" form-check-label" for="check_imagen">Subir Imagen</label>
                            <input type="file" id="file_imagen" class="imagen form-control" name="imagen"
                                style="display: none;">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="subir_pdf form-check-input" id="check_pdf">
                            <label class="form-check-label" for="check_pdf">Subir PDF</label>
                            <input type="file" id="file_pdf" class="pdf form-control  " name="pdf"
                                style="display: none;">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="subir_video form-check-input" id="check_video">
                            <label class="form-check-label" for "check_video">Subir Video</label>
                            <input type="text" id="file_video" class="video" name="video" style="display: none;">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="subir_texto form-check-input" id="check_texto">
                            <label class="form-check-label" for="check_texto">Subir Texto</label>
                            <textarea id="texto" name="texto" class="texto form-text" style="display: none;"></textarea>
                        </div>

                        <input type="submit" value="guardar">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Subir Archivo</button>
                </div>
            </div>
        </div>
    </div>


@section('contenido_info')
    @foreach ($bloques as $bloque)
        @if ($bloque->tema_id == $temas[0]->id)
            <form action="{{ route('delete', ['id' => $bloque->id]) }}" method="POST">
                @method('delete')
                @csrf
                <input type="submit" class="delete"  value="X">
            </form>
            <img src="{{ asset($bloque->path_imagen) }}" alt="">

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Actualizar{{ $bloque->id }}">
            Actualizar
        </button>

            @if ($bloque->path_pdf)
                <iframe src="{{ asset($bloque->path_pdf) }}" width="400"></iframe>
            @endif
            <p>{{ $bloque->texto }}</p>
            @php
                echo $bloque->video;
            @endphp
        @endif

        <div class="modalPagina modal fade" id="Actualizar{{ $bloque->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Formulario de Subida</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('update', ['id' => $bloque->id ]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-check">



                                <label class=" form-check-label" for="check_imagen">Subir Imagen</label>
                                <input type="file" id="file_imagen" class="imagen form-control" name="imagen"  value="{{ asset($bloque->path_imagen) }}"
                                ">
                            </div>

                            <div class="form-check">

                                <label class="form-check-label" for="check_pdf">Subir PDF</label>
                                <input type="file" id="file_pdf" class="pdf form-control  " name="pdf"  value="{{ asset($bloque->path_pdf) }}"                                ">
                            </div>

                            <div class="form-check">

                                <label class="form-check-label" for "check_video">Subir Video</label>
                                <input type="text" id="file_video" class="video" name="video" style="">
                            </div>

                            <div class="form-check">

                                <label class="form-check-label" for="check_texto">Subir Texto</label>
                                <textarea id="texto" name="texto" class="texto form-text" style="">{{ $bloque->texto }}</textarea>
                            </div>

                            <input type="submit" value="guardar">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection


@endsection


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/validarForm.js') }}"></script>
<script src="{{ asset('js/bloques.js') }}"></script>
<script src="{{ asset('js/bloques2.js') }}"></script>



<script>
    const success = document.querySelector('.success')

    setTimeout(() => {
        success.remove()

    }, 30000);
</script>
@endpush
