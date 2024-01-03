<x-adminlte-modal id="modalEditar" title="Editar Alumno" theme="info" static-backdrop scrollable>

    <div class="container-fluid border-bottom">
        <p class="text-secondary"><b>Editar los datos como creas necesario</b>. Los campos con etiqueta * son obligatorios.</p>

        <form novalidate>
            <div class="form-group">
                <x-adminlte-input name="nombreEditar" id="nombreEditar" placeholder="* Nombre de cargo">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/etiqueta.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="apellido1Editar" id="apellido1Editar" placeholder="* Primer apellido de estudiante">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/estudiantes.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="apellido2Editar" id="apellido2Editar" placeholder="Segundo apellido de estudiante">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            <img src="{{ asset('icons/estudiantes.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="curpEditar" id="curpEditar" placeholder="* CURP de estudiante">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/binario.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="emailEditar" id="emailEditar" placeholder="* Email de estudiante">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/email.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select2 id="carreraEditar" name="carreraEditar" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            *<img src="{{ asset('icons/maletin.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-input-date name="fechaInicioEditar" id="fechaInicioEditar" placeholder="Elige la fecha de inicio de la carrera">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<i class="fas fa-calendar-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
                <x-adminlte-input-date name="fechaTerminoEditar" id="fechaTerminoEditar" placeholder="Elige la fecha de termino de la carrera">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<i class="fas fa-calendar-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
            </div>
            <input type="hidden" name="token" token="token" value="{{ csrf_token(); }}">
            <input type="hidden" name="id" id="id">
        </form>
    </div>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" label="Guardar Cambios" id="actualizar"></x-adminlte-button>
        <x-adminlte-button theme="danger" label="Cancelar" id="cancelar" data-dismiss="modal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>