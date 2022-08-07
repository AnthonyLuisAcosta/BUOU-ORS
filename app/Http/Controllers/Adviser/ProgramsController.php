<?php

namespace App\Http\Controllers\Adviser;

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
        $applications = Application::all();
        return view('adviser.programs.index')->with('programs', $programs)->with('applications', $applications);
    }
}