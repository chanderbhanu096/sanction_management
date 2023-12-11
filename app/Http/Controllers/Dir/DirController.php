<?php

namespace App\Http\Controllers\Dir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Sanction\sanRequest;
use App\Models\Sanction;
class DirController extends Controller
{
    public function index()
    {
        return view('Directorate/index');
    }
    public function store(sanRequest $req)
    {
        $data=$req->validated();
        $sanction=new Sanction;
        $sanction->financial_year=$data['financial_year'];
        $sanction->district=$data['district'];
        $sanction->block=$data['block'];
        $sanction->gp=$data['gp'];
        $sanction->newGP=$req['newGP'];
        $sanction->san_amount=$data['san_amount'];
        $sanction->sanction_date=$data['sanction_date'];
        $sanction->sanction_head=$data['sanction_head'];
        $sanction->sanction_purpose=$data['sanction_purpose'];
        $sanction->save();
        return redirect(url('dir/view'))->with("message","Sanction added successfully!");
    }
    public function view()
    {
        $sanction=Sanction::all();
        return view('Directorate/view',compact('sanction'));
    }
    public function edit($id)
    {
        $sanction=Sanction::find($id);
        return view('Directorate/edit',compact('sanction'));
    }

    public function update(sanRequest $req,$sanction_id)
    {
        $data=$req->validated();
        $sanction=Sanction::find($sanction_id);
        $sanction->financial_year=$data['financial_year'];
        $sanction->district=$data['district'];
        $sanction->block=$data['block'];
        $sanction->gp=$data['gp'];
        $sanction->newGP=$req['newGP'];
        $sanction->san_amount=$data['san_amount'];
        $sanction->sanction_date=$data['sanction_date'];
        $sanction->sanction_head=$data['sanction_head'];
        $sanction->sanction_purpose=$data['sanction_purpose'];
        $sanction->update();
        return redirect(url('dir/view'))->with("message","Sanction updated successfully!");
    }
}
