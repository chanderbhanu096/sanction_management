<?php

namespace App\Http\Controllers\Dir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DirController extends Controller
{
    public function index()
    {
        return view('Directorate/index');
    }
    public function store(Request $req)
    {
        echo $req['san_amount'];
    }
}
