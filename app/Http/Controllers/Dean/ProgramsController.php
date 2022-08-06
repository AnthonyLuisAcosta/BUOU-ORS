<?php

namespace App\Http\Controllers\Dean;

use App\Models\User;
use App\Models\Programs;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    /* Display a listing of programs*/
    public function index()
    {
        $programs = Programs::all();
        $users = User::all();
        return view('dean.programs.index')->with('programs', $programs)->with('users', $users);
    }
}