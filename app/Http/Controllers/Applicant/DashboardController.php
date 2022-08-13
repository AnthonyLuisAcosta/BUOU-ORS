<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Terms;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $terms = Terms::all();
        $announcement = Announcement::all();
        return view('applicant.dashboard')
            ->with(compact('announcement'))
            ->with(compact('terms'));
    }
}
