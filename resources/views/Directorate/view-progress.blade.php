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
            <table class="table table-bordered text-center table-striped">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>District Name</th>
                        <th>Total Sanction Amounts(Rs.)</th>
                        <th>Total Utilized</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($districts as $d)
                        @php
                            $totalSanction=0;
                            $totalUtilized=0;    
                        @endphp    
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$d}}</td>
                            @php
                                $i++;
                            @endphp
                            @foreach($sanctions as $san)
                                @if($san->district==$d)
                                @php
                                    $totalSanction+=floatval($san->san_amount);
                                    $progressExists = optional($san->progress)->isNotEmpty();
                                    if($progressExists)
                                    {
                                        $totalUtilized+=($san->progress && $san->progress[0]->p_isComplete == 'yes') ? floatval($san->san_amount) : 0;
                                    }
                                    else {
                                        $totalUtilized+=0;
                                    }
                                    
                                @endphp
                                @endif
                            @endforeach
                            <td>{{ number_format($totalSanction, 2) }}</td>
                            <td>{{ number_format($totalUtilized, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="blocks"></div>
        <div id="gps"></div>
    </div>
</div>
@endsection

