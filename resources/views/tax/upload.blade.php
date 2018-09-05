@extends('adminlte::page')

@section('title', 'Import Taxes')

@section('content_header')
    <h1>Import Taxes</h1>
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
                    <form class="form-horizontal" id="form-property" action="{{ route('tax.import')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-group" id="accordion">
                            <div class="panel box">
                                <label for="upload-file">Upload xls,csv. etc</label>
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