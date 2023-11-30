@extends('layout.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
@endpush

@section('contenido')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AltaNuevoUsuario">
        Alta de usuario
    </button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AltaNuevoIdioma">
        Alta de Idioma
    </button>

    <div class="modal fade" id="AltaNuevoUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alta de nuevo curso</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action='{{ route('dashboard.crear') }}' enctype="multipart/form-data" method="post">

                        @csrf

                        <div>
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>
                        <div>
                            <label for="">Correo</label>
                            <input type="email" name="correo" class="form-control">
                        </div>
                        <div>
                            <label for="">Contraseña</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div>
                            <label for="">Telefono</label>
                            <input type="text" name="telefono" class="form-control">
                        </div>
                        <div>
                            <select class="form-select" data-live-search="true" name="pais" id="">

                                @foreach ($paises as $pais)
                                    <option value="{{ $pais->nombre }}" class="form-control"> {{ $pais->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <select class="form-select mt-2" data-live-search="true" name="idioma" id="">

                                @foreach ($idiomas as $idioma)
                                    <option value="{{ $idioma->nombre }}" class="form-control"> {{ $idioma->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Texto 1 </label>
                            <input type="text" class="form-control" name="text_1" id="">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Texto 2 </label>
                            <input type="text" class="form-control" name="text_2" id="">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Texto 3 </label>
                            <input type="text" class="form-control" name="text_3" id="">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Texto 4 </label>
                            <input type="text" class="form-control" name="text_4" id="">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Texto 5 </label>
                            <input type="text" class="form-control" name="text_5" id="">
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="activo" name="estado[]" value="1">
                            <label class="form-check-label" for="activo">Activo</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="inactivo" name="estado[]"
                                value="0">
                            <label class="form-check-label" for="inactivo">Inactivo</label>
                        </div>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>

                </div>

            </div>
        </div>
    @endsection


    @section('contenido_info')
        <div class="modal fade" id="AltaNuevoIdioma" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Alta de nuevo curso</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action='{{ route('dashboard.crearIdioma') }}' enctype="multipart/form-data" method="post">

                            @csrf

                            <div>
                                <label for="">Nombre de idioma</label>
                                <input type="text" name="idioma" class="form-control">
                            </div>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </form>

                    </div>

                </div>
            </div>
        @endsection


        @section('contenido_info2')
            @foreach ($usuarios as $usuario)
                <hr>

                <p>Nombre {{ $usuario->name }}</p>
                <p>Correo {{ $usuario->email }}</p>
                <p>Pais {{ $usuario->pais }}</p>

                <h1>Tus Cursos </h1>

                @foreach ($curso_asignado as $curso)
                    @if ($curso->user_id == $usuario->id)
                        <p>{{ $curso->nombre_curso }}</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalEncuesta{{ $curso->curso_id }}">
                            Encuesta
                        </button>
                        <br>
                        <br>
                    @endif


                    <div class="modal fade" id="modalEncuesta{{ $curso->curso_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $curso->curso_id}}">Asignar Curso</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Aquí puedes agregar un formulario para actualizar los datos del usuario -->
                                    <!-- Por ejemplo, campos para editar nombre, correo y país -->
                                    <form  method="post"  action="{{ route('dashboard.encuesta',['id'=>$curso->curso_id]) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="calificacion">¿Cómo calificas este curso?</label>
                                            <select class="form-control" id="calificacion" name="calificacion">
                                              <option value="1">1 - Muy malo</option>
                                              <option value="2">2 - Malo</option>
                                              <option value="3">3 - Regular</option>
                                              <option value="4">4 - Bueno</option>
                                              <option value="5">5 - Excelente</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label>¿Recomendarías este curso a un amigo?</label>
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="recomendar" id="recomendarSi" value="si">
                                              <label class="form-check-label" for="recomendarSi">
                                                Sí
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="recomendar" id="recomendarNo" value="no">
                                              <label class="form-check-label" for="recomendarNo">
                                                No
                                              </label>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label>¿Te interesa tomar otro curso con nosotros?</label>
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="interesOtroCurso" id="interesSi" value="si">
                                              <label class="form-check-label" for="interesSi">
                                                Sí
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="interesOtroCurso" id="interesNo" value="no">
                                              <label class="form-check-label" for="interesNo">
                                                No
                                              </label>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="comentario">Si te gustó el curso, deja tu comentario</label>
                                            <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
                                          </div>
                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>








                @endforeach

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalActualizar{{ $usuario->id }}">
                    Configuracion
                </button>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalAsignacion{{ $usuario->id }}">
                    Asignación de cursos
                </button>
                <div class="modal fade" id="modalActualizar{{ $usuario->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel{{ $usuario->id }}">Actualizar Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Aquí puedes agregar un formulario para actualizar los datos del usuario -->
                                <!-- Por ejemplo, campos para editar nombre, correo y país -->
                                <form method="post"
                                    action="{{ route('dashboard.altaUsuario.update', ['id' => $usuario->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" name="nombre" class="form-control"
                                            value="{{ $usuario->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo:</label>
                                        <input type="email" name="correo" class="form-control"
                                            value="{{ $usuario->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="telefono">Telefono:</label>
                                        <input type="text" name="telefono" class="form-control"
                                            value="{{ $usuario->telefono }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password" class="form-control"
                                            value="{{ $usuario->password }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Texto 1 </label>
                                        <input type="text" class="form-control" name="text_1" id=""
                                            value="{{ $usuario->texto1 }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Texto 2 </label>
                                        <input type="text" class="form-control" name="text_2" id=""
                                            value="{{ $usuario->texto2 }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Texto 3 </label>
                                        <input type="text" class="form-control" name="text_3" id=""
                                            value="{{ $usuario->texto3 }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Texto 4 </label>
                                        <input type="text" class="form-control" name="text_4" id=""
                                            value="{{ $usuario->texto4 }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Texto 5 </label>
                                        <input type="text" class="form-control" name="text_5" id=""
                                            value="{{ $usuario->texto5 }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="pais">Pais:</label>

                                        <select class="form-select" data-live-search="true" name="pais">
                                            <option value="{{ $usuario->pais }}" class="form-control">
                                                {{ $usuario->pais }}</option>

                                            @foreach ($paises as $pais)
                                                @if ($pais->nombre !== $usuario->pais)
                                                    <option value="{{ $pais->nombre }}" class="form-control">
                                                        {{ $pais->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="pais">Idioma:</label>

                                        <select class="form-select" data-live-search="true" name="idioma">
                                            <option value="{{ $usuario->idioma }}" class="form-control">
                                                {{ $usuario->idioma }}</option>

                                            @foreach ($idiomas as $idioma)
                                                @if ($idioma->nombre !== $usuario->idioma)
                                                    <option value="{{ $idioma->nombre }}" class="form-control">
                                                        {{ $idioma->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="activo" name="estado[]"
                                            value="1"{{ $usuario->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="activo">Activo</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="inactivo" name="estado[]"
                                            value="0"{{ $usuario->status == '0' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inactivo">Inactivo</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modalAsignacion{{ $usuario->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel{{ $usuario->id }}">Asignar Curso</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Aquí puedes agregar un formulario para actualizar los datos del usuario -->
                                <!-- Por ejemplo, campos para editar nombre, correo y país -->
                                <form method="post" action="{{ route('dashboard.asignarCurso') }}">
                                    @csrf
                                    <div class="form-group">

                                        <input type="hidden" name="user_id" class="form-control"
                                            value="{{ $usuario->id }}">
                                    </div>



                                    <div class="form-group">
                                        <label for="fecha"> fecha de vigencia :</label>
                                        <input type="date" name="fecha" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="pais">Cursos:</label>
                                        <select class="form-select" name="curso_id" id="">
                                            @foreach ($cursos as $curso)
                                                <option value="{{ $curso->id }}" class="form-control">
                                                    {{ $curso->nombre_curso }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="col">
                {{ $usuarios->links() }}
            </div>
        @endsection
