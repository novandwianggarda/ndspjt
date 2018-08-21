@extends('adminlte::page')

@section('title', 'Add Certificate')

@section('content_header')
    <h1>Add Certificate</h1>
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
                    <form class="form-horizontal" id="form-certificate" action="/certificate/add" method="POST">
                        @csrf
                        <div class="box-group" id="accordion">
                            <div class="panel box">
                                <!-- BASIC INFORMATION -->
                                @include('partials.forms.certificate.basicinformation')
                                <!-- LOCATION -->
                                @include('partials.forms.certificate.locations')
                                <!-- FILES & MAPPING-->
                                @include('partials.forms.certificate.documents')
                                <!-- FUHRER INFORMATION -->
                                @include('partials.forms.certificate.furtherinformation')
                                
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
        #map,
html,
body {
  padding: 0;
  margin: 0;
  height: 100%;
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
                        reader.onload = function (e){

                            var template = '<form action="/upload">'+
                                            '<img style="width: 64px;margin-right: 5px;margin-top: 5px;margin-bottom: 5px;" src="'+e.target.result+'">'+
                                            '<label>Title : </label> <input type="text" name="title">'+
                                            '<a href="#" class="btn btn-sm btn-primary ll-bgcolor ll-white" style="margin-left:5px;">Remove</a>'+
                                        '</form>';
                            $('#images-to-upload').append(template);
                        }
                    })
                })

                // document.addEventListener("DOMContentLoaded", init, false);

                // function init(){
                //     document.querySelector('#files').addEventListener('change', handleFileSelect, false);
                // }

                // function handleFileSelect(e){
                //     if (!e.target.files) return;
                //     var files = e.target.files;
                //     for (var i=0; i < files.length; i++) {
                //         var f = files[i];
                //     }
                // }


                // function GetFileSizeNameAndType()
                //         {
                //         var fi = document.getElementById('images'); // GET THE FILE INPUT AS VARIABLE.

                //         var totalFileSize = 0;

                //         // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
                //         if (fi.files.length > 0)
                //         {
                //             // RUN A LOOP TO CHECK EACH SELECTED FILE.
                //             for (var i = 0; i <= fi.files.length - 1; i++)
                //             {
                //                 //ACCESS THE SIZE PROPERTY OF THE ITEM OBJECT IN FILES COLLECTION. IN THIS WAY ALSO GET OTHER PROPERTIES LIKE FILENAME AND FILETYPE
                //                 var fsize = fi.files.item(i).size;
                //                 totalFileSize = totalFileSize + fsize;
                //                 document.getElementById('images-to-upload').innerHTML =
                //                 document.getElementById('images-to-upload').innerHTML
                //                 +
                //                 '<br /> ' + 'Title <b>' + fi.files.item(i).name
                //                 +
                //                 '</b> Size <b>' + Math.round((fsize / 1024)) //DEFAULT SIZE IS IN BYTES SO WE DIVIDING BY 1024 TO CONVERT IT IN KB
                //                 +
                //                 '</b> KB filetype <b>' + fi.files.item(i).type + "</b>.";
                //             }
                //         }
                //         document.getElementById('divTotalSize').innerHTML = "Total File(s) Size is <b>" + Math.round(totalFileSize / 1024) + "</b> KB";
                //     }


    //             function showname () {
    //   var name = document.getElementById('images'); 
    //   label('Selected file: ' + name.files.item(0).name);
    //   label('Selected file: ' + name.files.item(0).size);
    //   label('Selected file: ' + name.files.item(0).type);
    // }


                // var selDiv = "";
                // document.addEventListener("DOMContentLoaded", init, false);

                // function init (){
                //     document.querySelector('#files').addEventListener('change', handleFileSelect, false);
                //     selDiv = document.querySelector("#selectedFiles");
                // }

                // function handleFileSelect(e){
                //     if (!e.target.files || !window.FileReader) return;
                //     selDiv.innerHTML = "";

                //     var files = e.target.files;
                //     var filesArr = Array.prototype.slice.call(files);

                //     filesArr.forEach(function(f){
                //         var f = files[i];
                //         if (!f.type.match("image.*")){
                //             return;
                //         }

                //         var reader = new FileReader(){
                //             reader.onload = function (e){
                //                 var html ="<img src=\"" + e.target.result +"\">" + f.name + "<br clear=\"left\"/>";
                //                 selDiv.innerHTML +=html
                //             }
                //             reader.readAdDataURL(f);
                //         }
                //     });
                // }


    // MEASURE MAP BOUNDARY

// var drawingManager;
// var selectedShape;
// var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];
// var selectedColor;
// var colorButtons = {};

