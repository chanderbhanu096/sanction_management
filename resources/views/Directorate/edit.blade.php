@extends('layouts/dir')
@section('main')
<div class="card m-4">
    <div class="card-header">
        <h3>Directorate Home Page</h3>
    </div>
    <div class="card-body">
        <form action="{{url('dir/sanction-add')}}"  id="sanction" method="POST">
            @csrf
            {{-- Financial Year --}}
            <div class="mb-3">
                <label for="Financial Year" class="form-label">Select Financial Year</label>
                <select name="financial_year" id="financial_year" class="form-control">
                    <option value="-1">--Select F.Y.--</option>
                    <option value="2020-21" {{$sanction->financial_year=='2020-21'?'selected':''}}>2020-21</option>
                    <option value="2021-22" {{$sanction->financial_year=='2021-22'?'selected':''}}>2021-22</option>
                    <option value="2022-23" {{$sanction->financial_year=='2022-23'?'selected':''}}>2022-23</option>
                    <option value="2023-24" {{$sanction->financial_year=='2023-24'?'selected':''}}>2023-24</option>
                </select>
            </div>
            {{-- District Name --}}
            <div class="mb-3" id="district-block">
                <label for="District name" class="form-label">Select District Name</label>
                <select id="district-list" class="form-control" name="district">
                    <option value="{{$sanction->district}}">{{$sanction->district}}</option>
                </select>
            </div>
            {{-- Block Name --}}
            <div class="mb-3" id="blocks-block">
                <label for="Block name" class="form-label">Select Block Name</label>
                <select id="block-list" class="form-control" name="block">
                    <option value="{{$sanction->block}}">{{$sanction->block}}</option>
                </select>
            </div>
             {{-- GramPanchayat Name --}}
             <div class="mb-3" id="gp-block">
                <label for="Gram Panchayat name" class="form-label">Select Gram Panchayat</label>
                <select id="panchayat-list" class="form-control" name="gp">
                    <option value="{{$sanction->gp}}">{{$sanction->gp}}</option>
                </select>
            </div>
            {{-- New Gram Panchayat Check --}}
           <div class="mb-3 form-control" >
                <label for="New GP" class="form-label">Whether this Gram Panchayat is newly created?</label>
                <input type="radio" name="newGP" value="Yes" {{$sanction->newGP=='yes'?'checked':''}} class="ml-5">
                <label for="yes" class="form-label">Yes</label>
                <input type="radio" name="newGP" value="No" {{$sanction->newGP=='no'?'checked':''}} class="">
                <label for="No" class="form-label">No</label>
           </div>
            {{-- Amount --}}
            <div class="mb-3">
                <label for="Block Name" class="form-label">Enter Sanction Amount(in Rs.)</label>
                <input type="number" name="san_amount" id="sanction_amt" class="form-control" value="{{$sanction->san_amount}}">
            </div>
            {{-- Sanction Date --}}
           <div class="mb-3">
                <label for="Date" class="form-label">Select Date of Sanction</label>
                <input type="date" name="sanction_date" class="form-control" id="sanction_date" value="{{$sanction->sanction_date}}">
           </div>
           {{-- Head of Sanction --}}
           <div class="mb-3">
            <label for="Head of Sanction" class="form-label">Enter Sanction Head</label>
            <input type="text" name="sanction_head" id="sanction_head" class="form-control" value="{{$sanction->sanction_head}}">
           </div>
           {{-- Purpose of sanction --}}
           <div class="mb-3">
            <label for="purpose of sanction" class="form-label">Purpose of Sanction</label>
            <select name="sanction_purpose" id="sanction_purpose" class="form-control" name="sanction_purpose">
                <option value="-1">Select Sanction Purpose</option>
                <option value="New Panchayat Ghar" {{$sanction->sanction_purpose=='New Panchayat Ghar'?'selected':''}}>New Panchayat Ghar</option>
            </select>
           </div>
           <button type="submit" class="btn btn-primary">Add Sanction</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
   $(document).ready(function() {
            // Load the JSON data
            $.getJSON("{{asset('assets/json/gpname.json')}}", function(data) {
                // Display the list of districts
               
                displayDistricts(data.districts);

                // Handle district selection
                $("#district-block").on("change", "#district-list", function() {
                    var selectedDistrict = $(this).val();
                    displayBlocks(data.data[selectedDistrict]);
                });

                // Handle block selection
                $("#blocks-block").on("change", "#block-list", function() {
                    var selectedDistrict = $("#district-list").val();
                    var selectedBlock = $(this).val();
                    displayPanchayats(data.data[selectedDistrict][selectedBlock]);
                });
            });
        });
    function displayDistricts(districts) {
            var districtList = '<label for="District name" class="form-label">Select District Name</label><select id="district-list" class="form-control" name="district"><option value="-1">--Select District--</option>';
            $.each(districts, function(index, district) {
                districtList += '<option value="' + district + '">' + district + '</option>';
            });
            districtList += '</select>';
            $("#district-block").html(districtList);
        }
        function displayBlocks(blocks) {
            var blockList = '<label for="Block name" class="form-label">Select Block Name</label><select id="block-list" class="form-control" name="block"><option value="-1">--Select Block--</option>';
            $.each(blocks, function(block, panchayats) {
                blockList += '<option value="' + block + '">' + block + '</option>';
            });
            blockList += '</select>';
            $("#blocks-block").html(blockList);
        }

        function displayPanchayats(panchayats) {
            var panchayatList = '<label for="Gram Panchayat name" class="form-label">Select Gram Panchayat Name</label><select id="panchayat-list" class="form-control" name="gp"><option value="-1">--Select Gram Panchayat--</option>';
            $.each(panchayats, function(index, panchayat) {
                panchayatList += '<option value="' + panchayat + '">' + panchayat + '</option>';
            });
            panchayatList += '</select>';
            $("#gp-block").html(panchayatList);
        }

   
</script>
<script src="{{asset('assets/js/validation.js')}}"></script>
@endsection