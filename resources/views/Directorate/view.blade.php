@extends('layouts/dir')
@section('main')
<div class="card m-4">

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="card-header">
        <h3 class="h3 mb-3 text-gray-800">View Sanction
            <a href="{{url('dir/')}}" class="btn btn-primary btn-sm float-right">Add Sanction</a>
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
            <thead>
                    <th>Sanction Id</th>
                    <th>Financial Year</th>
                    <th>District Name</th>
                    <th>Block Name</th>
                    <th>Gram Panchayat Name</th>
                    <th>Sanction Amount</th>
                    <th>Sanction Date</th>
                    <th>Edit</th>
            </thead>
            <tbody>
                @foreach($sanction as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->financial_year}}</td>
                    <td>{{$s->district}}</td>
                    <td>{{$s->block}}</td>
                    <td>{{$s->gp}}</td>
                    <td>{{$s->san_amount}}</td>
                    <td>{{$s->sanction_date}}</td>
                    <td>
                        @php
                            $progressExists = optional($s->progress)->isNotEmpty();
                            $isFreeze=false;
                            if($progressExists)
                            {
                                if($s->progress[0]->isFreeze=='yes')
                                {
                                    $isFreeze=true;
                                }
                            }
                        @endphp
                        @if($isFreeze)
                             <div class="alert alert-info">Can not edit, as progress is already freezed by the District.</div>
                        @elseif(!$isFreeze) 
                             <a href="{{url('dir/edit/').'/'.$s->id}}" class="btn btn-info">Edit</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection

