<?php

namespace App\Http\Controllers;
use App\Models\dasboard;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index()
    {
        return view('dasboard.index');
    }
}
