<?php

namespace App\Http\Controllers\Adviser;

use App\Models\User;
use App\Models\Terms;
use App\Models\Programs;
use App\Models\Application;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProgramsController extends Controller
{
    /* Display a listing of programs*/
    public function index()
    {
        $programs = Programs::all();
        $applications = Application::all();
        $terms = Terms::all();
        return view('adviser.programs.index')
            ->with('programs', $programs)
            ->with('applications', $applications)
            ->with('terms', $terms);
    }

    /* Display the specified resource*/
    public function show(Application $application, $id)
    {
        $programs = Programs::find($id);
        $id = Auth::user()->id;
        $applications = Application::all();
        return view('adviser.programs.show', compact('application'))->with('programs', $programs)->with('applications', $applications);
    }
}