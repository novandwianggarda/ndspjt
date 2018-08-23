@extends('adminlte::page')

@section('title', 'Add Property')

@section('content_header')
    <h1>Add Property</h1>
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
                    <form class="form-horizontal" id="form-property" action="/properties/add" method="POST">
                        @csrf
                        <div class="box-group" id="accordion">
                            <div class="panel box">
                                <!-- BASIC INFORMATION -->
                                @include('partials.forms.properties.basicinformation')
                                
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

@section('js')
        <script type="text/javascript">
                    // property
        var oldLandArea = "{{ old('prop_land_area') }}";
        var oldBuildingArea = "{{ old('prop_building_area') }}";

            var fvue = new Vue({
                el: '#form-property',
                data: {
                    landArea: oldLandArea,
                    buildingArea: oldBuildingArea,
                }
            });
        </script>
@stop