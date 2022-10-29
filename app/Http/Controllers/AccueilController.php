<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Commissariat;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $com = Commissariat::count();
        $mem = User::where('id', '!=', '1')->count();
        return view('layouts.index', compact('com','mem'));
    }
}
