<x-adminlte-modal id="modalPermisos" title="Permisos de Rol de Usuario" size="xl" theme="secondary" static-backdrop scrollable>
    <div class="container-fluid border-bottom">
        <p class="text-secondary">Elige los permisos que deseas agregar al rol de usuario.</p>
        <form novalidate>
            <div class="form-group">
                <x-adminlte-input name="nombreRol" id="nombreRol" readonly="true">
                    <x-slot name="prependSlot">
                        <div class="input-group-text text-info">
                            <i class="fas fa-user-tag"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            <p class="text-secondary border-bottom">Permisos</p>
            <div class="form-group row">

                @foreach($permisos as $permiso)

                    <div class="col-md-6 col-lg-4">
                        <x-adminlte-input-switch id="permiso{{ $permiso->id }}" name="permiso" label="{{ $permiso->name }}" data-on-text="Permiso de {{ $permiso->name }}" data-off-text="Sin permiso de {{ $permiso->name }}" data-id="{{ $permiso->name }}">
                        </x-adminlte-input-switch>
                    </div>
                    
                @endforeach
            </div>
            <input type="hidden" name="id" token="id">
        </form>
    </div>
    <x-slot name="footerSlot">
        <x-adminlte-button theme="primary" label="Agregar" id="agregar"></x-adminlte-button>
        <x-adminlte-button theme="danger" label="Cancelar" id="cancelar" data-dismiss="modal"></x-adminlte-button>
    </x-slot>
</x-adminlte-modal>