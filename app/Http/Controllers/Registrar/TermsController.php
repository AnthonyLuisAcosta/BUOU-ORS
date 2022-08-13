<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terms;
use App\Http\Requests\StoreTermRequest;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $terms = Terms::all();
        $stat = Terms::pluck('status')->toArray();
        return view('registrar.terms.index')
            ->with(compact('stat'))
            ->with(compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('registrar.terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTermRequest $request)
    {
        //
        $input = $request->validated();
        Terms::create($input);
        return redirect()->route('registrar.terms.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $term = Terms::find($id);
        return view('registrar.terms.edit')->with(compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $count = count($request->all());
        $term = Terms::find($id);
        if ($count == 3) {
            $term->status = ($request->input('status'));
            $term->update();
            return back();
        } else {
            $input = $request->all();
            $term->update([
                'year' => $input['year'],
                'label' => $input['label'],
                'status' => $input['status'],
            ]);
            return redirect()->route('registrar.terms.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terms $term)
    {
        //
        $term->delete();
        return back();
    }
}
