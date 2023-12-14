<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sanction;
use Illuminate\Support\Facades\DB;
class DistrictController extends Controller
{
    public function index()
    {
        $district=Auth::user()->district;
        $sanction = Sanction::select('gp','block', DB::raw('SUM(san_amount) as total_sanction_amount'))
            ->where('district', $district)
            ->groupBy('gp','block')
            ->get();
            // dd($sanction[0]);
        return view('District.index',compact('sanction'));
    }
}
