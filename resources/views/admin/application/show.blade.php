<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applications') }} | View
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->

    <div class="block mb-8">
			<a href="{{ route('admin.application.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>


    <div class=" border-t-2 w-full border-gray-200 flex gap-4">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-9/12 w-9/12">

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Applicant Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Full name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $application->firstName."  ".$application->middleName."  ".$application->lastName}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Gender</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $application->gender }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Birthdate</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $application->birthDate }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Email address</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $application->email }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Phone Number</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $application->phone}}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Company</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $application->company }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Address</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $application->address }}</dd>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Attachments</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @foreach($files as $row)
                        @if( $row->application_id == $application->id)
                            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">

                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <!-- Heroicon name: solid/paper-clip -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                        </svg>
                                        <x-jet-label value="{{$row->name}}"/>
                                        

                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{asset('storage/'. $row->path  )}}" class="font-medium text-indigo-600 hover:text-indigo-500"> Download </a>
                                    </div>
                                    
                                </li>
                            </ul>
                            @endif
                            @endforeach
                        </dd>
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
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Units: {{$row->units}} &emsp;  {{$row->title}}</dd>
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

                </dl>
            </div>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-6xl w-fit">

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Application Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Application overview.</p>
            </div>
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
                        @endif
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Applicant Classification</dt>
                        <td>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$application->classification}}</dd>
                        </td>
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
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Units: {{$row->units}} &emsp;  {{$row->title}}</dd>
                        @endif
                        @endforeach
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500"></dt>
                        @foreach($subjects as $row)
                        @if( $row->id == $application->subject2)
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Units: {{$row->units}} &emsp;  {{$row->title}}</dd>
                        
                        @endif
                        @endforeach
                    </div>
                    
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500"></dt>
                        @foreach($subjects as $row)
                        @if( $row->id == $application->subject3)
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">Units: {{$row->units}} &emsp;  {{$row->title}}</dd>
                       
                        @endif
                        @endforeach
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500"></dt>

                    
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Remarks:</dt>
                        <dd  class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <textarea readonly name="remarks" id="remarks" cols="30" rows="10" class="w-full break-all" style="border:none">{{$application->remarks}}</textarea>
                        </dd>
                    </div>
                </dl>

            </div>
        </div>
        </div>
<br><br><br>
    <style>
        [x-cloak] { display: none }
    </style>

</x-app-layout>