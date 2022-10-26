<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdditionalFees;
use App\Http\Requests\StoreAddFeesRequest;

class AdditionalFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adds = AdditionalFees::all();
        return view('cashier.template.addFees.index')
            ->with(compact('adds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cashier.template.addFees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddFeesRequest $request)
    {
        //
        $input = $request->validated();
        AdditionalFees::create($input);
        return redirect()->route('cashier.additional.index')
            ->with('success', 'Additional Fee Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $fee = AdditionalFees::find($id);
        return view('cashier.template.addFees.show')
            ->with(compact('fee'));
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
        $fee = AdditionalFees::find($id);
        return view('cashier.template.addFees.edit')
            ->with(compact('fee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAddFeesRequest $request, $id)
    {
        //
        $fee = AdditionalFees::find($id);
        $input = $request->validated();
        $fee->update($input);
        return redirect()->route('cashier.additional.index')
            ->with('success', 'Additional Fee Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdditionalFees $additional)
    {
        //
        $additional->delete();
        return back()->with('success', 'Additional Fee Deleted.');
    }
}
