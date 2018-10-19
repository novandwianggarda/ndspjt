@extends('adminlte::page')

@section('title', 'Year Tax')

@section('content_header')
    <h1>Year NOP</h1>
@stop

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" id="form-year" action="/pbb/2018add" method="POST">
                        @csrf
                        <div class="box-group" id="accordion">
                            <div class="panel box">
                                <!-- BASIC INFORMATION -->
                                @include('partials.forms.tax.certinformation')
                                @include('partials.forms.tax.pbbinfo')
                                @include('partials.forms.tax.tahun')
                                <!-- DETAILS INFORMATION-->
                                
                                <div class="form-groxup">
                                    <div class="col-sm-12" style="padding:0px 25px">
                                        <button type="submit" class="btn form-control ll-bgcolor ll-white" style="margin-top: 10px;">
                                            <i class="fa fa-plus"></i>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>

        var form = $('#form-year');

        var fvue = new Vue({
            el: '#form-year',
            data: {
                // land
                certificateIds: '',
                taxIds: '',
           },
            created() {
                var vm = this;
                vueEvent.$on('YC-certificateSelected', function() {
                    console.log($('#years-certificates').val().toString());
                    vm.certificateIds = $('#years-certificates').val().toString();
                });

                var vm = this;
                vueEvent.$on('YT-taxSelected', function() {
                    vm.taxIds = $('#years-tax').val().toString();
                });
                
            },
        });

    </script>
@stop
