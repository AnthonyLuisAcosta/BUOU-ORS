<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Application;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $total = Application::all();
        $announcement = Announcement::all();

        $pending = Application::where('status', 'Pending')->count();
        $recommended = Application::where('status', 'Recommended')->count();
        $admitted = Application::where('status', 'Admitted')->count();
        $processed = Application::where('status', 'Processed')->count();
        $rejected = Application::where('status', 'Rejected')->count();

        return view('dean.dashboard')
            ->with(compact('pending'))
            ->with(compact('recommended'))
            ->with(compact('admitted'))
            ->with(compact('processed'))
            ->with(compact('rejected'))
            ->with(compact('announcement'));
    }
}
