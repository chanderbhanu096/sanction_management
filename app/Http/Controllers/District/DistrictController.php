<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sanction;
use App\Models\Progress;
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

    public function addProgress(ProgressData $data)
    {
        $currentDate=now();
        $formatDate=$currentDate->format('Y-m-d H:i:s');
        $progressValidated=$data->validated();
        $progress=new Progress;
        $progress->completion_percentage=$progressValidated['completion_percentage'];
        $progress->p_isComplete=$progressValidated['p_isComplete'];
        if($data->hasFile('p_uc'))
        {
            $file=$data->file('p_uc');
            $filename=$data->sanction_id.time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/ucs/',$filename);
            $progress->p_uc=$filename;
        }

        $progress->remarks=$progressValidated['remarks'];
        $progress->sanction_id=$progressValidated['sanction_id'];
        $progress->p_update=$formatDate;
        $progress->save();
        $p_stored=Progress::where('sanction_id',$data->sanction_id)->get()->first();
        if($data->hasFile('p_image'))
        {
            $uploadedImage=$data->file('p_image');
            foreach($uploadedImage as $u)
            {
                $filename=$progress->sanction_id.'_'.time().'_'.$u->getClientOriginalName();
                $u->move('uploads/images/',$filename);
                $progress->image()->create(['image_path'=>$filename,'progress_id'=>$p_stored->id]);
            }
        }
        return redirect(url('district/view-progress'))->with('message',"Progress Added Successfully!");
    }

    public function viewProgress()
    {
        return view('District/view-Progress');
    }
}
