@extends('adminlte::page')

@section('title', 'KPU - Jateng 1')

@section('content_header')
    <h1>Seleksi DPT Koordinator</h1>
@stop

@section('content')
<div>
  </div>
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

                    
                    
                    <div class="form-group" id="idForm">
                    {!! Form::open(['url'=>'dpt/add/datapenduduk','class'=>'form-horizontal']) !!}
                        @csrf
                      {!! Form::label('nama', 'Nama Penduduk', ['class'=>'control-label col-md-2']) !!}
                      <div class="col-md-4">
                        {!! Form::text('nama', null, ['class'=>'form-control', 'Placeholder'=>'Ketik nama dan tekan enter ...']) !!}
                        {!! $errors->has('nama')?$errors->first('nama'):'' !!}
                      </div>
                    {!! Form::close() !!}                 
                        <div class="form-group">
                             {!! Form::label('koordinator_id', 'Nama Koordinator', ['class'=>'control-label col-md-2']) !!}
                            <div class="col-md-4">
                                 {!! Form::select('koordinator_id', $kord,null, ['class'=>'form-control']) !!}
                                 {!! $errors->has('koordinator_id')?$errors->first('koordinator_id'):'' !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                         <div class="col-md-6">
                            @php
                            $i = 1;
                            $a = 1;
                            @endphp
                            <b>Hasil Pencarian : </b><br>
                            @if(!empty($posts ))
                                @foreach ($posts as $post)
                                
                                {{$i++}}. {{$post->nama}} {{$post->nik}} <a href="{{url('dpt/add/koordinator', $post->nama )}}" class="btn btn-primary btn-sm">Tambah</a><br>
                                
                                @endforeach
                            @else 
                                Tidak ditemukan
                            @endif
                        </div>
                        <div class="col-md-6">
                            <b>Data DPT Koordinator : </b><br>
                            @if(!empty($posts ))
                                @foreach ($posts as $post)
                                    {{$a++}}. Nama : {{$post->nama}} NIK :{{$post->nik}} <br>
                                @endforeach
                            @else 
                                Tidak ditemukan
                            @endif
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tbl-properties').DataTable();
        });
    </script>

@stop