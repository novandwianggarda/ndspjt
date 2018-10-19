@extends('adminlte::page')

@section('title', 'Land-Lord')

@section('content_header')
    <h1>All Maps Certificate</h1>
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
                    <form class="form-horizontal" id="form-certificate" action="/certificates/add" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="box-group" id="accordion">
                            <div class="panel box">
                                @foreach ($map as $mp)
                                    <h2>{{ $mp->boundary_coordinates}}</h2>
                                @endforeach
                                <div id="map"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        #map {
        height: 600px;
        width: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
          html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
    </style>
@stop

@section('js')
    <script>
        var boundary_coordinates = {!!$mp->boundary_coordinates !!}
        var map = new google.maps.Map(document.getElementById('map'),{

            position:{
                boundary_coordinates: boundary_coordinates,
            },
            zoom: 15
        });
        var marker = new google.maps.Marker({
            center:{
               boundary_coordinates: boundary_coordinates, 
            },
            map:map
        });
    </script>




    <script type="text/javascript">
        var fvue = new Vue({
            el: '#form-certificate',
        });

        initMap();

        function initMap(){
            //Map Option
            var options = {
                center: {lat: -6.984102, lng:110.409293},
                zoom: 17,
                mapTypeId: 'satellite',
            }

            //new map
            var map = new google.maps.Map(document.getElementById('map'), options);

            //add marker
            var marker = new google.maps.Marker({
                position:{lat: -6.966667, lng:110.409293},
                map:map
            })
        }
    </script> 
@stop
