<?php

namespace App\Http\Controllers\Dean;

use App\Models\User;
use App\Models\Terms;
use App\Models\Category;
use App\Models\Programs;
use App\Models\Subjects;
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
        return view('dean.programs.index')
            ->with('programs', $programs)
            ->with('applications', $applications)
            ->with('terms', $terms);
    }

    public function create()
    {
        $programs = Programs::all();
        $users = User::all();
        return view('dean.programs.create')->with('programs', $programs)
        ->with('users', $users);
    }

    /* Display the specified resource*/
    public function show( $id)
    {
        $programs = Programs::find($id);
        $id = Auth::user()->id;
        $subjects = Subjects::all();
        $applications = Application::all();
        return view('dean.programs.show')->with('subjects', $subjects)->with('programs', $programs)->with('applications', $applications);
    }

    public function edit( $id)
    {
        $programs = Programs::find($id);
        $id = Auth::user()->id;
        $subjects = Subjects::all();
        $categories = Category::all();

        return view('dean.programs.edit')->with('programs', $programs)->with('subjects', $subjects)
        ->with('categories', $categories);
    }
}
