@extends('home')
@section('contenido')
    <div class="container-fluid col-md-12 p-2 bg-white">

        <div class="container-fluid row col-md-12 border-bottom p-2">

            <div class="col-md-6">
                <h4 class="my-auto">Titulaciones</h4>
                <p class="fs-6 fw-semibold text-secondary">Panel de Administrador</p>
            </div>
            <div class="col-md-6">
                <x-adminlte-button label="Agregar titulación" theme="primary" data-toggle="modal" data-target="#modalNuevo"></x-adminlte-button>
            </div>

            @php
                $heads = [

                    'ID', 'Tipo de Titulación', 'Acciones'

                ];
            @endphp
            
            <div class="container-fluid col-md-12 my-3">
                <x-adminlte-datatable id="cargos" :heads="$heads" theme="light" striped hoverable bordered compressed beautify>
                    
                    @if( count( $titulaciones ) > 0 )
                        @foreach($titulaciones as $titulacion)
                            <tr>
                                <td>{{ $titulacion->idTitulacion }}</td>
                                <td>{{ $titulacion->nombre }}</td>
                                
                                <td>
                                    <x-adminlte-button class="editar" id="editar" label="Editar" theme="info" data-toggle="modal" data-target="#modalEditar" data-id="{{ $titulacion->id }}"></x-adminlte-button>
                                    <x-adminlte-button class="eliminar" id="eliminar" label="Borrar" theme="danger" data-id="{{ $titulacion->id }}"></x-adminlte-button>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <td colspan="4" class="text-info">Sin titulaciones registradas</td>
                        </tr>
                    @endif
                    
                </x-adminlte-datatable>
            </div>

        </div>

    </div>

    @include('titulacion.nuevo')
    @include('titulacion.editar')

    <script src="{{ asset('js/jquery-3.7.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetAlert.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/titulacion/agregar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/titulacion/buscar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/titulacion/actualizar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/titulacion/borrar.js') }}" type="text/javascript"></script>

@stop