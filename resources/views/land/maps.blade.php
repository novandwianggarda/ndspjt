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
                    @if ($errors->any())-
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                    </div>
                    <form class="form-horizontal" id="form-certificate" action="" method="" enctype="multipart/form-data">

                        @csrf
                        <div class="box-group" id="accordion">
                            <div class="panel box">
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




    




    <script type="text/javascript">
        

        initMap();

        function initMap(){
            //Map Option
            var myLatlng ={lat: -6.984102, lng:110.409293}
            var options = {
                center: myLatlng,
                zoom: 16,
                mapTypeId: 'satellite',
            }

            //new map
            var map = new google.maps.Map(document.getElementById('map'), options);


            var request = {
                location: myLatlng,
                raddius: '2500',
                types: ['store']
            };


            //loping

                    // Define the LatLng coordinates for the polygon's path.

                    var triangleCoords = {!! $map->boundary_coordinates !!};

                    // Construct the polygon.
                    var bermudaTriangle = new google.maps.Polygon({
                      paths: triangleCoords,
                      strokeColor: '#FF0000',
                      strokeOpacity: 0.8,
                      strokeWeight: 2,
                      fillColor: '#FF0000',
                      fillOpacity: 0.35
                    });
                    bermudaTriangle.setMap(map);
        }
    </script>


@stop
