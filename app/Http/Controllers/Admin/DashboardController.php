<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;

class DashboardController extends Controller
{
    //
    public function index()
    {
        /*
        $applicantCount = User::where('role_id', 5)->count();
        $test = User::all();
        */
        $total = Application::all();

        $pending = Application::where('status', 'Pending')->count();
        $recommended = Application::where('status', 'Recommended')->count();
        $admitted = Application::where('status', 'Admitted')->count();
        $processed = Application::where('status', 'Processed')->count();
        $rejected = Application::where('status', 'Rejected')->count();

        return view('admin.dashboard')
            ->with(compact('pending'))
            ->with(compact('recommended'))
            ->with(compact('admitted'))
            ->with(compact('processed'))
            ->with(compact('rejected'));
    }
}
