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

        var map;
        var infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
              zoom: 16,
              center: {lat: -6.984102, lng:110.409293},
              mapTypeId: 'satellite'
            });

        // Define the LatLng coordinates for the polygon.
            var bound = {!! $boundaries !!}
            ;

            bound.forEach(function(el){
                var viewbound = new google.maps.Polygon({
                  paths: el,

                  strokeColor: '#FF0000',
                  strokeOpacity: 0.8,
                  strokeWeight: 3,
                  fillColor: '#FF0000',
                  fillOpacity: 0.35
                });
                viewbound.setMap(map);
            
            });


        // Construct the polygon.
            // var viewbound = new google.maps.Polygon({
            //   paths: bound,

            //   strokeColor: '#FF0000',
            //   strokeOpacity: 0.8,
            //   strokeWeight: 3,
            //   fillColor: '#FF0000',
            //   fillOpacity: 0.35
            // });
            // viewbound.setMap(map);

            // viewbound.addListener('click', showArrays);

            // infoWindow = new google.maps.InfoWindow;
        // Add a listener for the click event.
      }



      /** @this {google.maps.Polygon} */
      function showArrays(event) {
        // Since this polygon has only one path, we can call getPath() to return the
        // MVCArray of LatLngs.
        var vertices = this.getPath();

        var contentString = '<b>DS - LandLord</b><br>' +
            'Certificate location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
            '<br>';

        // Iterate over the vertices.
        for (var i =1; i < vertices.getLength(); i++) {
          var xy = vertices.getAt(i);
          contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
              xy.lng();
        }

        // Replace the info window's content and position.
        infoWindow.setContent(contentString);
        infoWindow.setPosition(event.latLng);

        infoWindow.open(map);
      }
    </script>


@stop
