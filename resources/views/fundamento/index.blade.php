@extends('home')
@section('contenido')
    <div class="container-fluid col-md-12 p-2 bg-white">

        <div class="container-fluid row col-md-12 border-bottom p-2">

            <div class="col-md-6">
                <h4 class="my-auto">Fundamentos de Servicio Social</h4>
                <p class="fs-6 fw-semibold text-secondary">Panel de Administrador</p>
            </div>
            <div class="col-md-6">
                <x-adminlte-button label="Agregar fundamento" theme="primary" data-toggle="modal" data-target="#modalNuevo"></x-adminlte-button>
            </div>

            @php
                $heads = [

                    'ID', 'Niveles de fundamento', 'Acciones'

                ];
            @endphp
            
            <div class="container-fluid col-md-12 my-3">
                <x-adminlte-datatable id="cargos" :heads="$heads" theme="light" striped hoverable bordered compressed beautify>
                    
                    @if( count( $fundamentos ) > 0 )
                        @foreach($fundamentos as $fundamento)
                            <tr>
                                <td>{{ $fundamento->idFundamento }}</td>
                                <td>{{ $fundamento->nombre }}</td>
                                
                                <td>
                                    <x-adminlte-button class="editar" id="editar" label="Editar" theme="info" data-toggle="modal" data-target="#modalEditar" data-id="{{ $fundamento->id }}"></x-adminlte-button>
                                    <x-adminlte-button class="eliminar" id="eliminar" label="Borrar" theme="danger" data-id="{{ $fundamento->id }}"></x-adminlte-button>
                                </td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <td colspan="4" class="text-info">Sin niveles de fundamentos registrados</td>
                        </tr>
                    @endif
                    
                </x-adminlte-datatable>
            </div>

        </div>

    </div>

    @include('fundamento.nuevo')
    @include('fundamento.editar')

    <script src="{{ asset('js/jquery-3.7.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetAlert.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/fundamento/agregar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/fundamento/buscar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/fundamento/actualizar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/fundamento/borrar.js') }}" type="text/javascript"></script>

@stop