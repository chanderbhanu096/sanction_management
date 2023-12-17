<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sanction;
use App\Http\Requests\Progress\ProgressData;
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
        return view('District.index',compact('sanction'));
    }

    public function details($gp)
    {   
        $district=Auth::user()->district;
        $sanction=Sanction::where('gp',$gp)->where('district', $district)->get();
        return view('District.details',compact('sanction'));
    }

    public function progress($id)
    {
        $district=Auth::user()->district;
        $sanction=Sanction::where('id',$id)->first();
        return view('District.progress',compact('sanction'));
    }

    public function addProgress(ProgressData $data,$id)
    {
        $progress=$data->validated();
        

    }
}
