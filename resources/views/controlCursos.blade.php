@extends('layout.app')


@section('contenido')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AltaCategorías">
        Alta de categorías
    </button>


    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AltaNuevoCurso">
        Alta de nuevo curso
    </button>


    <div class="p-2 ">
        <form action="{{ route('filtro-categoria') }}" method="POST">
@csrf
            <select name="categoria_id" id="" class="form-select">
                <option class="form-control" value="">Todos</option>
                @foreach ($categorias as $categoria)

                <option class="form-control" value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>

                @endforeach
            </select>

            <input type="submit" value="buscar" class="btn bg-success " style="color: white;font-weight: 700 ;text-transform: uppercase;padding: 2px auto; margin-top: 5px;width: 100%">
        </form>
    </div>

    <div class="modal fade" id="AltaCategorías" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> Alta de categorías</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" class="" method="POST"
                        action="   {{ route('dashboard.controlCursos.alta') }}  ">

                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Categoria</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre ">
                            @error('nombre')
                                {{ $message }}
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="3" placeholder="Ingrese la descripción"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="featured" class="form-label">Imagen</label>
                            <input type="file" class="form-control" name="featured" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>



                    @foreach ($categorias as $categoria)
                        <form action="{{ route('dashboard.controlCursos.update', ['id' => $categoria->id]) }}"
                            method="post" enctype="multipart/form-data">


                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre Categoria</label>
                                <input type="text" class="form-control" name="nombre"
                                    value="{{ $categoria->nombre_categoria }}" placeholder="Ingrese el nombre ">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcion" rows="3" placeholder="Ingrese la descripción">{{ $categoria->descripcion_categoria }}</textarea>
                            </div>
                            <div class="mb-3">

                                <img width="300" src="{{ asset($categoria->image_path) }}" srcset="">
                                <br>
                                <label for="featured" class="form-label">Imagen</label>
                                <input type="file" class="form-control" name="featured">
                            </div>

                            <input type="submit" class="btn btn-primary" value="Actuaizar">





                        </form>
                        <form action="{{ route('dashboard.controlCursos.delete', ['id' => $categoria->id]) }} "
                            method="post">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>

                        <br>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <!-- Modal  ALTA DE  CURSOS-->
    <div class="modal fade" id="AltaNuevoCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alta de nuevo curso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action='/dashboard/controlCursos/altaCursos' enctype="multipart/form-data" method="post">

                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre_curso"
                                placeholder="Ingrese el nombre">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="3" placeholder="Ingrese la descripción"></textarea>
                        </div>

                        <select name="categoria_id" id="" class="form-select">
                            @foreach ($categorias as $categoria)
                                <option class="form-control" value="{{ $categoria->id }}">
                                    {{ $categoria->nombre_categoria }}</option>
                            @endforeach

                        </select>

                        <div class="mb-3">
                            <label for="featured" class="form-label">Imagen</label>
                            <input type="file" class="form-control" name="featured">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>

                </div>

            </div>
        </div>


        @section('contenido_info2')
        @include('controlCursos.tables_cursos', ['altaCursos' => $altaCursos,'reconocimiento'=>$reconocimiento,'terminacion'=>$terminacion])



        @endsection
     @endsection

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <script src="{{ asset('js/visible.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>

    @endpush
