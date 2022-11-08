<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Commissariat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccueilController extends Controller
{
    public function index()
    {
        $com = Commissariat::count();
        $mem = User::where('id', '!=', '1')->count();

        $test = Auth::user()->commissariat_id;
        $memcom = User::where('commissariat_id', $test)->count();
        return view('layouts.index', compact('com','mem','memcom'));
    }
    
}
