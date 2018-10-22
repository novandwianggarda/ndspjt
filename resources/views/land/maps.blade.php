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
    




    <script type="text/javascript">
        

        initMap();

        function initMap(){
            //Map Option
            var myLatlng ={lat: -6.984102, lng:110.409293}
            var options = {
                center: myLatlng,
                zoom: 17,
                mapTypeId: 'satellite',
            }

            //new map
            var map = new google.maps.Map(document.getElementById('map'), options);

            //add marker
           
            var marker = new google.maps.Marker({
                position: myLatlng,
                map:map,
                title: 'Land-Lord'
            });

            var request = {
                location: myLatlng,
                raddius: '2500',
                types: ['store']
            };

            service = new google.maps.places.PlacesService(map);
            service.nearbySearch(request, callback);
            function callback(results, status){
                console.log(results);
            }


            
        }
    </script> 
@stop
