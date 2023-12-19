@extends('layouts/district')
@section('main')
<div class="card m-4">
    <div class="card-header">
        <h3>District Home Page</h3>
    </div>
    <div class="card-body">
        <h4>View Sanction Details</h4>

        @if($sanction->isEmpty())
        
            <div class="alert alert-info">No!New Sanction found which is not reported by you yet.</div>
        
        @else 
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Sr. No.</th>
                        <th>Block Name</th>
                        <th>Gram Panchayat Name</th>
                        <th>Total Amount Recived</th>
                        <th>Financial Year</th>
                        <th>Sanction Purpose</th>
                        <th>Sanction Date</th>
                        <th>View Details and & Progress</th>
                    </thead>
                    @php
                        $i=1;    
                    @endphp
                    @foreach ($sanction as $san)
                        <tr>
                            <td>{{$i}}</td>
                            @php
                                $i++;
                            @endphp
                            <td>{{$san->block}}</td>
                            <td>{{$san->gp}}</td>
                            <td>{{$san->san_amount}}</td>
                            <td>{{$san->financial_year}}</td>
                            <td>{{$san->sanction_purpose}}</td>
                            <td>{{$san->sanction_date}}</td>
                            <td><a class="btn btn-primary" href="{{url("district/add-progress".'/'.$san->id)}}">Add Progress</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
       @endif

    </div>
    
</div>
@endsection

