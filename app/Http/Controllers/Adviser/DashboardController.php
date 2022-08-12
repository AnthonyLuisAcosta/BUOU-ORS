<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $announcement = Announcement::all();
        return view('adviser.dashboard')->with(compact('announcement'));
    }
}
