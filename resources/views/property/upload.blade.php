@extends('adminlte::page')

@section('title', 'Import Property')

@section('content_header')
    <h1>Import Property</h1>
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
                    <form class="form-horizontal" id="form-property" action="{{ route('properti.import')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="box-group" id="accordion">
                            
                            <div class="panel box">
                                <div class="">
                                @if (Session::has('success'))
                                    <div class="alert-success"> {{ Session::has('success') }}</div>
                                @elseif(Session::has('warnning'))
                                    <div class="alert-warnning"> {{ Session::has('warnning') }}</div>
                                @endif
                            </div>
                                <label for="upload-file">Upload CSV</label>
                                <input type="file" name="upload-file" class="form-control">
                            </div>
                        </div>
                        <input class="btn btn-success" type="submit" value="Import" name="submit">
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