// function clearSelection() {
//   if (selectedShape) {
//     selectedShape.setEditable(false);
//     selectedShape = null;
//   }
// }

// function setSelection(shape) {
//   clearSelection();
//   selectedShape = shape;
//   shape.setEditable(true);
//   selectColor(shape.get('fillColor') || shape.get('strokeColor'));
//   google.maps.event.addListener(shape.getPath(), 'set_at', calcar);
//   google.maps.event.addListener(shape.getPath(), 'insert_at', calcar);
// }

// function calcar() {
//     var area = google.maps.geometry.spherical.computeArea(selectedShape.getPath());
//     document.getElementById("area").innerHTML = "Area =" + area;
// }

// function deleteSelectedShape() {
//   if (selectedShape) {
//     selectedShape.setMap(null);
//   }
// }

// function selectColor(color) {
//   selectedColor = color;
//   for (var i = 0; i < colors.length; ++i) {
//     var currColor = colors[i];
//     colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
//   }

//   // (Retrieves the current options from the drawing manager and replaces the
//   // stroke or fill color as appropriate.)
//   var polylineOptions = drawingManager.get('polylineOptions');
//   polylineOptions.strokeColor = color;
//   drawingManager.set('polylineOptions', polylineOptions);

//   var rectangleOptions = drawingManager.get('rectangleOptions');
//   rectangleOptions.fillColor = color;
//   drawingManager.set('rectangleOptions', rectangleOptions);

//   var circleOptions = drawingManager.get('circleOptions');
//   circleOptions.fillColor = color;
//   drawingManager.set('circleOptions', circleOptions);

//   var polygonOptions = drawingManager.get('polygonOptions');
//   polygonOptions.fillColor = color;
//   drawingManager.set('polygonOptions', polygonOptions);
// }

// function setSelectedShapeColor(color) {
//   if (selectedShape) {
//     if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
//       selectedShape.set('strokeColor', color);
//     } else {
//       selectedShape.set('fillColor', color);
//     }
//   }
// }

// function makeColorButton(color) {
//   var button = document.createElement('span');
//   button.className = 'color-button';
//   button.style.backgroundColor = color;
//   google.maps.event.addDomListener(button, 'click', function() {
//     selectColor(color);
//     setSelectedShapeColor(color);
//   });

//   return button;
// }

// function buildColorPalette() {
//   var colorPalette = document.getElementById('color-palette');
//   for (var i = 0; i < colors.length; ++i) {
//     var currColor = colors[i];
//     var colorButton = makeColorButton(currColor);
//     colorPalette.appendChild(colorButton);
//     colorButtons[currColor] = colorButton;
//   }
//   selectColor(colors[0]);
// }

// function initialize() {
//   var map = new google.maps.Map(document.getElementById('map'), {
//     zoom: 10,
//     center: new google.maps.LatLng(22.344, 114.048),
//     mapTypeId: google.maps.MapTypeId.ROADMAP,
//     disableDefaultUI: true,
//     zoomControl: true
//   });

//   var polyOptions = {
//     strokeWeight: 0,
//     fillOpacity: 0.45,
//     editable: true
//   };
//   // Creates a drawing manager attached to the map that allows the user to draw
//   // markers, lines, and shapes.
//   drawingManager = new google.maps.drawing.DrawingManager({
//     drawingMode: google.maps.drawing.OverlayType.POLYGON,
//     markerOptions: {
//       draggable: true
//     },
//     polylineOptions: {
//       editable: true
//     },
//     rectangleOptions: polyOptions,
//     circleOptions: polyOptions,
//     polygonOptions: polyOptions,
//     map: map
//   });

//   google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
//     if (e.type != google.maps.drawing.OverlayType.MARKER) {
//       // Switch back to non-drawing mode after drawing a shape.
//       drawingManager.setDrawingMode(null);

//       // Add an event listener that selects the newly-drawn shape when the user
//       // mouses down on it.
//       var newShape = e.overlay;
//       newShape.type = e.type;
//       google.maps.event.addListener(newShape, 'click', function() {
//         setSelection(newShape);
//       });
//       var area = google.maps.geometry.spherical.computeArea(newShape.getPath());
//       document.getElementById("area").innerHTML = "Area =" + area;
//       setSelection(newShape);
//     }
//   });

//   // Clear the current selection when the drawing mode is changed, or when the
//   // map is clicked.
//   google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
//   google.maps.event.addListener(map, 'click', clearSelection);
//   google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);

//   buildColorPalette();
// }
// google.maps.event.addDomListener(window, 'load', initialize);

// MAPS
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
    // END MAP
    </script>
         
@stop