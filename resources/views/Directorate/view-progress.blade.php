@extends('layouts/dir')
@section('main')
<div class="card m-4">

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="card-header">
        <h3 class="h3 mb-3 text-gray-800">View Progress of Sanctions
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center table-striped" id="districtTable">
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
                            <td>
                                <a href="javascript:void(0);" class="districtCell" data-district="{{ $d }}">
                                    {{$d}}
                                </a>
                            </td>

                            @php
                                $i++;
                            @endphp
                            @foreach($sanctions as $san)
                                @if($san->district==$d)
                                    @php
                                        $totalSanction += floatval($san->san_amount);
                                        $progressExists = optional($san->progress)->isNotEmpty();
                                        if($progressExists)
                                        {
                                            $totalUtilized += ($san->progress && $san->progress[0]->p_isComplete == 'yes' && $san->progress[0]->isFreeze=='yes') ? floatval($san->san_amount) : 0;
                                        }
                                        else {
                                            $totalUtilized += 0;
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
        <div id="blocksTable"></div>
        <div id="gps"></div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            var districtsData = {!! json_encode($districts) !!};
            var sanctionsData = {!! json_encode($sanctions) !!};

            
            // Store the original district table HTML
            var originalDistrictTableHtml = $('#districtTable').html();


            // Click Listener on the District Table
            $('table#districtTable').on('click', 'a.districtCell', function () {
                let district = $(this).data('district');
                updateBlockTable(district);
            });

            // Click Listener on the Block Table
            $(document).on('click','a.blockCell',function()
            {
                let block=$(this).text();
                updateGpTable(block);
            })


             // Add event listener for the back button
            $(document).on('click', '#backButton', function () {
            // Restore the original district table HTML
            $('#districtTable').html(originalDistrictTableHtml);
            });

            function updateBlockTable(district) {
                $.get('{{ url('/dir/blocks') }}' + '/' + district, function (blocks) {
                    let blockTable ='<div>';
                    blockTable += '<table>';                                                    
                    blockTable += '<thead><tr><th>Sr. No.</th><th>Block Name</th><th>Total Sanctions</th><th>Total Utilized</th></tr></thead>';
                    blockTable += '<tbody>';
                    let index=1;
                    blocks.forEach(function (block) {
                        let totalSanction = 0;
                        let totalUtilized = 0;

                        sanctionsData.forEach(function (s) {
                            if (s.block === block) {
                                totalSanction += parseFloat(s.san_amount);
                                let progressExists = s.progress && s.progress.length > 0;
                                if (progressExists && s.progress[0].p_isComplete === 'yes' && s.progress[0].isFreeze === 'yes') {
                                    totalUtilized += parseFloat(s.san_amount);
                                } else {
                                    totalUtilized += 0;
                                }
                            }
                        });

                        blockTable += '<tr>';
                        blockTable+='<td>'+ index +'</td>';
                        
                        blockTable += '<td><a href="javascript:void(0);" class="blockCell" data-district='+block+'>'+block+'</a></td>'                 
                        //   <td class="blockCell">' + block + '</td>';
                        blockTable += '<td>' + totalSanction.toFixed(2) + '</td>';
                        blockTable += '<td>' + totalUtilized.toFixed(2) + '</td>';
                        blockTable += '</tr>';
                        index++;
                    });

                    blockTable += '</tbody>';
                    blockTable += '</table>';
                    blockTable +='<button id="backButton" class="btn btn-primary float-right m-2">Back</button>';    
                    blockTable +='</div>';
                    // Add a back button to go back to the district table
                    
                    $('#districtTable').html(blockTable);
                });
            }
            function updateGpTable(block) {
             $.get('{{ url('/dir/gps') }}' + '/' + block, function (gps) {
               // Handle the GPS data here
               let gpTable='<div>';
                gpTable += '<table>';   
                gpTable += '<thead><tr><th>Sr. No.</th><th>Block Name</th><th>Total Sanctions</th><th>Total Utilized</th></tr></thead>';
                gpTable += '<tbody>';
                let index=1;
                gps.forEach(function(g)
                {
                    let totalSanction = 0;
                    let totalUtilized = 0;
                    sanctionsData.forEach(function(s)
                    {
                        if(s.gp===g)
                        {
                            totalSanction += parseFloat(s.san_amount);
                                let progressExists = s.progress && s.progress.length > 0;
                                if (progressExists && s.progress[0].p_isComplete === 'yes' && s.progress[0].isFreeze === 'yes') {
                                    totalUtilized += parseFloat(s.san_amount);
                                } else {
                                    totalUtilized += 0;
                                }
                        }
                    });

                        gpTable += '<tr>';
                        gpTable+='<td>'+ index +'</td>';
                        
                        gpTable += '<td><a href="javascript:void(0);" class="blockCell" data-district='+g+'>'+g+'</a></td>'                 
                        //   <td class="blockCell">' + block + '</td>';
                        gpTable += '<td>' + totalSanction.toFixed(2) + '</td>';
                        gpTable += '<td>' + totalUtilized.toFixed(2) + '</td>';
                        gpTable += '</tr>';
                        index++;
                });
                gpTable += '</tbody>';
                gpTable += '</table>';
                gpTable +='<button id="backButton" class="btn btn-primary float-right m-2">Back</button>';    
                gpTable +='</div>';
                    // Add a back button to go back to the district table
                    $('#districtTable').html(gpTable);
             });
            }
        });
    </script>
@endsection
