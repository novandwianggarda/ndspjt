@extends('adminlte::page')

@section('title', 'Add User')

@section('content_header')
    <h1>Add User</h1>
@stop

@section('content')
    <row-box>
        <!--ERRORS-->
        @include('partials.errors')

        {!! Form::open(['url'=>'storeuser','class'=>'form-horizontal','files'=>true]) !!}


            @csrf
                   <div class="box-group" id="accordion">
                        <div class="panel-box">
                            
                            <frgroup class>
                                
                                {!! Form::label('name', 'Nama Lengkap : ', ['class'=>'form-control-label']) !!}

                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Nama Lengkap']) !!}
                                {!! $errors->has('name')?$errors->first('name'):'' !!} 

                            </frgroup>

                            <frgroup class>
                                
                                {!! Form::label('username', 'User Name : ', ['class'=>'form-control-label']) !!}

                                {!! Form::text('username', null, ['class'=>'form-control', 'placeholder' => 'Input Username']) !!}
                                {!! $errors->has('username')?$errors->first('username'):'' !!} 

                            </frgroup>

                            <frgroup class>
                                
                                {!! Form::label('password', 'Pasword Anda', ['class'=>'form-control-label']) !!}

                                {!! Form::text('password', null, ['class'=>'form-control', 'placeholder' => 'Masukkan Password']) !!}
                                {!! $errors->has('password')?$errors->first('password'):'' !!} 

                            </frgroup>
                        </div>
                   </div>
                     <!-- SUBMIT BTN -->
                    <div class="form-group" style="margin-top:15px;">
                         <div class="col-sm-12" style="padding:0px 25px">
                             <button type="submit" class="btn form-control ll-bgcolor ll-white" style="margin-top: 20px">
                                 <i class="fa fa-plus"></i>
                                 Submit
                             </button>
                             <a href="/users">back</a>
                         </div>
                    </div>

        {!! Form::close() !!}
    </row-box>
@stop
