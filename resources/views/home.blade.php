@extends('adminlte::page')
@section('title', 'SIEBDATA')
@section('plugins.Datatables', true)
@section('plugins.Select2', true)
@section('plugins.JQuery', true)
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>¡Bienvenido a SIEBDATA!</h1>
    @yield('contenido')
@stop