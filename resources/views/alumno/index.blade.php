@extends('home')
@section('contenido')
    <div class="container-fluid col-md-12 p-2 bg-white">

        <div class="container-fluid row col-md-12 border-bottom p-2">

            <div class="col-md-6">
                <h4 class="my-auto">Alumnos Egresados</h4>
                <p class="fs-6 fw-semibold text-secondary">Panel de Administrador</p>
            </div>
            <div class="col-md-6">
                <x-adminlte-button label="Agregar alumno" theme="primary" data-toggle="modal" data-target="#modalNuevo"></x-adminlte-button>
            </div>

            @php
                $heads = [

                    'Alumno', 'CURP', 'Acciones'

                ];
            @endphp
            
            <div class="container-fluid col-md-12 my-3">
                <x-adminlte-datatable id="alumnos" :heads="$heads" theme="light" striped hoverable bordered compressed beautify>
                    
                    @if( count( $alumnos ) > 0 )

                        @foreach($alumnos as $alumno)

                            <tr>
                                <td>{{ $alumno->nombre }} {{ $alumno->primerApellido }} {{ $alumno->segundoApellido }}</td>
                                <td>{{ $alumno->curp }}</td>
                                
                                <td>
                                    <x-adminlte-button class="editar" id="editar" label="Editar" theme="info" data-toggle="modal" data-target="#modalEditar" data-id="{{ $alumno->id }}"></x-adminlte-button>
                                    <x-adminlte-button class="eliminar" id="eliminar" label="Borrar" theme="danger" data-id="{{ $alumno->id }}"></x-adminlte-button>
                                    
                                    @if( $alumno->antecedente )
                                        <x-adminlte-button class="editarAntecedente" id="antecedente" label="Antecedentes" theme="warning" data-id="{{ $alumno->antecedente->id }}" data-toggle="modal" data-target="#modalEditarAntecedente"></x-adminlte-button>
                                    @else
                                        <x-adminlte-button class="antecedente" id="antecedente" label="Antecedentes" theme="secondary" data-id="{{ $alumno->id }}" data-toggle="modal" data-target="#modalAntecedente"></x-adminlte-button>
                                    @endif
                                </td>
                            </tr>
                            
                        @endforeach

                    @else
                        <tr>
                            <td colspan="4" class="text-info">Sin alumnos egresados registrados</td>
                        </tr>
                    @endif
                    
                </x-adminlte-datatable>
            </div>

        </div>

    </div>

    @include('alumno.nuevo')
    @include('alumno.editar')
    @include('alumno.antecedente')
    @include('antecedente.editar')

    <script src="{{ asset('js/jquery-3.7.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetAlert.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/alumno/agregar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/alumno/buscar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/alumno/actualizar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/alumno/borrar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/antecedente/agregar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/antecedente/buscar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/antecedente/actualizar.js') }}" type="text/javascript"></script>

@stop