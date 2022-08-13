<?php

namespace App\Http\Controllers\Registrar;

use App\Models\Application;
use App\Models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

        return view('registrar.application.index')->with('programs', $programs)->with('application', $application);
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
        return view('registrar.application.create')->with('programs', $programs)->with('application', $application);
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
        $id = Auth::user()->id;
        $app = Application::all();
        return view('registrar.application.show', compact('application'))->with('programs', $programs)->with('app', $app);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @param  \App\Models\Programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application, Programs $programs )
    {
        $programs = Programs::all();
        return view('registrar.application.edit', compact('application'))->with('programs',$programs)->with('application', $application);
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
            $programs = Programs::all();

            $application = Application::find($id);
            $application->firstName = $request->input('firstName');
            $application->middleName = $request->input('middleName');
            $application->lastName = $request->input('lastName');
            $application->birthDate = $request->input('birthDate');
            $application->gender = $request->input('gender');
            $application->status = $request->input('status');
            $application->email = $request->input('email');
            $application->phone = $request->input('phone');
            $application->company = $request->input('company');
            $application->address = $request->input('address');

            $application->programs_id = $request->input('programs_id');
        
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
        #'registrarImage'     =>'image|mimes:jpg,png,jpeg,gif,svg'
        #]);

        if ($request->hasfile('registrarImage')) {
            $destination = 'requirements' . $application->registrarImage;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('registrarImage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('requirements', $filename);
            $application->registrarImage = $filename;
        }
    }
        #$registrarImage = $request->hidden_registrarImage;

        #if($request->registrarImage != '')
        #{
        #    $registrarImage = time() . '.' . request()->registrarImage->getClientOriginalExtension();

        #   request()->registrarImage->move(public_path('requirements'), $registrarImage);
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

        #$application->registrarImage = $registrarImage;

        $application->update();

        return redirect()->route('registrar.application.index')->with('success', 'Application has been updated successfully');
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

        return redirect()->route('registrar.application.index')->with('success', 'Application deleted successfully!');
    }
}
