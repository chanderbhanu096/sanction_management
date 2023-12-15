@extends('layouts/district')
@section('main')
<div class="card m-4">
    <div class="card-header">
        <h3>District Home Page</h3>
    </div>
    <div class="card-body">
        <h4>View Gram Panchayat Sanction Details

        </h4>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <th>Sanction Id</th>
                    <th>Sanction Purpose</th>
                    <th>Sanction Date</th>
                    <th>Sanction Head</th>
                    <th>Sanction Amount</th> 
                    <th>Sanction Financial Year</th>
                    <th>Is Sanction for new Gram Panchayat?</th>   
                </thead>
                    @foreach($sanction as $s)
                    <tr>
                        <td>{{$s->id}}</td>
                        <td>{{$s->sanction_purpose}}</td>
                        <td>{{$s->sanction_date}}</td>
                        <td>{{$s->sanction_head}}</td>
                        <td>{{$s->san_amount}}</td>
                        <td>{{$s->financial_year}}</td>
                        <td>{{$s->newGP}}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
        
    </div>
    
</div>
@endsection

