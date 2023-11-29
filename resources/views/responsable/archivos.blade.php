<x-adminlte-modal id="modalArchivos" title="Firmas Digitales de Responsable" theme="secondary" static-backdrop scrollable>
    <div class="container-fluid border-bottom">
        <p class="text-secondary">Adjunta los archivos del responsable de firma. Solo se permiten archivos de tipo CER y KEY.</p>
        <form novalidate enctype="multipart/formdata">
            <div class="form-group">
                <x-adminlte-input-file name="cer" id="cer" placeholder="Elige el archivo de tipo CER">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-info">
                            <img src="{{ asset('icons/documento.png') }}" alt="Icono Archivo" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
            </div>
            <input type="hidden" name="id" token="id">
        </form>
    </div>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" label="Descifrar y Archivar" id="archivar"></x-adminlte-button>
        <x-adminlte-button theme="danger" label="Cancelar" id="cancelar" data-dismiss="modal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>