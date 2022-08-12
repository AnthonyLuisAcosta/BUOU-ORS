<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $announcement = Announcement::all();
        return view('registrar.dashboard')->with(compact('announcement'));
    }
}
