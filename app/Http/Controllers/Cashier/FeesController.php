<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\AdditionalFees;
use App\Models\Application;
use App\Models\Fees;
use App\Models\FeesTemplate;
use App\Models\Programs;
use App\Models\Subjects;
use App\Models\Terms;
use App\Models\User;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fees = Fees::all();
        $applications = Application::all();
        return view('cashier.fees.index')
            ->with(compact('fees'))
            ->with(compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $fee = Fees::find($id);
        $appID = $fee->appRef_id;
        $application = Application::find($appID);
        $term = Terms::where('status', '1')->first();
        $subjects = Subjects::all();
        $programs = Programs::all();
        $template = FeesTemplate::find($fee->fees);
        $adds = AdditionalFees::all();
        $adds->shift();
        $adds->all();
        $cashier = User::where('role_id', '2')->first();
        return view('cashier.fees.show')
            ->with(compact('fee'))
            ->with(compact('application'))
            ->with(compact('term'))
            ->with(compact('subjects'))
            ->with(compact('programs'))
            ->with(compact('template'))
            ->with(compact('adds'))
            ->with(compact('cashier'));
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
        $fee = Fees::find($id);
        $appID = $fee->appRef_id;
        $application = Application::find($appID);
        $term = Terms::where('status', '1')->first();
        $subjects = Subjects::all();
        $programs = Programs::all();
        $template = FeesTemplate::find($fee->fees);
        $adds = AdditionalFees::all();
        $adds->shift();
        $adds->all();
        $cashier = User::where('role_id', '2')->first();
        return view('cashier.fees.edit')
            ->with(compact('fee'))
            ->with(compact('application'))
            ->with(compact('term'))
            ->with(compact('subjects'))
            ->with(compact('programs'))
            ->with(compact('template'))
            ->with(compact('adds'))
            ->with(compact('cashier'));
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
        $fee = Fees::find($id);
        $status = $request->status;
        $total = $request->total;
        $fee->update([
            'status' => $status,
            'total' => $total,
        ]);
        return redirect()->route('cashier.fees.index')->with('success', 'Payment successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
