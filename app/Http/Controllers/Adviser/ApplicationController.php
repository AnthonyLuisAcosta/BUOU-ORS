<?php

namespace App\Http\Controllers\Adviser;

use App\Models\File;
use App\Models\Logs;
use App\Models\Remarks;
use App\Models\Programs;
use App\Models\Subjects;
use App\Models\Application;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
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

        return view('adviser.application.index')->with('programs', $programs)->with('application', $application);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Programs::all();
        return view('adviser.application.create')->with('programs', $programs);
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

       

        return redirect()->route('adviser.application.index')->with('success', 'Application Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application, File $files)
    {
        $programs = Programs::all();
        $subjects = Subjects::all();
        $files = File::all();
        return view('adviser.application.show', compact('application'))->with('programs', $programs)->with('subjects', $subjects)->with('files', $files);
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
        
        return view('adviser.application.edit', compact('application'))->with('programs', $programs)->with('subjects', $subjects)->with('application', $application)->with('files', $files);
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
            
            if ($request->input('status') == "Recommended") {
                //If recommend button was pressed
                
                $application->notify(new ApplicationRecommendedEmail());
            } else if ($request->input('status') == "Rejected") {
                //If reject button was pressed
               
                $application->notify(new ApplicationRejectedEmail());
            }
            #return dd($count);

        } else {
            $programs = Programs::all();
            $subjects = Subjects::all();

            $application = Application::find($id);
             ########Create Log###########
             $logs = new Logs;
             $logs->user = Auth::user()->id;    
             $logs->application_id = $application->id;
             $logs->activity = 'Application Updated';
             $logs->save();
           
            $application->classification = $request->input('classification');;

            $application->subject1 = $request->input('subject1');
            $application->subject2 = $request->input('subject2');
            $application->subject3 = $request->input('subject3');

            $application->programs_id = $request->input('programs_id');
            foreach ($programs as $prog) {
                if ($prog->id == $application->programs_id)
                    $application->adviser = $prog->adviser;
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
        }
        
        #$applicantImage = $request->hidden_applicantImage;

        #if($request->applicantImage != '')
        #{
        #    $applicantImage = time() . '.' . request()->applicantImage->getClientOriginalExtension();

        #   request()->applicantImage->move(public_path('requirements'), $applicantImage);
        #}

        #$application = Application::find($request->hidden_id);

        #$application->firstName = $request->firstName;
        #$application->middleName = $request->middleName;
        #$application->LastName  = $request->lastName;
        #$application->birthDate  = $request->birthDate;
        #$application->gender  = $request->gender;
        #$application->status = $request->status;
        #$application->email  = $request->email;
        #$application->phone  = $request->phone;
        #$application->company  = $request->company;
        #$application->address  = $request->address;

        #$application->applicantImage = $applicantImage;

        $application->update();

        return redirect()->route('adviser.application.index')->with('success', 'Application has been updated successfully');
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

        return redirect()->route('adviser.application.index')->with('success', 'Application deleted successfully!');
    }
}
