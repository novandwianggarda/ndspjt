@extends('adminlte::page')

@section('title', 'Add New Tax')

@section('content_header')
    <h1>Add New NOP</h1>
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
                    <form class="form-horizontal" id="form-tax" action="/taxes/add" method="POST">
                    <!-- <form class="form-horizontal" id="form-tax" action="/taxes/add" method="POST" v-on:submit.prevent="submitForm"> -->
                        @csrf
                        <div class="box-group" id="accordion">
                            <div class="panel box">
                                <!-- BASIC INFORMATION -->
                                @include('partials.forms.tax.information')
                                @include('partials.forms.tax.detailinformation')
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
   {{-- <style>
        h4.box-title {
            display: block !important;
            background-color: #a60099;
            padding: 10px;
            color: white;
        }
    </style> --}}
@stop



@section('js')
    <script>

        var form = $('#form-add-tax');
        var fvue = new Vue({
            el: '#form-tax',
            data: {
                // shared
                shared: vueShared,

                // land
                certificateIds: '',
            },
            methods: {
                submitForm() {
                    console.log(form.serialize());
                },
            },
            created() {
                var vm = this;
                vueEvent.$on('TC-certificateSelected', function() {
                    vm.certificateIds = $('#taxes-certificates').val().toString();
                });
            },
        });

    </script>







@stop
