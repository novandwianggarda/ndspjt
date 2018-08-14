@extends('adminlte::page')

@section('title', 'Add Certificate')

@section('content_header')
    <h1>Add Certificate</h1>
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
                    <form class="form-horizontal" id="form-certificate" action="/certificate/add" method="POST">
                        @csrf
                        <div class="box-group" id="accordion">
                            <div class="panel box">
                                <!-- BASIC INFORMATION -->
                                @include('partials.forms.certificate.basicinformation')
                                <!-- FILES & MAPPING-->
                                @include('partials.forms.certificate.filesmapping')
                                <!-- BOUNDARY MAP -->
                                @include('partials.forms.certificate.boundarymap')
                                <!-- FUHRER INFORMATION -->
                                @include('partials.forms.certificate.furtherinformation')
                                
                                <div class="form-groxup">
                                    <div class="col-sm-12" style="padding:0px 25px">
                                        <button type="submit" class="btn form-control ll-bgcolor ll-white" style="margin-top: 10px;">
                                            <i class="fa fa-plus"></i>
                                            Add
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
   {{--} <style>
        h4.box-title {
            display: block !important;
            background-color: #a60099;
            padding: 10px;
            color: white;
        }
    </style>--}}
@stop

@section('js')
    <script type="text/javascript">
        var fvue = new Vue({
            el: '#form-certificate',
        });
    </script>
@stop