<?php

namespace App\Http\Controllers\Admin;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $data = Application::all();

        return view('admin.application.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.application.create');
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
        $application->applicantImage = $file_name;

        $application->save();

        return redirect()->route('admin.application.index')->with('success', 'Application Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        return view('admin.application.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        return view('admin.application.edit', compact('application'));
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

        if($count == 4){

            $application = Application::find($id);
            $application->status = $request->input('status');

            #return dd($count);

        }else{

            $application = Application::find($id);
            $application->firstName = $request->input('firstName');
            $application->lastName = $request->input('lastName');
            $application->birthDate = $request->input('birthDate');
            $application->gender = $request->input('gender');
            $application->status = $request->input('status');
            $application->email = $request->input('email');
            $application->phone = $request->input('phone');
            $application->company = $request->input('company');
            $application->address = $request->input('address');
        
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

        return redirect()->route('admin.application.index')->with('success', 'Application has been updated successfully');
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

        return redirect()->route('admin.application.index')->with('success', 'Application deleted successfully!');
    }
}
