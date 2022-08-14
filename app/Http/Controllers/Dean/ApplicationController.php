<?php

namespace App\Http\Controllers\Dean;

use App\Models\Application;
use App\Models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\ApplicationApprovalEmail;
use App\Notifications\ApplicationRecommendedEmail;
use App\Notifications\ApplicationRejectedEmail;
use Illuminate\Support\Facades\File;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Programs::all();
        $application = Application::all();

        return view('dean.application.index')->with('programs', $programs)->with('application', $application);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Programs::all();
        return view('dean.application.create')->with('programs', $programs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'lastName'          =>  'required',
            'firstName'          =>  'required',
            'middleName'          =>  'required',
            'birthDate'          =>  'required',
            'gender'          =>  'required',
            'status',
            'email'          =>  'required',
            'phone'          =>  'required',
            'company'          =>  'required',
            'address'          =>  'required',
            'programs_id'       => 'required',


            'applicantImage'         =>  'required|file|mimes:jpg,png,jpeg,gif,svg,pdf,docx,doc'
        ]);

        $file_name = time() . '.' . request()->applicantImage->getClientOriginalExtension();

        request()->applicantImage->move(public_path('requirements'), $file_name);

        $application = new Application;

        $application->lastName = $request->lastName;
        $application->firstName = $request->firstName;
        $application->middleName = $request->middleName;
        $application->birthDate = $request->birthDate;
        $application->gender = $request->gender;
        $application->status;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->company = $request->company;
        $application->address = $request->address;
        $application->programs_id = $request->programs_id;
        $application->applicantImage = $file_name;
        #$application->programs_id = $programs_id;

        $application->save();

        return redirect()->route('dean.application.index')->with('success', 'Application Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        $programs = Programs::all();
        return view('dean.application.show', compact('application'))->with('programs', $programs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application, Programs $programs)
    {
        $programs = Programs::all();
        return view('dean.application.edit', compact('application'))->with('programs', $programs)->with('application', $application);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $count = count($request->all());

        if ($count == 4) {

            $application = Application::find($id);
            $application->status = $request->input('status');
            $application->update();
            if ($request->input('status') == "Approved") {
                //If recommend button was pressed
                $application->notify(new ApplicationApprovalEmail());
            } else if ($request->input('status') == "Rejected") {
                //If reject button was pressed
                $application->notify(new ApplicationRejectedEmail());
            }
            return redirect()->route('dean.application.index')->with('success', 'Application has been updated successfully');
            #return dd($count);

        } else {
            $application = Application::all();
            foreach ($application as $app) {
                if ($app->status == "Recommended") {
                    $app->status = $request->input('status');
                    $app->update();
                }
            };
            return redirect()->route('dean.application.index')->with('success', 'All application has been updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('dean.application.index')->with('success', 'Application deleted successfully!');
    }
}
