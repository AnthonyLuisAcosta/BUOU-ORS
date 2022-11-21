<?php

namespace App\Http\Controllers\Admin;

use App\Models\Terms;
use App\Models\Category;
use App\Models\Programs;
use App\Models\Subjects;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectsRequest;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subjects::all();
        $programs = Programs::all();
        $categories = Category::all();
        $terms = Terms::all();
        return view('admin.subjects.index')->with('subjects', $subjects)
            ->with('programs', $programs)
            ->with('categories', $categories)
            ->with('terms', $terms);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Programs::all();
        $categories = Category::all();
        $terms = Terms::all();
        return view('admin.subjects.create')
            ->with('programs', $programs)
            ->with('categories', $categories)
            ->with('terms', $terms)
            ->with('success', 'Subject created successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectsRequest $request)
    {
        $input = $request->validated();
        Subjects::create($input);
        return redirect()->route('admin.subjects.index')->with('success', 'Subject created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subjects = Subjects::find($id);
        $applications = Application::all();
        return view('admin.subjects.show')->with('subjects', $subjects)->with('applications', $applications);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjects = Subjects::find($id);
        $programs = Programs::all();
        $categories = Category::all();
        $terms = Terms::all();
        return view('admin.subjects.edit')
            ->with('subjects', $subjects)
            ->with('programs', $programs)
            ->with('categories', $categories)
            ->with('terms', $terms);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubjectsRequest $request, $id)
    {
        $subjects = Subjects::find($id);
        $input = $request->validated();
        $subjects->update($input);
        return redirect()->route('admin.subjects.index')->with('success', 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subjects $subject)
    {
        $subject->delete();
        return back()->with('success', 'Subject deleted successfully'); 
    }
}
