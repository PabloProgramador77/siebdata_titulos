@extends('home')
@section('contenido')
    <div class="container-fluid col-md-12 bg-white p-2 rounded">
        
        <p class="fs-3 fw-bold text-center bg-light border p-2 my-4 rounded shadow">Resumen Institucional</p>
        <x-adminlte-input-switch id="modo" name="modo" data-on-text="Modo Certificado" data-off-text="Modo Título"></x-adminlte-input-switch>
        <div class="container-fluid row">
            
            <div class="col-md-4">
                <x-adminlte-small-box title="Alumnos" text="Alumnos registrados" theme="primary" url="/alumnos" url-text="Ver todos los alumnos"></x-adminlte-small-box>
            </div>
            <div class="col-md-4">
                <x-adminlte-small-box title="Responsables de Firma" text="Responsables registrados" theme="secondary" url="/responsables" url-text="Ver todos los responsables"></x-adminlte-small-box>
            </div>
            <div class="col-md-4">
                <x-adminlte-small-box title="Planes de Estudio" text="Planes registrados" theme="info" url="/carreras" url-text="Ver todos los planes de estudio"></x-adminlte-small-box>
            </div>
            <div class="col-md-4">
                <x-adminlte-small-box title="Expediciones" text="Expediciones registradas" theme="success" url="/expediciones" url-text="Ver todos los expediciones"></x-adminlte-small-box>
            </div>
            <div class="col-md-4">
                <x-adminlte-small-box title="Archivos" text="Archivos registrados" theme="warning" url="/archivos" url-text="Ver todos los archivos"></x-adminlte-small-box>
            </div>

        </div>
        
    </div>

@endsection