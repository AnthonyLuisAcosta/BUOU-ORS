<?php

namespace App\Http\Controllers\Applicant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Terms;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //
    public function index()
    {
        $id = Auth::user()->id;
        //Checks if there is an existing application for the logged in applicant
        $user = Application::where('applicant_id', $id)->count();
        $stats = Application::all();
        $terms = Terms::all();
        $announcement = Announcement::all();
        return view('applicant.dashboard')
            ->with(compact('announcement'))
            ->with(compact('terms'))
            ->with(compact('stats'))
            ->with(compact('user'));
    }
}
