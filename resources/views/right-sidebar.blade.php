@section('right-sidebar')

    <p class="fw-bold fs-5 text-center p-2 border-bottom bg-secondary">Configuración avanzada</p>
    <div class="row">
        <div class="col-12">
            <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                <a class="nav-link" href="{{ url('/cargos') }}" role="tab" aria-controls="v-pills-home" aria-selected="false">
                    <img src="{{ asset('icons/etiqueta.png') }}" alt="" width="25px" height="auto" class="p-1 rounded"> Cargos
                </a>
                <a class="nav-link" id="v-pills-profile-tab" href="{{ url('/autoridades') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <img src="{{ asset('icons/escuela.png') }}" alt="" width="25px" height="auto" class="p-1 rounded"> Autoridades de RVOE
                </a>
                <a class="nav-link" id="v-pills-messages-tab" href="{{ url('/entidades') }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                    <img src="{{ asset('icons/mapa.png') }}" alt="" width="25px" height="auto" class="p-1 rounded"> Entidades Federativas
                </a>
                <a class="nav-link" id="v-pills-settings-tab" href="#" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                    <img src="{{ asset('icons/estudiantes.png') }}" alt="" width="25px" height="auto" class="p-1 rounded"> Niveles de Estudios
                </a>
                <a class="nav-link" id="v-pills-home-tab" href="#" role="tab" aria-controls="v-pills-home" aria-selected="false">
                    <img src="{{ asset('icons/legal.png') }}" alt="" width="25px" height="auto" class="p-1 rounded"> Fundamentos de S.S.
                </a>
                <a class="nav-link" id="v-pills-profile-tab" href="{{ url('/titulaciones') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <img src="{{ asset('icons/titulo.png') }}" alt="" width="25px" height="auto" class="p-1 rounded"> Titulaciones
                </a>
            </div>
        </div>
    </div>

@stop