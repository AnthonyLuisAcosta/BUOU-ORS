<?php

namespace App\Http\Controllers\Dean;

use App\Models\User;
use App\Models\Programs;
use App\Models\Application;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    /* Display a listing of programs*/
    public function index()
    {
        $programs = Programs::all();
        $users = User::all();
        $applications = Application::all();
        /*if($programs->id == $applications->id){
            $count = Application::where('status', 'Admitted')->count();
        }*/

        $count = Application::where('status', 'Admitted')->count();

        return view('dean.programs.index')->with('programs', $programs)->with('users', $users)->with('applications', $applications)->with('count', $count);
    }
}
