@extends('home')
@section('contenido')
    <div class="container-fluid col-md-12 bg-white rounded p-3 shadow">

        <h3 class="fs-4 fw-semibold">Perfil de IPES</h3>
        <p class="fs-5 fw-normal text-secondary border-primary border-bottom">Edita los datos como consideres necesarios. <b>Todos los campos con etiqueta * son obligatorios.</b></p>

        <form novalidate class="container-fluid row">
            @csrf
            <div class="form-group col-md-4">
                <x-adminlte-input name="nombre" id="nombre" label="*Nombre de IPES" placeholder="Nombre de IPES" label-class="text-info" value="{{ $user->name }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <img src="{{ asset('icons/escuela.png') }}" alt="Icono IPES" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="form-group col-md-4">
                <x-adminlte-input name="clave" id="clave" label="*Clave de IPES" placeholder="Clave de IPES" label-class="text-info" value="{{ $user->clave }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <img src="{{ asset('icons/binario.png') }}" alt="Icono IPES" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="form-group col-md-4">
                <x-adminlte-input type="email" name="email" id="email" label="*Email de IPES" placeholder="Email de IPES" label-class="text-info" value="{{ $user->email }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <img src="{{ asset('icons/email.png') }}" alt="Icono IPES" width="20px" height="auto">
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="form-group col-md-4">
                <x-adminlte-input type="password" name="password" id="password" label="Password de IPES" placeholder="Password de IPES" label-class="text-info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <img src="{{ asset('icons/candado.png') }}" alt="Icono IPES" width="20px" height="auto">
                        </div>
                    </x-slot>
                    <x-slot name="bottomSlot">
                        <span class="text-sm text-gray">No se muestra por seguridad. Introduce una si deseas actualizarla.</span>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="form-group col-md-4">
                <x-adminlte-input type="password" name="confirmPassword" id="confirmPassword" label="Confirmación de password" placeholder="Confirmación de password" label-class="text-info">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <img src="{{ asset('icons/contrasena.png') }}" alt="Icono IPES" width="20px" height="auto">
                        </div>
                    </x-slot>
                    <x-slot name="bottomSlot">
                        <span class="text-sm text-gray">Confirma la contraseña solo si la actualizaste.</span>
                    </x-slot>
                </x-adminlte-input>
            </div>

            <div class="form-group col-md-12">
                <x-adminlte-button label="Guardar cambios" theme="primary" class="btn-flat col-md-3" type="submit" id="actualizar" name="actualizar"></x-adminlte-button>
                <x-adminlte-button label="Cancelar" theme="danger" class="btn-flat col-md-3" type="reset" id="cancelar" name="cancelar"></x-adminlte-button>
            </div>

            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
            <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">

        </form>

        <script src="{{ asset('js/jquery-3.7.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/sweetAlert.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/ipes/actualizarIpes.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/ipes/cancelar.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/ipes/confirmarPass.js') }}" type="text/javascript"></script>
    </div>
@stop