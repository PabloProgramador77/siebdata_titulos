<x-adminlte-modal id="modalEditarAntecedente" title="Editar Antecedente Académico" theme="warning" static-backdrop scrollable>
    <div class="container-fluid border-bottom">
        <p class="text-secondary">Los campos con etiqueta * son obligatorios.</p>
        <form novalidate>
            <div class="form-group">
                <x-adminlte-input name="editarNombreAnt" id="editarNombreAnt" placeholder="* Nombre de Institución">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/escuela.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input-date name="editarFechaInicioAnt" id="editarFechaInicioAnt" placeholder="Fecha de inicio de estudios. Ejemplo: 1991-03-26">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<i class="fas fa-calendar-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
                <x-adminlte-input-date name="editarFechaTerminoAnt" id="editarFechaTerminoAnt" placeholder="Fecha de termino de estudios. Ejemplo: 1991-03-26">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<i class="fas fa-calendar-alt"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-date>
                <x-adminlte-select2 id="editarEstudio" name="editarEstudio" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/maletin.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($estudios as $estudio)
                        <option value="{{ $estudio->id }}">{{ $estudio->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-select2 id="editarEntidad" name="editarEntidad" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            *<img src="{{ asset('icons/mapa.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($entidades as $entidad)
                        <option value="{{ $entidad->id }}">{{ $entidad->nombre }}</option>
                    @endforeach
                </x-adminlte-select2>
                <x-adminlte-input name="editarCedula" id="editarCedula" placeholder="Cédula Profesional">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            <img src="{{ asset('icons/legal.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <input type="hidden" name="idAntecedente" id="idAntecedente">
        </form>
    </div>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" label="Guardar Cambios" id="guardar"></x-adminlte-button>
        <x-adminlte-button theme="danger" label="Cancelar" id="cancelar" data-dismiss="modal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>