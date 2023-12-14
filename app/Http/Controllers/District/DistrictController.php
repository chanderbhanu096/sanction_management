<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sanction;

class DistrictController extends Controller
{
    public function index()
    {
        $district=Auth::user()->district;
        $sanction=Sanction::where('district',$district)->get();
        return view('District.index',compact('sanction'));
    }
}
