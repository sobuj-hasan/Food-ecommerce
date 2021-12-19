<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function restrictuser(){
        return view('dashboard.restrict_user');
    }

}
