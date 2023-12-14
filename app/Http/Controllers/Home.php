<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Home extends Controller
{
    public function index()
    {
        $user=Auth::user();
        if($user)
        {
            return redirect($user->role);
        }
        return view('FrontEnd/index');
    }
}
