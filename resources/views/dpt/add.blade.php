@extends('adminlte::page')

@section('title', 'KPU - Jateng 1')

@section('content_header')
    <h1>Add DPT</h1>
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

                {!! Form::open(['url'=>'storepenilaian','class'=>'form-horizontal']) !!}
                        @csrf
                    
                    <div class="form-group">
                      {!! Form::label('nama', 'Nama Penduduk', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('nama', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('nama')?$errors->first('nama'):'' !!}
                      </div>
                    </div>

                    <div class="form-group">
                      {!! Form::label('koordinator_id', 'Nama Koordinator', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                       {!! Form::select('koordinator_id', $kord,null, ['class'=>'form-control']) !!}
                        {!! $errors->has('koordinator_id')?$errors->first('koordinator_id'):'' !!}
                      </div>
                    </div>

                {!! Form::close() !!}



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