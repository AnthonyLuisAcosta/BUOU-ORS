<?php

namespace App\Http\Controllers\Registrar;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeesRequest;
use App\Models\AdditionalFees;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Fees;
use App\Models\FeesTemplate;
use App\Models\Programs;
use App\Models\Subjects;
use App\Models\Terms;

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
        $applications = Application::where('status', 'processed')->get();
        return view('registrar.fees.index')
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
    public function store(StoreFeesRequest $request)
    {
        if ($request->fees == 0) {
            return back()->with('error', 'Please fill in required fields.');
        } else {
            //assigning values
            $templateCost = FeesTemplate::find($request['fees'])->total;
            $add1 = AdditionalFees::find($request['addFees1'])->cost;
            $add2 = AdditionalFees::find($request['addFees2'])->cost;
            $add3 = AdditionalFees::find($request['addFees3'])->cost;
            $add4 = AdditionalFees::find($request['addFees4'])->cost;
            $add5 = AdditionalFees::find($request['addFees5'])->cost;
            $add6 = AdditionalFees::find($request['addFees6'])->cost;
            $add7 = AdditionalFees::find($request['addFees7'])->cost;
            $add8 = AdditionalFees::find($request['addFees8'])->cost;
            $add9 = AdditionalFees::find($request['addFees9'])->cost;
            $add10 = AdditionalFees::find($request['addFees10'])->cost;
            //total cost
            $total = $templateCost + $add1 + $add2 + $add3 + $add4 + $add5 + $add6 + $add7 + $add8 + $add9 + $add10;
            //reassign values for model creation
            $input = $request->validated();
            $input['total'] = $total;
            $input['balance'] = $total;
            $input['addCost1'] = $add1;
            $input['addCost2'] = $add2;
            $input['addCost3'] = $add3;
            $input['addCost4'] = $add4;
            $input['addCost5'] = $add5;
            $input['addCost6'] = $add6;
            $input['addCost7'] = $add7;
            $input['addCost8'] = $add8;
            $input['addCost9'] = $add9;
            $input['addCost10'] = $add10;
            //storing
            Fees::create($input);
            return redirect()->route('registrar.fees.index')->with('success', 'Fees Generated.');
        }
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
        $fee = Fees::where('appRef_id', $id)->first();
        if ($fee == null) {
            return back()->with('error', 'No fees assessed. Generate fees first.');
        } else {
            $application = Application::find($id);
            $term = Terms::where('status', '1')->first();
            $subjects = Subjects::all();
            $programs = Programs::all();
            $locate = $fee['fees'];
            $template = FeesTemplate::find($locate);
            $adds = AdditionalFees::all();
            return view('registrar.fees.show')
                ->with(compact('fee'))
                ->with(compact('application'))
                ->with(compact('term'))
                ->with(compact('subjects'))
                ->with(compact('programs'))
                ->with(compact('template'))
                ->with(compact('adds'));
        }
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
        $application = Application::find($id);
        $subjects = Subjects::all();
        $programs = Programs::all();
        $term = Terms::where('status', '1')->first();
        $templates = FeesTemplate::all();
        $adds = AdditionalFees::all();
        return view('registrar.fees.create')
            ->with(compact('application'))
            ->with(compact('subjects'))
            ->with(compact('programs'))
            ->with(compact('term'))
            ->with(compact('templates'))
            ->with(compact('adds'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($appRef_id)
    {
        //
        $id = Fees::where('appRef_id', $appRef_id)->first();
        if ($id == null) {
            return back()->with('error', 'No fees assessed. Generate fees first.');
        } else {
            $id->delete();
            return back()->with('success', 'Assessed fees cleared!');
        }
    }
}
