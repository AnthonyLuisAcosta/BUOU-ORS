<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Programs;
use App\Models\Subjects;
use App\Models\Terms;

class FeesController extends Controller
{
    public function index()
    {
        //
        $applications = Application::where('status', 'admitted')->get();
        //return dd("$admitted");

        return view('registrar.fees.index')
            ->with(compact('applications'));
    }
    public function show($id)
    {
        //
        $application = Application::find($id);
        $subjects = Subjects::all();
        $programs = Programs::all();
        $term = Terms::where('status', '1')->first();
        //return dd($subjects);
        return view('registrar.fees.show')
            ->with(compact('application'))
            ->with(compact('subjects'))
            ->with(compact('programs'))
            ->with(compact('term'));
    }
    public function destroy($id)
    {
        //
    }
}
