<?php

namespace App\Http\Controllers\Applicant;
use App\Models\Fees;
use App\Models\File;
use App\Models\Logs;
use App\Models\Role;
use App\Models\User;
use App\Models\Remarks;
use App\Models\Programs;
use App\Models\Subjects;
##use Illuminate\Support\Facades\File;##
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewApplicationEmail;

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
        $subjects = Subjects::all();
        $user = User::all();

        return view('applicant.application.index')->with('programs', $programs)->with('application', $application)->with('subjects', $subjects)->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Programs::all();
        $subjects = Subjects::all();
        $user = User::all();
        $application = Application::all();
        return view('applicant.application.create')->with('programs', $programs)->with('subjects', $subjects)->with('user', $user)->with('application', $application);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user = User::all();
        $programs = Programs::all();
        $application = Application::all();
        $subjects = Subjects::all();
        $request->validate([
            'lastName'          ,
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
            #'subjects_id'       => 'required',
            'applicant_id'      => 'required',
            'adviser',
            'classification',

            'subject1' => 'required',
            'subject2',
            'subject3',

            'adviser',

            
            'files' => 'required',
            'files.*' => 'mimes:csv,txt,xlx,xls,pdf,png,jpg,jpeg,svg,docx,doc'
        ]);

        #$file_name = time() . '.' . request()->applicantImage->getClientOriginalExtension();

        #request()->applicantImage->move(public_path('requirements'), $file_name);
        
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
        #$application->subjects_id = $request->subjects_id;
        $application->programs_id = $request->programs_id;
        $application->applicant_id = $request->applicant_id;
        $application->classification;

        $application->subject1 = $request->subject1;
        $application->subject2 = $request->subject2;
        $application->subject3 = $request->subject3;
        #$application->programs_id = $programs_id;

        ######### ID Generator ########
        #$number = 0
        do {
            $number = random_int(1000000, 9999999);
            #$number = $number+1;
        } while (Application::where("id", "=", $number)->first());
      
        $application->id = $number;
        ###########
     
            if($request->hasfile('files'))
             {
                foreach($request->file('files') as $key => $file)
                {   
                    
                    $app_id = $number;
                    $name = $file->getClientOriginalName();
                    $path = $file->store('/');

                    $insert[$key]['name'] = $name;
                    $insert[$key]['application_id'] = $app_id;
                    $insert[$key]['path'] = $path;
     
                }
             }
     
            File::insert($insert);

        $application->adviser;

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
          ########Create Log#########
          $logs = new Logs;
          $logs->user = Auth::user()->id;    
          $logs->application_id = $application->id;
          $logs->activity = 'Application Created';
          $logs->save();
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

        //NEW APPLICATION MAIL
        $application->notify(new NewApplicationEmail());
        $application->save();
        //ROUTE MODIFIED BASED ON DEFINED ROUTES ON ROUTE:LIST
        return redirect()->route('application.index')->with('success', 'Application Added successfully.');
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
        $remarks = Remarks::all();
        $user = User::all();
        $role = Role::all();
        $fees = Fees::all();
        return view('applicant.application.show', compact('application'))->with('programs', $programs)->with('subjects', $subjects)->with('files', $files)->with('remarks', $remarks)->with('user', $user)->with('role', $role)->with('fees', $fees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application, Programs $programs, User $user, File $files)
    {
        $programs = Programs::all();
        $user = User::all();
        $subjects = Subjects::all();
        $files = File::all();
        ########Create Log#########
        $logs = new Logs;
        $logs->user = Auth::user()->id;    
        $logs->application_id = $application->id;
        $logs->activity = 'Application Updated';
        $logs->save();
        return view('applicant.application.edit', compact('application'))->with('programs', $programs)->with('application', $application)->with('user', $user)->with('subjects', $subjects)->with('files', $files);
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
            $application->applicant_id = $request->input('applicant_id');
            #return dd($count);

        } else {
            $programs = Programs::all();
            $subjects = Subjects::all();
            $files = File::all();
            $application = Application::find($id);
            
            $application->firstName = $request->input('firstName');
            $application->middleName = $request->input('middleName');
            $application->lastName = $request->input('lastName');
            $application->birthDate = $request->input('birthDate');
            $application->gender = $request->input('gender');
            $application->status;
            $application->email = $request->input('email');
            $application->phone = $request->input('phone');
            $application->company = $request->input('company');
            $application->address = $request->input('address');

            $application->subject1 = $request->input('subject1');
            $application->subject2 = $request->input('subject2');
            $application->subject3 = $request->input('subject3');
            $application->programs_id = $request->input('programs_id');
            $application->applicant_id;
            $application->classification;

            foreach ($programs as $prog) {
                if ($prog->id == $application->programs_id)
                    $application->adviser = $prog->adviser;
            }
            #$request->validate([
            #'lastName',          
            #'middleName',          
            #'birthDate',          
            #'gender' ,
            #'status' => 'required',
            #'email' ,         
            #'phone'   ,
            #'company' ,
            #'address',
            #'applicantImage'     =>'image|mimes:jpg,png,jpeg,gif,svg'
            #]);



       

            if ($request->hasfile('files')) {
                
                foreach($files as $files ){
                    if($files->application_id == $application->id){
                        File::where('application_id', $files->application_id)->delete();
                }
                }

                    foreach($request->file('files') as $key => $file)
                    {
                        $app_id = $application->id;
                        $name = $file->getClientOriginalName();
                        $path = $file->store('/');
    
                        $insert[$key]['name'] = $name;
                        $insert[$key]['application_id'] = $app_id;
                        $insert[$key]['path'] = $path;
         
                    }
                    File::insert($insert);
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
        //ROUTE MODIFIED BASED ON DEFINED ROUTES ON ROUTE:LIST
        return redirect()->route('application.index')->with('success', 'Application has been updated successfully');
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
        //ROUTE MODIFIED BASED ON DEFINED ROUTES ON ROUTE:LIST
        return redirect()->route('application.index')->with('success', 'Application deleted successfully!');
    }
}
