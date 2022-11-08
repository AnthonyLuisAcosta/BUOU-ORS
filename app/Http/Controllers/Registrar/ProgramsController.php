<?php

namespace App\Http\Controllers\Registrar;

use App\Models\User;
use App\Models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgramsRequest;

class ProgramsController extends Controller
{
    /* Display a listing of the resource*/
    public function index()
    {
        $programs = Programs::all();
        $users = User::all();
        return view('registrar.programs.index')->with('programs', $programs)->with('users', $users);
    }


    /* Display the specified resource*/
    public function show($id)
    {
        $programs = Programs::find($id);
        $users = User::all();
        return view('registrar.programs.show')->with('programs', $programs)->with('users', $users);
    }
}