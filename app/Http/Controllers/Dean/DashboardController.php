<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Application;
use App\Models\Terms;

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
        $approved = Application::where('status', 'Approved')->count();
        $rejected = Application::where('status', 'Rejected')->count();

        $terms = Terms::all();

        return view('dean.dashboard')
            ->with(compact('pending'))
            ->with(compact('recommended'))
            ->with(compact('admitted'))
            ->with(compact('approved'))
            ->with(compact('rejected'))
            ->with(compact('announcement'))
            ->with(compact('terms'));
    }
}
