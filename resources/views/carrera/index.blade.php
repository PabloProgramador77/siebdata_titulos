@extends('home')
@section('contenido')
    <div class="container-fluid col-md-12 p-2 bg-white">

        <div class="container-fluid row col-md-12 border-bottom p-2">

            <div class="col-md-6">
                <h4 class="my-auto">Planes de Estudio</h4>
                <p class="fs-6 fw-semibold text-secondary">Panel de Administrador</p>
            </div>
            <div class="col-md-6">
                <x-adminlte-button label="Agregar plan" theme="primary" data-toggle="modal" data-target="#modalNuevo"></x-adminlte-button>
            </div>

            @php
                $heads = [

                    'Plan de Estudio', 'RVOE', 'Clave', 'Acciones'

                ];
            @endphp
            
            <div class="container-fluid col-md-12 my-3">
                <x-adminlte-datatable id="cargos" :heads="$heads" theme="light" striped hoverable bordered compressed beautify>
                    
                    @if( count( $carreras ) > 0 )
                        @foreach($carreras as $carrera)
                            <tr>
                                <td>{{ $carrera->nombre }}</td>
                                <td>{{ $carrera->rvoe }}</td>
                                <td>{{ $carrera->clave }}</td>
                                <td>
                                    <x-adminlte-button class="editar" id="editar" label="Editar" theme="info" data-toggle="modal" data-target="#modalEditar" data-id="{{ $carrera->id }}"></x-adminlte-button>
                                    <x-adminlte-button class="eliminar" id="eliminar" label="Borrar" theme="danger" data-id="{{ $carrera->id }}"></x-adminlte-button>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <td colspan="4" class="text-info">Sin cargos de resposables de firma registrados</td>
                        </tr>
                    @endif
                    
                </x-adminlte-datatable>
            </div>

        </div>

    </div>

    @include('carrera.nuevo')
    @include('carrera.editar')

    <script src="{{ asset('js/jquery-3.7.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetAlert.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/carrera/agregar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/carrera/buscar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/carrera/actualizar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/carrera/borrar.js') }}" type="text/javascript"></script>

@stop