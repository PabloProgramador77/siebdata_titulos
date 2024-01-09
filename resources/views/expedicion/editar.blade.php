<x-adminlte-modal id="modalEditar" title="Editar Alumno" theme="info" static-backdrop scrollable>

    <div class="container-fluid border-bottom">
        <p class="text-secondary"><b>Editar los datos como creas necesario</b>. Los campos con etiqueta * son obligatorios.</p>

        <form novalidate>
            <div class="form-group">
                <x-adminlte-select2 id="alumnoEditar" name="alumnoEditar" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/estudiantes.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id }}">{{ $alumno->nombre }} {{ $alumno->primerApellido }} {{ $alumno->segundoApellido }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-select2 id="servicioEditar" name="servicioEditar" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/legal.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    <option value="1">Servicio social cumplido</option>
                    <option value="0">Servicio social no cumplido</option>
                </x-adminlte-select2>
                <x-adminlte-select2 id="fundamentoEditar" name="fundamentoEditar" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/legal.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($fundamentos as $fundamento)
                        <option value="{{ $fundamento->id }}">{{ $fundamento->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-select2 id="titulacionEditar" name="titulacionEditar" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/legal.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($titulaciones as $titulacion)
                        <option value="{{ $titulacion->id }}">{{ $titulacion->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-select2 id="entidadEditar" name="entidadEditar" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/mapa.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($entidades as $entidad)
                        <option value="{{ $entidad->id }}">{{ $entidad->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-input-date name="fechaExamenEditar" id="fechaExamenEditar" placeholder="Fecha de examen de títulación. Ejemplo: 26-03-1991, 1991-03-26, 03-26-1991, etc.">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<i class="fas fa-calendar-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
                <x-adminlte-input-date name="fechaExencionEditar" id="fechaExencionEditar" placeholder="Fecha de exención de títulación. Ejemplo: 26-03-1991, 1991-03-26, 03-26-1991, etc.">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<i class="fas fa-calendar-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
            <input type="hidden" name="id" id="id">
        </form>
    </div>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" label="Guardar Cambios" id="actualizar"></x-adminlte-button>
        <x-adminlte-button theme="danger" label="Cancelar" id="cancelar" data-dismiss="modal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>