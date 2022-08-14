<?php

namespace App\Http\Controllers\Dean;

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
        return view('dean.subjects.index')
            ->with('subjects', $subjects)
            ->with('programs', $programs)
            ->with('categories', $categories)
            ->with('terms', $terms);
    }

}