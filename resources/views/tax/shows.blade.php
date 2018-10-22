@extends('adminlte::page')

@section('title', 'Land-Lord')

@section('content_header')
@stop

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                	<h1 style="text-align: center;">DS ESTATES</h1>
                	<h3 style="text-align: center;">Detail Data Tax</h3>  

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" id="formshow-tax" action="" method="">
                    <!-- <form class="form-horizontal" id="form-tax" action="/taxes/add" method="POST" v-on:submit.prevent="submitForm"> -->
                        @csrf
                        <div class="box-group" id="accordion">
                            <div class="panel box">
                                <!-- BASIC INFORMATION -->
                                @include('partials.forms.show.tax.information')
                                <!-- TAX DETAILS INFORMATION-->
                                @include('partials.forms.show.tax.detailinformation')
                                
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>


        var form = $('#form-show-tax');
        var fvue = new Vue({
            el: '#formshow-tax',
            data: {
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
