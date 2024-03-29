<?php

namespace App\Http\Controllers\Dean;

use App\Models\File;
use App\Models\Logs;
use App\Models\User;
use App\Models\Remarks;
use App\Models\Programs;
use App\Models\Subjects;
use App\Models\Application;
#use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ApplicationApprovalEmail;
use App\Notifications\ApplicationRejectedEmail;
use App\Notifications\ApplicationRecommendedEmail;

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
        $application = Application::all();
        return view('dean.application.create')->with('programs', $programs)->with('application', $application);
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
            'classification',

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
        $subjects = Subjects::all();
        $files = File::all();
        $user = User::all();
        return view('dean.application.show', compact('application'))->with('programs', $programs)->with('subjects', $subjects)->with('files', $files)->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application, Programs $programs, File $files)
    {
        $programs = Programs::all();
        $subjects = Subjects::all();
        $files = File::all();
        return view('dean.application.edit', compact('application'))->with('programs', $programs)->with('subjects', $subjects)->with('application', $application)->with('files', $files);
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

        if ($count == 5) {

            $application = Application::find($id);
            $application->status = $request->input('status');
           
            $application->update();
            
            ########Create Remarks###########
            $remarks = new Remarks();
            $remarks->user = Auth::user()->id;    
            $remarks->application_id = $application->id;
            $remarks->input = $request->input('remarks');
            $remarks->save();

            ########Create Log###########
            $logs = new Logs;
            $logs->user = Auth::user()->id;    
            $logs->application_id = $application->id;
            $logs->activity = 'Application '.  $application->status;
            $logs->save();

            $application->classification = $request->input('classification');


            if ($request->input('status') == "Approved") {
                //If recommend button was pressed
                $application->notify(new ApplicationApprovalEmail());
            } else if ($request->input('status') == "Rejected") {
                //If reject button was pressed
                $application->notify(new ApplicationRejectedEmail());
            }
            return redirect()->route('dean.application.index')->with('success', 'Application has been updated successfully');
            #return dd($count);

        }elseif ($count == 17){
              
            $programs = Programs::all();
            $subjects = Subjects::all();

            $application = Application::find($id);
            $application->firstName = $request->input('firstName');
            $application->middleName = $request->input('middleName');
            $application->lastName = $request->input('lastName');
            $application->birthDate = $request->input('birthDate');
            $application->gender = $request->input('gender');
            $application->status= $request->input('status');
            $application->email = $request->input('email');
            $application->phone = $request->input('phone');
            $application->company = $request->input('company');
            $application->address = $request->input('address');
            $application->classification = $request->input('classification');
            $application->subject1 = $request->input('subject1');
            $application->subject2 = $request->input('subject2');
            $application->subject3 = $request->input('subject3');

            $application->programs_id = $request->input('programs_id');
            foreach ($programs as $prog) {
                if ($prog->id == $application->programs_id)
                    $application->adviser = $prog->adviser;
            }
            
            if ($request->hasfile('applicantImage')) {
                $destination = 'requirements' . $application->applicantImage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('applicantImage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('requirements', $filename);
                $application->applicantImage = $filename;
            }
        #####Technically Dependent Subject Selection######

        foreach($subjects as $sub){
            if($application->subject1 == $sub->id){
                if ($application->programs_id != $sub->programs_id) {
                    if($sub->cat_id != 4){
                    return redirect()->back()
                        ->withInput($request->input())
                        ->with('success', "Selected $sub->title is not  under the chosen program");
                        }
                    }
    
                }
    
            if(!empty($application->subject2)){
                if($application->subject2 == $application->subject1 || $application->subject2 == $application->subject3){
                    return redirect()->back()
                    ->withInput($request->input())
                    ->with('success', "Choose a different subject");
                }
                if($application->subject2 == $sub->id){
                    if ($application->programs_id != $sub->programs_id) {
                        if($sub->cat_id != 4){
                        return redirect()->back()
                        ->withInput($request->input())
                        ->with('success', "Selected $sub->title is not  under the chosen program");
                            }
                        }
                    }
                
            }
    
            if(!empty($application->subject3)){
                if($application->subject3 == $application->subject2 || $application->subject3 == $application->subject1){
                    return redirect()->back()
                    ->withInput($request->input())
                    ->with('success', "Choose a different subject");
                }
                if($application->subject3 == $sub->id){
                    if ($application->programs_id != $sub->programs_id) {
                        if($sub->cat_id != 4){
                        return redirect()->back()
                        ->withInput($request->input())
                        ->with('success', "Selected $sub->title is not  under the chosen program");
                            }
                        }
                    }
            }
    
            }
    
            ####Selected Units#####
    
            $unit = 0;
            foreach($subjects as $sub){
                if($application->subject1 == $sub->id){
                    $unit+= $sub->units;
                }
                if($application->subject2 == $sub->id){
                    $unit+=$sub->units;
                }
                if($application->subject3 == $sub->id){
                    $unit+=$sub->units;
                }
                if($unit > 12){
                    return redirect()->back()
                    ->withInput($request->input())
                    ->with('success', "Units Exceeded");
                }
            
            }

        $application->save();

        return redirect()->route('dean.application.index')->with('success', 'Application has been updated successfully');
        } 
        else {
            $application = Application::all();
            $application->status = $request->input('status');
            if($request->input('status') != "Pending"){
            foreach ($application as $app) {
                if ($app->status == "Recommended") {
                    $app->status = $request->input('status');
                    $app->update();
                }
            };
            
        }
        return redirect()->route('dean.application.index')->with('success', 'All application has been updated successfully');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $programs = Programs::all();
        $subjects = Subjects::all();
        $application = Application::find($id);
        foreach($subjects as $sub){
            if($application->subject1 == $sub->id){
                if ($application->programs_id != $sub->programs_id) {
                    if($sub->cat_id != 4){
                    return redirect()->back()
                        ->withInput($request->input())
                        ->with('success', "Selected $sub->title is not  under the chosen program");
                        }
                    }
    
                }
    
            if(!empty($application->subject2)){
                if($application->subject2 == $application->subject1 || $application->subject2 == $application->subject3){
                    return redirect()->back()
                    ->withInput($request->input())
                    ->with('success', "Choose a different subject");
                }
                if($application->subject2 == $sub->id){
                    if ($application->programs_id != $sub->programs_id) {
                        if($sub->cat_id != 4){
                        return redirect()->back()
                        ->withInput($request->input())
                        ->with('success', "Selected $sub->title is not  under the chosen program");
                            }
                        }
                    }
                
            }
    
            if(!empty($application->subject3)){
                if($application->subject3 == $application->subject2 || $application->subject3 == $application->subject1){
                    return redirect()->back()
                    ->withInput($request->input())
                    ->with('success', "Choose a different subject");
                }
                if($application->subject3 == $sub->id){
                    if ($application->programs_id != $sub->programs_id) {
                        if($sub->cat_id != 4){
                        return redirect()->back()
                        ->withInput($request->input())
                        ->with('success', "Selected $sub->title is not  under the chosen program");
                            }
                        }
                    }
            }
            
    
            }
    
            ####Selected Units#####
    
            $unit = 0;
            foreach($subjects as $sub){
                if($application->subject1 == $sub->id){
                    $unit+= $sub->units;
                }
                if($application->subject2 == $sub->id){
                    $unit+=$sub->units;
                }
                if($application->subject3 == $sub->id){
                    $unit+=$sub->units;
                }
                if($unit > 12){
                    return redirect()->back()
                    ->withInput($request->input())
                    ->with('success', "Units Exceeded");
                }
            
            }

        $application->update();

        return redirect()->route('dean.application.index')->with('success', 'Application has been updated successfully');
    }

}
