<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applications') }} | View
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->

    
    <div class="buttons block mb-8">
        <a onclick="window.print();" class="btn pointer printBtn ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg class="h-5 w-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Print</span>
        </a>
                        
			
			<a href="{{ route('application.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>

    <!--Status Button-->

    <div class=" border-t-2 w-full border-gray-200 flex gap-4">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-9/12 w-9/12">
            <div class="Formlogo m-5 inline-flex grid grid-cols-3 place-items-center content-center" >
              

            <div class=" place-items-center center content-center pl-20">
            <img src="/img/OU.png" class="w-3/6 place-items-center center content-center " alt="..." >
            </div>
            <div class = "text-lg text-center"> 
                <tr>Bicol University</tr><br>
                <tr>Open University</tr><br>
                <tr>Legazpi City</tr> 
            </div>

            <div class=" place-items-center center content-center pl-36"> 
                <img src="/img/BU.png" class="w-7/12  place-items-center content-center" alt="..." />
            </div>
           
            </div>

            <div class="form">
                <div class="borderhide max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">

                    

                    <div class="mt-5 md:mt-0 md:col-span-2">
                       
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6 border-0">

                                    <label class="font-bold mb-1 text-gray-700 block">Applicant Information</label>
                                    <div class="grid grid-cols-6  gap-4 border-t-2 border-gray-200">
                                        <label class="font-medium mb-1 text-gray-600 pt-2 block col-span-6">Basic Information</label>
                                        <div class="mt-4 col-span-2">
                                            <x-jet-label for="firstName" value="{{ __('First Name') }}" />
                                            <x-jet-input readonly class="form-control block mt-1 w-full" type="text" name="firstName" value="{{$application->firstName}}" required autofocus />
                                        </div>
                                        <!--Middle Name-->
                                        <div class="mt-4 col-span-2">
                                            <x-jet-label for="middleName" value="{{ __('Middle Name') }}" />
                                            <x-jet-input readonly class="block mt-1 w-full" type="text" name="middleName" value="{{$application->middleName}}" required autofocus />
                                        </div>
                                        <!--Last Name-->
                                        <div class="mt-4 col-span-2 ">
                                            <x-jet-label for="name" value="{{ __('Last Name') }}" />
                                            <x-jet-input readonly class="form-control block mt-1 w-full" type="text" name="lastName" value="{{$application->lastName}}" required autofocus />
                                        </div>
                                    </div>
                                    <div class="mt-4 col-span-6 border-t-2 border-gray-200"></div>

                                    <div class="grid grid-cols-6  gap-4">

                                        <!--Birthdate-->
                                        <div class="mt-4 col-span-2">
                                            <x-jet-label for="birthDate" value="{{ __('Birth date') }}" />
                                            <x-jet-input readonly id="birthDate" class="form-control block mt-1 w-full" type="date" name="birthDate" value="{{$application->birthDate}}" required autofocus />
                                        </div>
                                        <!--Gender-->
                                        <div class="mt-4 col-span-2">
                                            <x-jet-label for="gender" value="Gender" />
                                            <x-jet-input readonly class="block mt-1 w-full " type="text" name="" value="{{$application->gender}}" required autofocus />
                        
                                        </div>
                                        <div class="mt-4 col-span-6 border-t-2 border-gray-200"></div>
                                        <label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Contacts</label>

                                        <!--Email-->
                                        <div class="mt-4 col-span-4">
                                            <x-jet-label for="email" value="{{ __('Email Address') }}" />
                                            <x-jet-input readonly id="email" class="block mt-1 w-full" type="email" name="email" value="{{$application->email}}" required autofocus />
                                        </div>
                                        <!--Phone-->
                                        <div class="mt-4 col-span-3">
                                            <x-jet-label for="phone" value="{{ __('Contact Number') }}" />
                                            <x-jet-input readonly id="phone" class="block mt-1 w-full" type="number" name="phone" value="{{$application->phone}}" required autofocus />
                                        </div>

                                        <div class="mt-4 col-span-6 border-t-2 border-gray-200"></div>
                                        <label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Residence Address</label>

                                        <!--Address-->
                                        <div class="mt-4 col-span-6">
                                            <x-jet-label for="address" value="{{ __('Address') }}" />
                                            <x-jet-input readonly id="address" class="block mt-1 w-full" type="text" name="address" value="{{$application->address}}" required autofocus />
                                        </div>
                                        <!--Company-->
                                        <div class="mt-4 col-span-3">
                                            <x-jet-label for="company" value="{{ __('Company') }}" />
                                            <x-jet-input readonly id="company" class="block mt-1 w-full" type="text" name="company" value="{{$application->company}}" required autofocus />
                                        </div>

                                    </div>


                                    <label class="req py-4 pt-10 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Upload Requirements</label>




                                    <div class="req1 col-sm-10">
                                    @foreach($files as $row)
                                        @if( $row->application_id == $application->id)
                                        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200 w-auto">
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                            
                                                <div class="w-0 flex-1 flex items-center">
                                                    <!-- Heroicon name: solid/paper-clip -->
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                                    </svg>
                                                   
                                                    <x-jet-label value="{{ $row->name}}" />
                                                    
                                                    
                                                </div>
                                                
                                                <div class="ml-4 flex-shrink-0">
                                                    <a href="{{asset('storage/'. $row->path  )}}" class="font-medium text-indigo-600 hover:text-indigo-500"> Download </a>
                                                </div>
                                            </li>
                                        </ul>
                                        @endif
                                    @endforeach
                                        
                                    </div>
                                    <div class="grid grid-cols-6  gap-4 pt-10">

                                        <!--Programs Selection-->
                                        <div class="mt-4 col-span-6">
                                            <label class="pb-4 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Program Selection</label>

                                          
                                                @foreach($programs as $row)
                                                @if( $row->id == $application->programs_id)
                                                
                                                <x-jet-input readonly class="block mt-1 w-full " type="text" name="" value="{{ $row->description}}" required autofocus />
                        
                                                @endif
                                                @endforeach

                                              

                                            </select>
                                        </div>
                                        <!-- Subject Selection -->
                                        <div class="mt-4 col-span-6">
                                            <label class="pb-4 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Subject Selection</label>
                                                @foreach($subjects as $row)
                                                @foreach($programs as $prog)
                                                @if($prog->id == $application->programs_id)
                                                @if($row->id == $application->subject1)
                                              
                                                <x-jet-input readonly  class="block mt-1 w-full  " type="text" name="" value="{{ $prog->code}}: &emsp; {{ $row->title}} &emsp; Units: {{ $row->units}}" required autofocus />
                                                @endif
                                                @endif
                                                @endforeach
                                                @endforeach
                                    

                                          
                                                @foreach($subjects as $row)
                                                @foreach($programs as $prog)
                                                @if($prog->id == $application->programs_id)
                                                @if($row->id == $application->subject2)
                                               
                                                <x-jet-input readonly  class="block mt-1 w-full " type="text" name="" value="{{ $prog->code}}: &emsp; {{ $row->title}} &emsp; Units: {{ $row->units}}" required autofocus />
                                                @endif
                                                @endif
                                                @endforeach
                                                @endforeach
                                         
                                            
                                            
                                                @foreach($subjects as $row)
                                                @foreach($programs as $prog)
                                                @if($prog->id == $application->programs_id)
                                                @if($row->id == $application->subject3)
                                               
                                                <x-jet-input readonly  class="block mt-1 w-full  " type="text" name="" value="{{ $prog->code}}: &emsp; {{ $row->title}} &emsp; Units: {{ $row->units}}" required autofocus />
                        
                                                @endif
                                                @endif
                                                @endforeach
                                                @endforeach
                                              
                                         
                                        </div>


                                    </div>
                              
                                </div>
                           
                            </div>
                      
                    </div>
                </div>
            </div>



        </div>
        <div class="monitor bg-white shadow overflow-hidden sm:rounded-lg max-w-6xl w-fit h-auto">

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Application Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Application overview.</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Application Status</dt>

                        @if($application->status == "Pending")
                        <td>
                            <dd style="color: rgb(253 186 116);" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 font-bold">{{$application->status}}</dd>

                        </td>
                        @elseif($application->status == "Recommended")
                        <td>
                            <dd class="mt-1 text-sm text-blue-400 sm:mt-0 sm:col-span-2 font-bold">{{$application->status}}</dd>
                        </td>

                        @elseif($application->status == "Approved")
                        <td>
                            <dd class="mt-1 text-sm text-yellow-300 sm:mt-0 sm:col-span-2 font-bold">{{$application->status}}</dd>
                        </td>
                      
                        @elseif($application->status == "Rejected")
                        <td>
                            <dd class="mt-1 text-sm text-red-400 sm:mt-0 sm:col-span-2 font-bold">{{$application->status}}</dd>
                        </td>
                        
                        @elseif($application->status == "Processed")
                        <td>
                            <dd  class="mt-1 text-sm text-green-400 sm:mt-0 sm:col-span-2 font-bold">{{$application->status}}</dd>

                        </td>
                        @elseif($application->status == "Enrolled")
                        <td>
                            <dd  class="mt-1 text-sm text-green-400 sm:mt-0 sm:col-span-2 font-bold">{{$application->status}}</dd>

                        </td>
                        @endif
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Applicant Classification</dt>
                        <td>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$application->classification}}</dd>
                        </td>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Fees Status: </dt>
                        
                   
                @foreach ($fees as $row)
                @if ($row->appRef_id == $application->id)
                    
             
                    @if($row->status == 0)
                    <td>
                                <dd class="mt-1 text-sm font-semibold text-red-500 sm:mt-0 sm:col-span-2">UNPAID</dd>
                    </td>
                    @elseif($row->status == 2)
                    <td>
                                <dd class="mt-1 text-sm font-semibold text-amber-500 sm:mt-0 sm:col-span-2">INSTALLMENT</dd>
                    </td>
                    
                    @else
                    <td>
                        <dd class="mt-1 text-sm font-semibold text-green-500 sm:mt-0 sm:col-span-2">PAID</dd>
                    </td>
                    @endif 
                @endif 
                @endforeach
                </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Program</dt>
                        @foreach($programs as $row)
                        @if( $row->id == $application->programs_id)
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$row->description}}</dd>
                        @endif
                        @endforeach
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Subjects</dt>
                        @foreach($subjects as $row)
                        @if( $row->id == $application->subject1)
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Units: {{$row->units}} &emsp; {{$row->title}}</dd>
                        @endif
                        @endforeach
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500"></dt>
                        @foreach($subjects as $row)
                        @if( $row->id == $application->subject2)
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Units: {{$row->units}} &emsp; {{$row->title}}</dd>

                        @endif
                        @endforeach
                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500"></dt>
                        @foreach($subjects as $row)
                        @if( $row->id == $application->subject3)
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Units: {{$row->units}} &emsp; {{$row->title}}</dd>

                        @endif
                        @endforeach
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500"></dt>


                    </div>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Remarks:</dt>
                    
                    <dd  class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-3 border-b-2"></dd>
                    @foreach($remarks as $row)
                        @if( $row->application_id == $application->id)
                        
                        

                            @foreach($user as $x)
                            @if( $x->id == $row->user)
                                @foreach($role as $y)
                                    @if( $y->role_id == $x->role_id)
                                    <dt class="text-sm font-medium text-gray-500">{{$y->role_name}}: </dt>         
                                    @endif
                                @endforeach
                                <dd class="text-sm font-medium text-gray-700 sm:col-span-2">{{ $x->first_name }} {{ $x->middle_name }} {{ $x->last_name }}</dd>
                            @endif
                            @endforeach
                            <dt class="text-sm font-medium text-gray-500"> </dt>
                        <dd  class="mt-1 text-sm text-gray-500 sm:mt-0 sm:col-span-2 text-justify ">
                            <textarea name="" id="" cols="30" rows="10" readonly style="border:none">{{$row->input}}</textarea>
                        </dd>
                        <div class="border-b-2 sm:col-span-3 "></div>
                    
                        @endif
                    @endforeach
              
                    </div>
                </dl>

            </div>
        </div>
    </div>
    <br><br><br>
    <br><br><br>
    <div></div>
    <style>
        [x-cloak] {
            display: none
        }
        .Formlogo{
           display: none;
            
            }
        
        .pointer {cursor: pointer;}
        @media print {
            @page {
                margin: 0;
            }
            .Formlogo{
                display: grid;
            }
            body {
                margin-left: -210px;
                margin-top: -30px;
                height: 100%;
                width: 110%;
                border-style: none;
            }
            html{
                border-style: none;
            }
            nav {
                display: none;
            }

            header {
                display: none;
            }

            .content {
                margin: 0;
                width: 110%;
                border-style: none;
            }

            .btn {
                display: none;
            }

            .sidebar {
                display: none;
            }

            .req {
                display: none;
                border-style: none;
            }

            .req1 {
                display: none;
                border-style: none;
            }

            .monitor {
                display: none;
                box-shadow:none;
                border-style: none;
            }

            .form {
                width: screen;
                box-shadow:none;
                border-style: none;
            }
            .main {
                width: 300%;
                box-shadow:none;
                border-style: none;
            }
            .hide{
                display: none;
            }
            .borderhide{
                box-shadow:none;
                border-style: none;
                border-width: 0px;
            }
            .buttons{
                display: none; 
            }
        }
    </style>
</x-app-layout>