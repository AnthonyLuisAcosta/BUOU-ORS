<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeesTemplate;
use App\Http\Requests\StoreTemplateRequest;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $templates = FeesTemplate::all();
        return view('cashier.template.index')
            ->with(compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cashier.template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTemplateRequest $request)
    {
        //calculate Total before storing
        $total = $request->admission + $request->tuition + $request->matricula + $request->medical + $request->library + $request->athletic + $request->cultural + $request->guidance + $request->scuaa + $request->distLearn;
        //
        $input = $request->validated();
        //assigning total value
        $input['total'] = $total;
        FeesTemplate::create($input);
        return redirect()->route('cashier.template.index')
            ->with('success', 'New Template Added');
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
        $template = FeesTemplate::find($id);
        return view('cashier.template.show')
            ->with(compact('template'));
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
        $template = FeesTemplate::find($id);
        return view('cashier.template.edit')
            ->with(compact('template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTemplateRequest $request, $id)
    {
        //
        $template = FeesTemplate::find($id);
        $total = $request->admission + $request->tuition + $request->matricula + $request->medical + $request->library + $request->athletic + $request->cultural + $request->guidance + $request->scuaa + $request->distLearn;
        $input = $request->validated();
        //assigning total value
        $input['total'] = $total;
        $template->update($input);

        return redirect()->route('cashier.template.index')
            ->with('success', 'Template Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeesTemplate $template)
    {
        //
        $template->delete();
        return back()->with('success', 'Template Deleted.');
    }
}
