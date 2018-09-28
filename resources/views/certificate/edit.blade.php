@extends('adminlte::page')

@section('title', 'Land-Lord')

@section('content_header')
    <h1>Edit Certificate</h1>
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

                    {!! Form::model($cert,  ['url'=>array( '/certificates/updatecert', $cert->id), 'method' => 'patch','enctype' => 'multipart/form-data', 'files' => true]) !!}
                    
                    <div class="form-group">
                      {!! Form::label('folder_sert', 'Folder Sertifikat', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('folder_sert', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('folder_sert')?$errors->first('folder_sert'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('purposes', 'Purposes', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('purposes', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('purposes')?$errors->first('purposes'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('no_folder', 'Nomor Folder', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('no_folder', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('no_folder')?$errors->first('no_folder'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        {!! Form::label('certificate_type_id', 'Jenis:', ['class'=>'control-label col-md-2']) !!}
                        <div class="col-md-10">
                        {!! Form::select('certificate_type_id', $certype,null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                      {!! Form::label('no_hm_hgb', 'No HM / HGB', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('no_hm_hgb', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('no_hm_hgb')?$errors->first('no_hm_hgb'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('kepemilikan', 'Kepemilikan', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('kepemilikan', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('kepemilikan')?$errors->first('kepemilikan'):'' !!}
                      </div>
                    </div> 
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('nama_sertifikat', 'Nama Sertifikat', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('nama_sertifikat', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('nama_sertifikat')?$errors->first('nama_sertifikat'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('keterangan', 'Keterangan', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('keterangan', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('keterangan')?$errors->first('keterangan'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('archive', 'Archive', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('archive', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('archive')?$errors->first('archive'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('kelurahan', 'Kelurahan', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('kelurahan', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('kelurahan')?$errors->first('kelurahan'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('kecamatan', 'Kecamatan', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('kecamatan', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('kecamatan')?$errors->first('kecamatan'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('kota', 'Kota', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('kota', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('kota')?$errors->first('kota'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      {!! Form::label('addrees', 'Alamat', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('addrees', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('addrees')?$errors->first('addrees'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>


                    <div class="form-group">
                      {!! Form::label('published_date', 'Published Date', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('published_date', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('published_date')?$errors->first('published_date'):'' !!}
                      </div>
                    </div><br><br>

                    <div class="form-group">
                      {!! Form::label('expired_date', 'Expired Date', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('expired_date', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('expired_date')?$errors->first('expired_date'):'' !!}
                      </div>
                    </div><br><br>

                   <div class="form-group">
                      {!! Form::label('ajb_nominal', 'Ajb Nominal', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('ajb_nominal', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('ajb_nominal')?$errors->first('ajb_nominal'):'' !!}
                      </div>
                    </div><br><br>

                    <div class="form-group">
                      {!! Form::label('ajb_date', 'Ajb Date', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('ajb_date', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('ajb_date')?$errors->first('ajb_date'):'' !!}
                      </div>
                    </div><br><br>

                    <!-- <div class="form-gorup">
                    <div class="form-gorup">
                      {!! Form::label('luas_sertifikat', 'Luas Sertifikat', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('luas_sertifikat', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('luas_sertifikat')?$errors->first('luas_sertifikat'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-gorup">
                      {!! Form::label('wajib_pajak', 'Wajib Pajak', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('wajib_pajak', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('wajib_pajak')?$errors->first('wajib_pajak'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-gorup">
                      {!! Form::label('purposes', 'Purpose', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('purposes', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('purposes')?$errors->first('purposes'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>

                    <div class="form-gorup">
                      {!! Form::label('penanggung_pbb', 'Penanggung PBB', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('penanggung_pbb', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('penanggung_pbb')?$errors->first('penanggung_pbb'):'' !!}
                      </div>
                    </div>
                    <br>
                    <br>
                      {!! Form::label('map_coordinate', 'Map Coordinate', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('map_coordinate', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('map_coordinate')?$errors->first('map_coordinate'):'' !!}
                      </div>
                    </div><br><br>

                    <div class="form-gorup">
                      {!! Form::label('letak_objek_pajak', 'Letak Objek Pajak', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('letak_objek_pajak', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('letak_objek_pajak')?$errors->first('letak_objek_pajak'):'' !!}
                      </div>
                    </div><br><br>

                    <div class="form-gorup">
                      {!! Form::label('kelurahan_pbb', 'Keluraha PBB', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('kelurahan_pbb', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('kelurahan_pbb')?$errors->first('kelurahan_pbb'):'' !!}
                      </div>
                    </div><br><br>

                    <div class="form-gorup">
                      {!! Form::label('kota_pbb', 'Kota PBB', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('kota_pbb', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('kota_pbb')?$errors->first('kota_pbb'):'' !!}
                      </div>
                    </div><br><br>

                    <div class="form-gorup">
                      {!! Form::label('nop', 'NOP', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('nop', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('nop')?$errors->first('nop'):'' !!}
                      </div>
                    </div><br><br>

                    <div class="form-gorup">
                      {!! Form::label('luas_tanah_pbb', 'Luas Tanah PBB', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('luas_tanah_pbb', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('luas_tanah_pbb')?$errors->first('luas_tanah_pbb'):'' !!}
                      </div>
                    </div><br><br>

                    <div class="form-gorup">
                      {!! Form::label('luas_bangun_pbb', 'Luas Bangun PBB', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-10">
                        {!! Form::text('luas_bangun_pbb', null, ['class'=>'form-control', 'Placeholder'=>'']) !!}
                        {!! $errors->has('luas_bangun_pbb')?$errors->first('luas_bangun_pbb'):'' !!}
                      </div> -->
                    <div slot="title" class="ll-head">
                      LOCATIONS
                    </div>
                    <div class="panel-body">
                      <div class="row">
                          <div class="col-md-12">
                              <div id="map" style="width:100%;height:500px"></div>
                          </div>

                          <div class="col-md-12 item boundary_coordinates">
                              <br>
                              <div style="float:left;">
                                  <button class="btn btn-sm btn-warning" type="button" onclick="clearMap(); return false;"><i class="fa fa-trash"></i> Clear Map</button>
                                  <button class="btn btn-sm btn-info" type="button" onclick="makeBoundary(); return false;"><i class="fa fa-map"></i> Make Boundary</button>
                                  <button class="btn btn-sm btn-default" type="button" onclick="initsmakeBoundary(); return false;"><i class="fa fa-map"></i>Titik Make Boundary</button>
                                  <span>&nbsp;&nbsp;<b>Area</b>: <span id="polygonArea">0</span> m<sup>2</sup></span>
                              </div>
                              <!-- <div class="alert boundary_coordinates" style="">DS-LandLord</div> -->
                              <div class="clearfix"></div>
                          </div>
                      </div>
                      <input type="hidden" name="boundary_coordinates" id="boundary_coordinates">
                    </div>

                    <accordion name="collapse-filesmap">

                      <div slot="title" class="ll-head">
                          DOCUMENTS
                      </div>

                      

                      <frgroup>
                          <br>
                          <label slot="label">
                              Files :
                          </label>
                          <label for="images" class="ll-bgcolor ll-white btn-upload">
                              <i class="fa fa-upload"></i>
                             Choose File
                          </label>
                          <input type="file" name="images[]" id="images" multiple>
                              <div id="images-to-upload">
                              </div>
                              
                           <a href="#" class="btn btn-sm" style="margin-top: 5px;"> &nbsp; </a>
                      </frgroup>


                  </accordion>
                    <div class="form-group">
                      <div class="col-sm-6" style="padding:0px 25px">
                        <a href="../" class="btn form-control ll-bgcolor ll-white" style="margin-top: 10px;">Cancel</a>
                      </div>
                      <div class="col-sm-6" style="padding:0px 25px">
                        <button type="submit" class="btn form-control ll-bgcolor ll-white" style="margin-top: 10px;">
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
