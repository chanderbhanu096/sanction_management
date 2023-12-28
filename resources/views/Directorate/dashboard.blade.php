@extends('layouts/dir')
@section('main')
<div class="card m-4">
    <div class="card-header">
        <h3>Directorate Home Page</h3>
    </div>
    <div class="card-body">
        <div class="row">
            {{-- Total Sanction Amount --}}
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        Total Sanctions Amount
                        <h3>Rs. {{$totalFundReleased}}</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{url('admin/category')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            {{-- Total Utilized Amount --}}
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        Total Utilized Amount
                        <h3>Rs. {{$sumUtilized}}</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{url('admin/category')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            {{-- Total Number of Sanctions --}}
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning  text-white mb-4">
                    <div class="card-body">
                        Total Sanctions Count
                        <h3>{{$sanctionCount}}</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{url('admin/category')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            {{-- Total Number of Sanctions --}}
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary  text-white mb-4">
                    <div class="card-body">
                        Total Utilized Sanctions
                        <h3>{{$completedSanction}}</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{url('admin/category')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection