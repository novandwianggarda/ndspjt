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
                                            Add
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

                document.addEventListener("DOMContentLoaded", init, false);

                function init(){
                    document.querySelector('#files').addEventListener('change', handleFileSelect, false);
                }

                function handleFileSelect(e){
                    if (!e.target.files) return;
                    var files = e.target.files;
                    for (var i=0; i < files.length; i++) {
                        var f = files[i];
                    }
                }


                function GetFileSizeNameAndType()
                        {
                        var fi = document.getElementById('images'); // GET THE FILE INPUT AS VARIABLE.

                        var totalFileSize = 0;

                        // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
                        if (fi.files.length > 0)
                        {
                            // RUN A LOOP TO CHECK EACH SELECTED FILE.
                            for (var i = 0; i <= fi.files.length - 1; i++)
                            {
                                //ACCESS THE SIZE PROPERTY OF THE ITEM OBJECT IN FILES COLLECTION. IN THIS WAY ALSO GET OTHER PROPERTIES LIKE FILENAME AND FILETYPE
                                var fsize = fi.files.item(i).size;
                                totalFileSize = totalFileSize + fsize;
                                document.getElementById('images-to-upload').innerHTML =
                                document.getElementById('images-to-upload').innerHTML
                                +
                                '<br /> ' + 'Title <b>' + fi.files.item(i).name
                                +
                                '</b> Size <b>' + Math.round((fsize / 1024)) //DEFAULT SIZE IS IN BYTES SO WE DIVIDING BY 1024 TO CONVERT IT IN KB
                                +
                                '</b> KB filetype <b>' + fi.files.item(i).type + "</b>.";
                            }
                        }
                        document.getElementById('divTotalSize').innerHTML = "Total File(s) Size is <b>" + Math.round(totalFileSize / 1024) + "</b> KB";
                    }


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
    </script>





@stop