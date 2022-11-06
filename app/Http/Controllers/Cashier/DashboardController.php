<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Terms;
use App\Models\Announcement;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $forAd = Application::where('status', 'Admitted')->count();
        $terms = Terms::all();
        $announcement = Announcement::all();
        return view('cashier.dashboard')
            ->with(compact('announcement'))
            ->with(compact('terms'))
            ->with(compact('forAd'));
    }
}
