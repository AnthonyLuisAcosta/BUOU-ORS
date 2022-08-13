<?php

namespace App\Http\Controllers\Adviser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Announcement;
use App\Models\Terms;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $terms = Terms::all();
        $announcement = Announcement::all();
        $pending = Application::where('status', 'Pending')->count();
        return view('adviser.dashboard')
            ->with(compact('announcement'))
            ->with(compact('terms'))
            ->with(compact('pending'));
    }
}
