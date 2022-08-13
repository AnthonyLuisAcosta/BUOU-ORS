<?php

namespace App\Http\Controllers\Adviser;

use App\Models\Programs;
use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Models\Category;
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
        return view('adviser.subjects.index')->with('subjects', $subjects)->with('programs', $programs)->with('categories', $categories);
    }

}