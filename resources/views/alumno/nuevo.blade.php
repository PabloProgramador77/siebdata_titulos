<x-adminlte-modal id="modalNuevo" title="Nuevo Alumno" theme="primary" static-backdrop scrollable>
    <div class="container-fluid border-bottom">
        <p class="text-secondary">Los campos con etiqueta * son obligatorios.</p>
        <form novalidate>
            <div class="form-group">
                <x-adminlte-input name="nombre" id="nombre" placeholder="* Nombre de estudiante">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/estudiantes.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="apellido1" id="apellido1" placeholder="* Primer apellido de estudiante">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/estudiantes.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="apellido2" id="apellido2" placeholder="Segundo apellido de estudiante">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            <img src="{{ asset('icons/estudiantes.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="curp" id="curp" placeholder="* CURP de estudiante">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/binario.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="email" id="email" placeholder="* Email de estudiante">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/email.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select2 id="carrera" name="carrera" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/maletin.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-input-date name="fechaInicio" id="fechaInicio" placeholder="Fecha de inicio de la carrera. Ejemplo: 26-03-1991, 1991-03-26, 03-26-1991, etc.">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<i class="fas fa-calendar-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
                <x-adminlte-input-date name="fechaTermino" id="fechaTermino" placeholder="Fecha de termino de la carrera. Ejemplo: 26-03-1991, 1991-03-26, 03-26-1991, etc.">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<i class="fas fa-calendar-alt"></i>
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