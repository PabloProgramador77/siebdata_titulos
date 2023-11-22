<x-adminlte-modal id="modalEditar" title="Editar Responsable" theme="info" static-backdrop scrollable>

    <div class="container-fluid border-bottom">
        <p class="text-secondary"><b>Editar los datos del responsable como creas necesario</b>. Los campos con etiqueta * son obligatorios.</p>

        <form novalidate>
            <div class="form-group">
                <x-adminlte-input name="nombreEditar" id="nombreEditar" placeholder="* Nombre(s)">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/persona.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="primerApellidoEditar" id="primerApellidoEditar" placeholder="* Primer Apellido">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/persona.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="segundoApellidoEditar" id="segundoApellidoEditar" placeholder="* Segundo Apellido">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/persona.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="curpEditar" id="curpEditar" placeholder="* CURP">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/binario.png') }}" alt="Icono Curp" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="tituloEditar" id="tituloEditar" placeholder="Abreviatura de título: Lic, Ing, etc.">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            <img src="{{ asset('icons/etiqueta.png') }}" alt="Icono Título" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select2 id="cargoEditar" name="cargo[]" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            *<img src="{{ asset('icons/maletin.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($cargos as $cargo)
                        <option value="{{ $cargo->id }}">{{ $cargo->descripcion }}</option>
                    @endforeach
                </x-adminlte-select2>
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