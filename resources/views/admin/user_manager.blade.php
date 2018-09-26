@extends('adminlte::page')

@section('title', 'User Manager')

@section('content_header')
    <h1>User Manager</h1>
@stop

@section('content')

<div class="row">
        <div class="col-md-12">
            <button type="button"class="btn btn-sm btn-primary ll-bgcolor" onclick="window.location='{{url("add_user")}}'"><i class="fa fa-plus"></i> Add New User</button>

            <table id="tbl-certificates" class="table table-bordered table-striped dataTable" role="grid" style="width:100%">
 <div class="row">
        <div class="col-md-12">
            <table id="tbl-certificates" class="table table-bordered table-striped dataTable" role="grid" style="width:100%">
                 <thead>
                    <tr>
                        <th>UserName</th>
                        <th>Full Name</th>
                        
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->username}} </td>
                            <td>{{$user->name}} </td>
                            <td>{{$user->created_at}}</td>
                            <td> 
                                    <button class="btn btn-sm btn-danger"> <i class="fa fa-trash"> </i></button>
                                    <a href="/edituser/{{ $user->id }}" class="btn btn-sm btn-danger"><i class="fa fa-edit" aria-hidden="true"></i></a>

                            </td>  
                        </tr>   
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
      </table>

    </div>
</div>





               
    
@stop

@section('css')
    
@stop

@section('js')

@stop