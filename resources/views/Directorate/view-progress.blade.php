@extends('layouts/dir')
@section('main')
<div class="card m-4">

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="card-header">
        <h3 class="h3 mb-3 text-gray-800">View Progress of Sanctions
            <a href="{{url('dir/')}}" class="btn btn-primary btn-sm float-right">Add Sanction</a>
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
            <thead>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

