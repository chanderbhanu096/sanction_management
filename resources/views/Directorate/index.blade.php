@extends('layouts/dir')
@section('main')
<div class="card m-4">
    <div class="card-header">
        <h3>Directorate Home Page</h3>
    </div>
    <div class="card-body">
        <h4>Add Sanction</h3>
        <form action="" method="POST">
            @csrf
            {{-- Financial Year --}}
            <div class="mb-3">
                <label for="Financial Year" class="form-label">Select Financial Year</label>
                <select name="financial_year" id="financial_year" class="form-control">
                    <option value="-1">--Select F.Y.--</option>
                    <option value="2020-21">2020-21</option>
                    <option value="2021-22">2021-22</option>
                    <option value="2022-23">2022-23</option>
                    <option value="2023-24">2023-24</option>
                </select>
            </div>
            {{-- District Name --}}
            <div class="mb-3">
                <label for="District" class="form-label">Select District</label>
                <select name="financial_year" id="financial_year" class="form-control">
                    <option value="-1">--Select District--</option>
                    <option value="Bilaspur">Bilaspur</option>
                    <option value="Chamba">Chamba</option>
                    <option value="Hamirpur">Hamirpur</option>
                    <option value="Kangra">Kangra</option>
                    <option value="Kinnaur">Kinnaur</option>
                    <option value="Kullu">Kullu</option>
                    <option value="Lahul And Spiti">Lahul And Spiti</option>
                    <option value="Mandi">Mandi</option>
                    <option value="Shimla">Shimla</option>
                    <option value="Sirmaur">Sirmaur</option>
                    <option value="Solan">Solan</option>
                    <option value="Una">Una</option>
                </select>
            </div>
            {{-- Block Name --}}
            <div class="mb-3">
                <label for="Block Name" class="form-label">Select Block</label>
                <select name="block" id="block_name" class="form-control">
                    <option value="-1">--Select Block Name--</option>
                </select>
            </div>
             {{-- GramPanchayat Name --}}
             <div class="mb-3">
                <label for="Block Name" class="form-label">Select Gram Panchayat</label>
                <select name="block" id="block_name" class="form-control">
                    <option value="-1">--Select Gram Panchayat--</option>
                </select>
            </div>
            {{-- New Gram Panchayat Check --}}
           <div class="mb-3 form-control" >
                <label for="New GP" class="form-label">Whether this Gram Panchayat is newly created?</label>
                <input type="radio" name="newGP" value="Yes" class="ml-5">
                <label for="yes" class="form-label">Yes</label>
                <input type="radio" name="newGP" value="No" class="">
                <label for="No" class="form-label">No</label>
           </div>
            {{-- Amount --}}
            <div class="mb-3">
                <label for="Block Name" class="form-label">Enter Sanction Amount(in Rs.)</label>
                <input type="number" name="san_amount" id="sanction" class="form-control">
            </div>
            {{-- Sanction Date --}}
           <div class="mb-3">
                <label for="Date" class="form-label">Select Date of Sanction</label>
                <input type="date" name="sanction_date" class="form-control" id="sanction_date">
           </div>
           {{-- Head of Sanction --}}
           <div class="mb-3">
            <label for="Head of Sanction" class="form-label">Enter Head of Sanction</label>
            <input type="text" name="sanction_head" id="sanction_head" class="form-control">
           </div>
           {{-- Purpose of sanction --}}
           <div class="mb-3">
            <label for="purpose of sanction" class="form-label">Purpose of Sanction</label>
            <select name="sanction_purpose" id="sanction_purpose" class="form-control">
                <option value="-1">Select Sanction Purpose</option>
                <option value="New Panchayat Ghar">New Panchayat Ghar</option>
            </select>
           </div>
           <button type="submit" class="btn btn-primary">Add Sanction</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function()
{
    $.getJSON("{{asset('assets/json/gpname.json')}}",function(data)
    {
        console.log(data);
    });
});
</script>
@endsection