@extends('home')
@section('contenido')
    <div class="container-fluid col-md-12 p-2 bg-white">

        <div class="container-fluid row col-md-12 border-bottom p-2">

            <div class="col-md-6">
                <h4 class="my-auto">Expediciones</h4>
                <p class="fs-6 fw-semibold text-secondary">Panel de Administrador</p>
            </div>
            <div class="col-md-6">
                <x-adminlte-button label="Agregar expedicion" theme="primary" data-toggle="modal" data-target="#modalNuevo"></x-adminlte-button>
            </div>

            @php
                $heads = [

                    'Fecha de Expedición', 'Alumno', 'Modalidad', 'Acciones'

                ];
            @endphp
            
            <div class="container-fluid col-md-12 my-3">
                <x-adminlte-datatable id="expediciones" :heads="$heads" theme="light" striped hoverable bordered compressed beautify>
                    
                    @if( count( $expediciones ) > 0 )

                        @foreach($expediciones as $expedicion)

                            <tr>
                                <td>{{ $expedicion->created_at }}</td>
                                <td>{{ $expedicion->alumno->nombre }} {{ $expedicion->alumno->primerApellido }} {{ $expedicion->alumno->segundoApellido }}</td>
                                <td>{{ $expedicion->titulacion->nombre }}</td>
                                
                                <td>
                                    <x-adminlte-button class="editar" id="editar" label="Editar" theme="info" data-toggle="modal" data-target="#modalEditar" data-id="{{ $expedicion->id }}"></x-adminlte-button>
                                    <x-adminlte-button class="eliminar" id="eliminar" label="Borrar" theme="danger" data-id="{{ $expedicion->id }}"></x-adminlte-button>
                                    <x-adminlte-button class="archivo" id="archivo" label="Archivo XML" theme="primary" data-toggle="modal" data-target="#modalArchivo" data-id="{{ $expedicion->id }}"></x-adminlte-button>
                                </td>
                            </tr>
                            
                        @endforeach

                    @else
                        <tr>
                            <td colspan="4" class="text-info">Sin expediciones registradas</td>
                        </tr>
                    @endif
                    
                </x-adminlte-datatable>
            </div>

        </div>

    </div>

    @include('expedicion.nuevo')
    @include('expedicion.editar')
    @include('archivo.nuevo')

    <script src="{{ asset('js/jquery-3.7.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetAlert.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/expedicion/agregar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/expedicion/buscar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/expedicion/actualizar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/expedicion/borrar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/expedicion/archivo.js') }}" type="text/javascript"></script>

@stop