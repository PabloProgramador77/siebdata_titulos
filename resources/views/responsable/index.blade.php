@extends('home')
@section('contenido')
    <div class="container-fluid col-md-12 p-2 bg-white">

        <div class="container-fluid row col-md-12 border-bottom p-2">

            <div class="col-md-5">
                <h4 class="my-auto">Responsables de Firma</h4>
            </div>
            <div class="col-md-4">
                <x-adminlte-input name="buscar" id="buscar" placeholder="Buscar por nombre">
                    <x-slot name="appendSlot">
                            <x-adminlte-button theme="outline-primary" label="Buscar"></x-adminlte-button>
                    </x-slot>
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            <img src="{{ asset('icons/buscar.png') }}" width="20px" height="auto" alt="Icono Buscar">
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <div class="col-md-3">
                <x-adminlte-button label="Agregar Responsable" theme="primary" data-toggle="modal" data-target="#modalNuevo"></x-adminlte-button>
            </div>

            @php
                $heads = [

                    'Nombre', 'CURP', 'Cargo', 'Acciones'

                ];
            @endphp
            
            <div class="container-fluid col-md-12 my-3">
                <x-adminlte-datatable id="responsables" :heads="$heads" theme="light" striped hoverable bordered compressed beautify>
                    @if( count( $responsables ) > 0 )
                        @foreach($responsables as $responsable)
                            <tr>
                                <td>{{ $responsable->nombre." ".$responsable->primerApellido." ".$responsable->segundoApellido }}</td>
                                <td>{{ $responsable->curp }}</td>
                                <td>{{ $responsable->cargo->descripcion }}</td>
                                <td>
                                    <x-adminlte-button id="editar" label="Editar" theme="info" data-toggle="modal" data-target="#modalEditar" data-id="{{ $responsable->id }}"></x-adminlte-button>
                                    <x-adminlte-button id="eliminar" label="Borrar" theme="danger" data-id="{{ $responsable->id }}"></x-adminlte-button>
                                    <x-adminlte-button id="llaves" label="Llaves" theme="warning"></x-adminlte-button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-info">Sin responsables de firma registrados</td>
                        </tr>
                    @endif
                    
                </x-adminlte-datatable>
            </div>

        </div>

    </div>

    @include('responsable.nuevo')
    @include('responsable.editar')

    <script src="{{ asset('js/jquery-3.7.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetAlert.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/responsable/agregar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/responsable/buscar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/responsable/actualizar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/responsable/borrar.js') }}" type="text/javascript"></script>

@stop