<x-adminlte-modal id="modalEditar" title="Editar Archivo XML" theme="info" static-backdrop scrollable>

    <div class="container-fluid border-bottom">
        <p class="text-secondary"><b>Editar los datos como creas necesario</b>. Los campos con etiqueta * son obligatorios.</p>

        <form novalidate>
            <div class="form-group">
                <x-adminlte-input name="folioEditar" id="folioEditar" placeholder="* Folio de Control">
                    <x-slot name="prependSlot">
                        <div class="input-group-text tex-info">
                            *<img src="{{ asset('icons/binario.png') }}" alt="Icono Nombre" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
                
            </div>
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="idExpedicion" id="idExpedicion">
        </form>
    </div>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" label="Guardar Cambios" id="actualizar"></x-adminlte-button>
        <x-adminlte-button theme="danger" label="Cancelar" id="cancelar" data-dismiss="modal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>