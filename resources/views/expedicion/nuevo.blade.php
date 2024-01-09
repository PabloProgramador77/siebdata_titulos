<x-adminlte-modal id="modalNuevo" title="Nueva Expedición" theme="primary" static-backdrop scrollable>
    <div class="container-fluid border-bottom">
        <p class="text-secondary">Los campos con etiqueta * son obligatorios.</p>
        <form novalidate>
            <div class="form-group">
                <x-adminlte-select2 id="alumno" name="alumno" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/estudiantes.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id }}">{{ $alumno->nombre }} {{ $alumno->primerApellido }} {{ $alumno->segundoApellido }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-select2 id="servicio" name="servicio" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/legal.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    <option value="1">Servicio social cumplido</option>
                    <option value="0">Servicio social no cumplido</option>
                </x-adminlte-select2>
                <x-adminlte-select2 id="fundamento" name="fundamento" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/legal.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($fundamentos as $fundamento)
                        <option value="{{ $fundamento->id }}">{{ $fundamento->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-select2 id="titulacion" name="titulacion" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/legal.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($titulaciones as $titulacion)
                        <option value="{{ $titulacion->id }}">{{ $titulacion->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-select2 id="entidad" name="entidad" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/mapa.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($entidades as $entidad)
                        <option value="{{ $entidad->id }}">{{ $entidad->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-input-date name="fechaExamen" id="fechaExamen" placeholder="Fecha de examen de títulación. Ejemplo: 26-03-1991, 1991-03-26, 03-26-1991, etc.">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
                <x-adminlte-input-date name="fechaExencion" id="fechaExencion" placeholder="Fecha de exención de títulación. Ejemplo: 26-03-1991, 1991-03-26, 03-26-1991, etc.">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
        </form>
    </div>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" label="Registrar" id="registrar"></x-adminlte-button>
        <x-adminlte-button theme="danger" label="Cancelar" id="cancelar" data-dismiss="modal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>