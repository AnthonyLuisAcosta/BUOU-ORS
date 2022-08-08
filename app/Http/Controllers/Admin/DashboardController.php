<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $applicantCount = User::where('role_id', 5)->count();
        $test = User::all();
        return view('admin.dashboard')
            ->with(compact('applicantCount'))
            ->with(compact('test'));
    }
}
