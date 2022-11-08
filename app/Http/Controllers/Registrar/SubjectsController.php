<?php

namespace App\Http\Controllers\Registrar;

use App\Models\Terms;
use App\Models\Category;
use App\Models\Programs;
use App\Models\Subjects;
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
        return view('registrar.subjects.index')->with('subjects', $subjects)
            ->with('programs', $programs)
            ->with('categories', $categories)
            ->with('terms', $terms);
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
        $programs = Programs::all();
        $categories = Category::all();
        $terms = Terms::all();
        return view('registrar.subjects.show')
            ->with('subjects', $subjects)
            ->with('programs', $programs)
            ->with('categories', $categories)
            ->with('terms', $terms);
    }
}
