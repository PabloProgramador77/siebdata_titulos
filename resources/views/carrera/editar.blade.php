<x-adminlte-modal id="modalEditar" title="Editar Plan de Estudios" theme="info" static-backdrop scrollable>

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
                <x-adminlte-input name="rvoeEditar" id="rvoeEditar" placeholder="* RVOE de plan de estudios">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/binario.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="claveEditar" id="claveEditar" placeholder="* Clave de plan de estudios">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/binario.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select2 id="autoridadEditar" name="autoridadEditar[]" label-class="info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            *<img src="{{ asset('icons/legal.png') }}" alt="Icono Cargo" width="20px" height="auto">
                        </div>
                    </x-slot>
                    @foreach($autoridades as $autoridad)
                        <option value="{{ $autoridad->id }}">{{ $autoridad->nombre }}</option>
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