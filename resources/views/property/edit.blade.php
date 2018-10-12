@extends('adminlte::page')

@section('title', 'Land-Lord')

@section('content_header')
    <h1>Form Edit Property</h1>
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

                    {!! Form::model($prop,  ['url'=>array( '/properties/updateprop', $prop->id), 'method' => 'patch','enctype' => 'multipart/form-data', 'files' => true]) !!}
                    
                    <div class="form-group">
                      {!! Form::label('name', 'Nama Lokasi', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('name', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('name')?$errors->first('name'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        {!! Form::label('property_type_id', 'Jenis:', ['class'=>'control-label col-md-2']) !!}
                        <div class="col-md-10">
                        {!! Form::select('property_type_id', $proptype,null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('address', 'Alamat', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('address', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('address')?$errors->first('address'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('land_area', 'land_area', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('land_area', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('land_area')?$errors->first('land_area'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('building_area', 'building_area', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('building_area', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('building_area')?$errors->first('building_area'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('block', 'Block', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('block', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('block')?$errors->first('block'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('floor', 'Floor', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('floor', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('floor')?$errors->first('floor'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                     <div class="form-group">
                      {!! Form::label('unit', 'unit', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('unit', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('unit')?$errors->first('unit'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                     <div class="form-group">
                      {!! Form::label('electricity', 'Floor', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('electricity', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('electricity')?$errors->first('electricity'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                     <div class="form-group">
                      {!! Form::label('water', 'Floor', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('water', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('water')?$errors->first('water'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('telephone', 'Floor', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('telephone', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('telephone')?$errors->first('telephone'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>


                    <div class="form-group">
                      <div class="col-sm-6" style="padding:0px 25px">
                        <a href="../" class="btn btn-danger form-control" style="margin-top: 10px;">Cancel</a>
                      </div>
                      <div class="col-sm-6" style="padding:0px 25px">
                        <button type="submit" class="btn btn-primary form-control" style="margin-top: 10px;">
                          <i class="fa fa-plus"></i>
                            Update
                        </button>
                      </div>
                    </div>


                  {!! Form::close() !!}
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

    <style>
        #images{
            visibility: hidden; /*hidden button file upload*/
        }
        .btn-upload{
            border-radius: 5px;
            padding-left: 5px;
            padding-right: 5px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
    </style>
    <style>
        #map {
        height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
          html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #panel {
          width: 200px;
          font-family: Arial, sans-serif;
          font-size: 13px;
          float: right;
          margin: 10px;
        }
        #color-palette {
          clear: both;
        }
        .color-button {
          width: 14px;
          height: 14px;
          font-size: 0;
          margin: 2px;
          float: left;
          cursor: pointer;
        }
        #delete-button {
          margin-top: 5px;
        }
    </style>
@stop
@section('js')

    <script type="text/javascript">
        var fvue = new Vue({
            el: '#form-certificate',
        });

            $('#images').on('change', function(e){
                var files = e.target.files;
                    $.each(files, function (i, file){
                        var reader = new FileReader();
                        reader.readAsDataURL(file);
                        console.log(file);

                        reader.onload = function (e){
                            var template = ''+
                                            '<img style="width: 64px;margin-right: 5px;margin-top: 5px;margin-bottom: 5px;" src="'+e.target.result+'">'+
                                            
                                            '<input type="text" name="title[]" placeholder="Input Title"><br>'+

                                            // file.name+
                                            // '<a href="#" class="btn btn-sm btn-primary ll-bgcolor ll-white" style="margin-left:5px;">Remove</a>'+
                                        '';
                            $('#images-to-upload').append(template);
                        }
                    })
                })
            // MAPS
            initMap();

            var map, markers = [], polygon, polygonCenter, polygonArea = 0;
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -6.984102, lng:110.409293},
                    zoom: 17,
                    mapTypeId: 'satellite',
                    // disableDefaultUI: true,
                    // zoomControl: true,
                });

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        map.setCenter(initialLocation);
                    });
                }

                google.maps.event.addListener(map, 'click', function(event) {
                    placeMarker(event.latLng);
                });

                google.maps.event.addListener(map, 'mousemove', function(e) {
                    map.setOptions({draggableCursor:'crosshair'});
                });

                google.maps.event.addListener(map, 'mousehover', function(e) {
                    map.setOptions({draggableCursor:'point'});
                });
                
                    }
            function placeMarker(location) {
                var marker = new google.maps.Marker({
                    position: location, 
                    map: map,
                    draggable:true
                });
                google.maps.event.addListener(marker, 'dragend', function(evt){
                    makeBoundary();
                });
                markers.push(marker);
            }

            function getMarkerCoordinates(){
                var coordinates = [];
                markers.forEach(function(marker) {
                    coordinate = {
                        lat: marker.position.lat(),
                        lng: marker.position.lng()
                    };
                    coordinates.push(coordinate);
                });
                return coordinates;
            }

            function initsmakeBoundary(latLang){
               clearMarker();
               marker = new google.maps.Marker({
                position: latLang,
                map: map,
                draggable:true,
                icon: '/images/marker-map-tiny.png'
               });
               marker.setMap(map);
               $('#latitude').val(latLng.lat());
               $('#longitude').val(latLng.lat());
            }


            function makeBoundary(){
                if (typeof polygon !== 'undefined') {
                    polygon.setMap(null);
                }
                if (markers.length > 2) {
                    coordinates = getMarkerCoordinates();
                    polygon = new google.maps.Polygon({
                        paths: coordinates,
                        strokeColor: '#FF0000',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#FF0000',
                        fillOpacity: 0.35
                    });
                    polygon.setMap(map);
                    $('#polygonArea').html(parseFloat(calculateArea(polygon)).toFixed(2));
                    $('#boundary_coordinates').val(JSON.stringify(getMarkerCoordinates()));

                    

                } else {
                    alert('Place minimal 3 marker to make a boundary!');
                }
            }

            function clearMap() {
                if (typeof polygon !== 'undefined') {
                    polygon.setMap(null);
                }
                if (markers.length > 0) {
                    markers.forEach(function(marker) {
                        marker.setMap(null);
                    });
                    markers = [];
                }
                $('#polygonArea').html('0');
            }

            function calculateArea(polygon){
                return google.maps.geometry.spherical.computeArea(polygon.getPath());
            }



            
            // http://cartometric.com/blog/2014/06/06/convert-google-maps-polygon-api-v3-to-well-known-text-wkt-geometry-expression/
            function GMapPolygonToWKT(poly) {
                var wkt = "POLYGON(";
                var paths = poly.getPaths();
                for(var i=0; i<paths.getLength(); i++) {
                    var path = paths.getAt(i);
                    wkt += "(";
                    for(var j=0; j<path.getLength(); j++) {
                        wkt += path.getAt(j).lng().toString() +" "+ path.getAt(j).lat().toString() +",";
                    }
                    wkt += path.getAt(0).lng().toString() + " " + path.getAt(0).lat().toString() + "),";
                }
                wkt = wkt.substring(0, wkt.length - 1) + ")";
                return wkt;
            }

    </script>
@stop