@extends('adminlte::page')

@section('title', 'Add User')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    <row-box>
        <!--ERRORS-->
        @include('partials.errors')



        {!! Form::model($users,  ['url'=>array( 'updateuser', $users->id), 'method' => 'patch','enctype' => 'multipart/form-data', 'files' => true]) !!}


            @csrf

            
                   <div class="box-group" id="accordion">
                        <div class="panel-box">
                            
                            <frgroup class>
                                
                                {!! Form::label('name', 'Nama Lengkap', ['class'=>'form-control-label']) !!}

                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => 'Nama Lengkap']) !!}
                                {!! $errors->has('name')?$errors->first('name'):'' !!} 

                            </frgroup>

                            <frgroup class>
                                
                                {!! Form::label('username', 'Username ', ['class'=>'form-control-label']) !!}

                                {!! Form::text('username', null, ['class'=>'form-control', 'placeholder' => 'Input Username']) !!}
                                {!! $errors->has('username')?$errors->first('username'):'' !!} 

                            </frgroup>

                            <frgroup class>

                                {!! Form::label('password', 'Password Anda') !!} <br />
                               {!! Form::password('password',['class'=>'form-control','id'=>'password']) !!}

                            </frgroup>
                            <frgroup class>
                                
                                {!! Form::label('akses', 'Akses Anda', ['class'=>'form-control-label']) !!} <br />
                                {!! Form::select('role_id', $roles,null, ['class'=>'form-control']) !!}
                               

                            </frgroup>
                        </div>
                   </div>
                     <!-- SUBMIT BTN -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group" style="margin-top:15px;">
                         <div class="col-sm-12" style="padding:0px 25px">
                             <button type="submit" class="btn form-control ll-bgcolor ll-white" style="margin-top: 20px">
                                 <i class="fa fa-plus"></i>
                                 Update
                             </button>
                         </div>
                    </div>

        {!! Form::close() !!}
    </row-box>
@stop
