@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">

        @foreach ($leases as $le)
        <div class="col-md-4">
            @include('partials.due_timeline')
        </div>
        @endforeach
    </div>
@stop

@section('css')

@stop

@section('js')

@stop