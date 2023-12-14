@extends('layouts/district')
@section('main')
<div class="card m-4">
    <div class="card-header">
        <h3>District Home Page</h3>
    </div>
    <div class="card-body">
        <h4>View Sanction Details</h4>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <th>Sr. No.</th>
                    <th>Block Name</th>
                    <th>Gram Panchayat Name</th>
                    <th>Total Amount Recived</th>
                    <th>View Details</th>
                    <th>Add Progress</th>
                    <th>View Progress</th>
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
                        <td>{{$san->total_sanction_amount}}</td>
                        <td><button class="btn btn-primary">View</button></td>
                        <td><button class="btn btn-secondary">Add Progress</button></td>
                        <td><button class="btn btn-info">View Progress</button></td>
                    </tr>
                @endforeach
            </table>
        </div>
        
    </div>
    
</div>
@endsection

