<?php

namespace App\Http\Controllers\Registrar;

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
        $processed = Application::where('status', 'Processed')->count();
        return view('registrar.dashboard')
            ->with(compact('announcement'))
            ->with(compact('terms'))
            ->with(compact('processed'));
    }
}
