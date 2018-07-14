@extends('adminlte::master')

@section('adminlte_css')
    <style>
        body {
            background-color: #00a65a !important;
        }
    </style>
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <h1>Welcome home our new LandLord</h1>
@stop

@section('adminlte_js')
    @yield('js')
@stop
