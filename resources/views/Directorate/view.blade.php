@extends('layouts/dir')
@section('main')
<div class="card m-4">

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="card-header">
        <h3>View Sanction</h3>
    </div>
</div>
@endsection

