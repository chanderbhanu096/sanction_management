@extends('layouts/dir')
@section('main')
<div class="card m-4">

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="card-header">
        <h3 class="h3 mb-3 text-gray-800">View GP Details
        </h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">District Name:{{$gpDetails[0]->district}}</div>
            <div class="col-md-4">Block Name:{{$gpDetails[0]->block}}</div>
            <div class="col-md-4">Gram Panchayat:{{$gpDetails[0]->gp}}</div>
            <div class="col-md-4">New Gram Panchayat?:{{$gpDetails[0]->newGP}}</div>
        </div>
        <h3>View Progress</h3>
        <div>
            <table class="responsive table table-bordered text-center">
                <thead>
                    <th>Sr. No.</th>
                    <th>Financial Year</th>
                    <th>Sanction Date</th>
                    <th>Sanction Head</th>
                    <th>Sanction Amount</th>
                    <th>Fully Utilized?</th>
                    <th>View UC</th>
                    <th>View Images</th>
                </thead>
                @foreach($gpDetails as $details)
                <tbody>
                    <td>1</td>
                    <td>{{$details->financial_year}}</td>
                    <td>{{$details->sanction_date}}</td>
                    <td>{{$details->sanction_head}}</td>
                    <td>{{$details->san_amount}}</td>
                    {{-- <td>{{$details->progress[0]->p_isComplete}}</td> --}}
                    {{-- <td> <a href=""></a> {{$details->progress[0]->p_isComplete}}</td> --}}
                    {{-- <td><a href=""></a> {{$details->progress[0]->p_isComplete}}</td> --}}
                </tbody>
                @endforeach
            </table>
        </div>  
    </div>
</div>
@endsection

