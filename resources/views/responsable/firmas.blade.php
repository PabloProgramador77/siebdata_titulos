<x-adminlte-modal id="modalFirmas" title="Firmas Digitales de Responsable" theme="warning" static-backdrop scrollable>
    <div class="container-fluid border-bottom">
        <p class="text-secondary">Adjunta los archivos del responsable de firma. Solo se permiten archivos de tipo CER y KEY.</p>
        <form novalidate enctype="multipart/formdata">
            <div class="form-group">
                <x-adminlte-input-file name="key" id="key" placeholder="Elige el archivo de tipo KEY">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-info">
                            <img src="{{ asset('icons/documento.png') }}" alt="Icono Archivo" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
            </div>
            <input type="hidden" name="id" token="id" >
        </form>
    </div>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" label="Descifrar y Archivar" id="adjuntar"></x-adminlte-button>
        <x-adminlte-button theme="danger" label="Cancelar" id="cancelar" data-dismiss="modal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>