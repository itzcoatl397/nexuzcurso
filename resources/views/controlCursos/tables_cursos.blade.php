 <div class="table-responsive mt-8 p-5">
            <br>
            <table class="table table-striped
    table-hover
    table-borderless
    table-primary
    align-middle p-2">
                <thead class="table-light">

                    <tr>
                        <th> Nombre Curso</th>
                        <th>Descripcion</th>
                        <th>Imagenes </th>
                        <th>Categoria </th>


                        <th>Acciones </th>
                        <th>Visibilidad </th>
                        <th>temas </th>
                        <th>Acciones </th>



                    </tr>
                </thead>
                <tbody class="table-group-divider">


                    @foreach ($altaCursos as $altaCurso)
                        <tr class="table-primary">
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





                            </td>

                            <td scope="row">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#actualizarModal{{ $altaCurso->id }}">
                                    Actualizar
                                </button>

                                <form action="{{ route('controlCursos.delete_Cursos', ['id' => $altaCurso->id]) }} "
                                    method="post">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>

                            <td>
                                <form action="" >


                                    <input type="hidden" class="id_curso" value="{{ $altaCurso->id }}">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input flexSwitchCheckDefault" type="checkbox" role="switch" value="1" {{$altaCurso->visible == 1 ? 'checked' : ''}}
                                            >

                                    </div>
                                </form>
                            </td>

                            <td>     <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addTemas{{ $altaCurso->id }}">
                                Temas
                            </button></td>



                            <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#reconocimiento{{ $altaCurso->id }}"> Reconocimiento
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#terminacion{{ $altaCurso->id }}"> Terminacion
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#puntos{{ $altaCurso->id }}"> Puntos
                            </td>
                        </tr>

                        <div class="modal fade" id="actualizarModal{{ $altaCurso->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Encabezado del modal -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar Curso</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <!-- Cuerpo del modal -->
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('controlCursos.update_cursos', ['id' => $altaCurso->id]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre Categoria</label>
                                                <input type="text" class="form-control" name="nombre"
                                                    value="{{ $altaCurso->nombre_curso }}"
                                                    placeholder="Ingrese el nombre">
                                            </div>
                                            <div class="mb-3">
                                                <label for="descripcion" class="form-label">Descripción</label>
                                                <textarea class="form-control" name="descripcion" rows="3" placeholder="Ingrese la descripción">{{ $altaCurso->descripcion_curso }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <img width="300" src="{{ asset($altaCurso->image_path) }}"
                                                    srcset="">
                                                <br>
                                                <label for="featured" class="form-label">Imagen</label>
                                                <input type="file" class="form-control" name="featured">
                                            </div>
                                            <input type="submit" class="btn btn-primary" value="Actualizar">
                                        </form>


                                    </div>



                                    <!-- Pie del modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="addTemas{{ $altaCurso->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Encabezado del modal -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Temas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <!-- Cuerpo del modal -->
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('temas-curso', ['id' => $altaCurso->id]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre tema</label>
                                                <input type="text" class="form-control" name="nombre_tema"

                                                    placeholder="Ingrese el nombre">
                                            </div>
                                            <div class="mb-3">
                                                <label for="descripcion" class="form-label">Descripción</label>
                                                <textarea class="form-control" name="descripcion" rows="3" placeholder="Ingrese la descripción"></textarea>
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="añadir">
                                        </form>
                                       <div class="mt-2">
                                        <h1 class="" style="font-size: 30px;  text-transform: capitalize;">Tus  temas </h1>
                                        @php
                                        $found = false; // Initialize the flag variable
                                        @endphp


                                        @foreach ($temasCursos as $temaCurso)
                                            @if ($temaCurso->curso_id == $altaCurso->id)
                                                <div class="row p-2">
                                                    <a href="{{ route('temas-editar', $temaCurso->id ) }}"   class="link-offset-2 link-underline link-underline-opacity-0" >{{ $temaCurso->nombre_tema }}</a>
                                                </div>
                                                @php
                                                $found = true; // Set the flag to true when a matching record is found
                                                @endphp
                                            @endif

                                        @endforeach
                                        @if (!$found)
                                        <p>No tienes temas asignados</p>
                                    @endif



                                       </div>
                                    </div>

                                    <!-- Pie del modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="reconocimiento{{ $altaCurso->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Encabezado del modal -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">reconocimiento</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <!-- Cuerpo del modal -->
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('reconocimiento', ['id' => $altaCurso->id]) }}"
                                            method="post" enctype="multipart/form-data">
@csrf
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Imagen de  fondo</label>
                                             <input type="file"  class="form-control" name="fondo" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Imagen de  Pie de  pagina</label>
                                             <input type="file"  class="form-control" name="pie_pagina" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Imagen de  Encabezado</label>
                                             <input type="file"  class="form-control" name="encabezado" id="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Texto 1 </label>
                                             <input type="text"  class="form-control" name="text_1" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Texto 2 </label>
                                             <input type="text"  class="form-control" name="text_2" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Texto 3 </label>
                                             <input type="text"  class="form-control" name="text_3" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Texto 4 </label>
                                             <input type="text"  class="form-control" name="text_4" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Texto 5 </label>
                                             <input type="text"  class="form-control" name="text_5" id="">
                                            </div>
                                            <input type="submit" class="btn btn-primary" value="Actualizar">
                                        </form>



                                        @php
                                        $found = false; // Initialize the flag variable
                                        @endphp


                                        @foreach ($reconocimiento as $recon)
                                            @if ($recon->curso_id == $altaCurso->id)
                                                <div class="row p-2">

                                                </div>
                                                @php
                                                $found = true; // Set the flag to true when a matching record is found
                                                @endphp
                                            @endif

                                        @endforeach
                                        @if (!$found)
                                        <p>No tienes temas asignados</p>
                                    @endif


                                    </div>



                                    <!-- Pie del modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="terminacion{{ $altaCurso->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Encabezado del modal -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar Curso</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <!-- Cuerpo del modal -->
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('terminar', ['id' => $altaCurso->id]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Texto 1 </label>
                                             <input type="text"  class="form-control" name="text_1" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Texto 2 </label>
                                             <input type="text"  class="form-control" name="text_2" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Texto 3 </label>
                                             <input type="text"  class="form-control" name="text_3" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Imagen </label>
                                             <input type="file"  class="form-control" name="fondo" id="">
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="Actualizar">
                                        </form>


                                        @php
                                        $found = false; // Initialize the flag variable
                                        @endphp


                                        @foreach ($terminacion as $termi)
                                            @if ($termi->curso_id == $altaCurso->id)
                                                <div class="row p-2">
                                                    <a href="{{ route('vista-previa2', $termi->id ) }}"   class="link-offset-2 link-underline link-underline-opacity-0" >Vista Previa</a>
                                                </div>
                                                @php
                                                $found = true; // Set the flag to true when a matching record is found
                                                @endphp
                                            @endif

                                        @endforeach
                                        @if (!$found)
                                        <p>No tienes temas asignados</p>
                                    @endif
                                    </div>



                                    <!-- Pie del modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="puntos{{ $altaCurso->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Encabezado del modal -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Puntos  Humanizate</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <!-- Cuerpo del modal -->
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('puntos', ['id' => $altaCurso->id]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Puntos </label>
                                             <input type="text"  class="form-control" name="puntos" id="">
                                            </div>



                                            <input type="submit" class="btn btn-primary" value="Actualizar">
                                        </form>


                                        @php
                                        $found = false; // Initialize the flag variable
                                        @endphp


                                        @foreach ($terminacion as $termi)
                                            @if ($termi->curso_id == $altaCurso->id)
                                                <div class="row p-2">
                                                    <a href="{{ route('vista-previa2', $termi->id ) }}"   class="link-offset-2 link-underline link-underline-opacity-0" >Vista Previa</a>
                                                </div>
                                                @php
                                                $found = true; // Set the flag to true when a matching record is found
                                                @endphp
                                            @endif

                                        @endforeach
                                        @if (!$found)
                                        <p>No tienes temas asignados</p>
                                    @endif
                                    </div>



                                    <!-- Pie del modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
