@extends('home')
@section('contenido')
    <div class="container-fluid col-md-12 p-2 bg-white">

        <div class="container-fluid row col-md-12 border-bottom p-2">

            <div class="col-md-6">
                <h4 class="my-auto">Archivos XML</h4>
                <p class="fs-6 fw-semibold text-secondary">Panel de Administrador</p>
            </div>
            <div class="col-md-6">
                <x-adminlte-button label="Agregar archivo" theme="primary" data-toggle="modal" data-target="#modalNuevo"></x-adminlte-button>
            </div>

            @php
                $heads = [

                    'Folio', 'Alumno', 'Acciones'

                ];
            @endphp
            
            <div class="container-fluid col-md-12 my-3">
                <x-adminlte-datatable id="cargos" :heads="$heads" theme="light" striped hoverable bordered compressed beautify>
                    
                    @if( count( $archivos ) > 0 )
                        @foreach($archivos as $archivo)
                            <tr>
                                <td>{{ $archivo->folio }}</td>
                                <td>{{ $archivo->expedicion->alumno->nombre }} {{ $archivo->expedicion->alumno->primerApellido }} {{ $archivo->expedicion->alumno->segundoApellido }}</td>
                                
                                <td>
                                    <x-adminlte-button class="editar" id="editar" label="Editar" theme="info" data-toggle="modal" data-target="#modalEditar" data-id="{{ $archivo->id }}"></x-adminlte-button>
                                    <x-adminlte-button class="eliminar" id="eliminar" label="Borrar" theme="danger" data-id="{{ $archivo->id }}"></x-adminlte-button>
                                    <a href="{{ url('/archivo/descarga') }}/{{ $archivo->id }}" class="btn btn-secondary" id="descarga">Descargar</a>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <td colspan="4" class="text-info">Sin archivos generados/registrados.</td>
                        </tr>
                    @endif
                    
                </x-adminlte-datatable>
            </div>

        </div>

    </div>

    @include('archivo.nuevo')
    @include('archivo.editar')

    <script src="{{ asset('js/jquery-3.7.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetAlert.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/archivo/buscar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/archivo/actualizar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/archivo/borrar.js') }}" type="text/javascript"></script>

@stop