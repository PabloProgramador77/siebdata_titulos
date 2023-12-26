<x-adminlte-modal id="modalNuevo" title="Nuevo Plan de Estudios" theme="primary" static-backdrop scrollable>
    <div class="container-fluid border-bottom">
        <p class="text-secondary">Los campos con etiqueta * son obligatorios.</p>
        <form novalidate>
            <div class="form-group">
                <x-adminlte-input name="nombre" id="nombre" placeholder="* Nombre de plan de estudios">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/etiqueta.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="rvoe" id="rvoe" placeholder="* RVOE de plan de estudios">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/binario.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input name="clave" id="clave" placeholder="* Clave de plan de estudios">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/binario.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-select2 id="autoridad" name="autoridad[]" label-class="info">
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
        </form>
    </div>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" label="Registrar" id="registrar"></x-adminlte-button>
        <x-adminlte-button theme="danger" label="Cancelar" id="cancelar" data-dismiss="modal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>