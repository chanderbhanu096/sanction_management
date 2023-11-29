@extends('layouts/admin')
@section('main')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="container text-black">
        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="h3 mb-3 text-gray-800">View User
                    <a href="{{url('admin/user')}}" class="btn btn-primary btn-sm float-right">Add Posts</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <th>Id</th>
                            <th>Usernmae</th>
                            <th>Email Id</th>
                            <th>Role</th>
                            <th>District</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)
                                <tr>
                                    <td>{{$u->id}}</td>
                                    <td>{{$u->username}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->role}}</td>
                                    <td>{{$u->district}}</td>
                                    <td><a href="" class="btn btn-primary">Edit</a></td>
                                    <td><a href="" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection