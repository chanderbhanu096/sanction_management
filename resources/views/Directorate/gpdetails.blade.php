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
            <div class="col-md-4">District Name: <strong>{{$gpDetails[0]->district}}</strong></div>
            <div class="col-md-4">Block Name: <strong>{{$gpDetails[0]->block}}</strong></div>
            <div class="col-md-4">Gram Panchayat: <strong>{{$gpDetails[0]->gp}}</strong></div>
            <div class="col-md-4">New Gram Panchayat?: <strong>{{$gpDetails[0]->newGP}}</strong></div>
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
                    <td>
                        @php 
                            $progressExists=optional($details->progress)->isNotEmpty();
                        @endphp
                        {{$progressExists?$details->progress[0]->p_isComplete:''}}
                    </td>
                    <td>
                        @if($progressExists)
                        <a href="{{url('uploads/ucs/'.$details->progress[0]->p_uc)}}" target="_blank">View UC File</a>
                        @else
                            <span>UC not found!</span>
                        @endif                        
                    </td>
                    <td>
                        @if($progressExists)
                            @php
                                $imageExists=optional($details->progress[0]->image)->isNotEmpty();
                            @endphp
                             @if($imageExists)
                             <div class="image-gallery">
                                 @foreach($details->progress[0]->image as $img)
                                    <div class="image-item">
                                        <a href="{{url('uploads/images/'.$img->image_path)}}" target="_blank">
                                        <img src="{{url('uploads/images/'.$img->image_path)}}" alt="Image">
                                        </a>
                                    </div>
                                 @endforeach
                             </div>
                            @else
                                <span>Images not found!</span>
                             @endif
                        @endif
                    </td>
                </tbody>
                @endforeach
            </table>
        </div>  
    </div>
</div>
@endsection

