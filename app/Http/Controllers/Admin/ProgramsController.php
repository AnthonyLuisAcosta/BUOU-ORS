<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.programs.index')->with('programs', $programs);
    }

    /*Show the form for creating a new resource */
    public function create()
    {
        $users = User::all();
        return view('admin.programs.create')->with('users', $users);
    }

    /* Store a newly created resource in storage*/
    public function store(StoreProgramsRequest $request)
    {
        $input = $request->validated();
        Programs::create($input);
        return redirect()->route('admin.programs.index')->with('success', 'Program created successfully');
    }

    /* Display the specified resource*/
    public function show($id)
    {
        $programs = Programs::find($id);
        $users = User::all();
        return view('admin.programs.show')->with('programs', $programs)->with('users', $users);
    }

    /*Show the form for editing the specified resource.*/
    public function edit($id)
    {
        $programs = Programs::find($id);
        $users = User::all();
        return view('admin.programs.edit')->with('programs', $programs)->with('users', $users);
    }

    /* Update the specified resource in storage*/
    public function update(StoreProgramsRequest $request, $id)
    {
        $programs = Programs::find($id);
        $input = $request->validated();
        $programs->update($input);
        return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully');
    }

    /*Remove the specified resource from storage.*/
    public function destroy(Programs $program)
    {
        $program->delete();
        return back()->with('success', 'Program deleted successfully'); 
    }

}