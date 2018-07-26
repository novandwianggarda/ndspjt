@extends('adminlte::page')

@section('title', 'Add Certificate')

@section('content_header')
    <h1>Add Certificate</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('partials.forms.certificate')
        </div>
    </div>
@stop

@section('css')
    <style>
        h4.box-title {
            display: block !important;
            background-color: #a60099;
            padding: 10px;
            color: white;
        }
    </style>
@stop

@section('js')

@stop