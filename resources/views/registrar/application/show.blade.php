<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applications') }} | View
        </h2>
    </x-slot>

    <!-- This example requires Tailwind CSS v2.0+ -->

    <div class="block mb-8">
			<a href="{{ route('registrar.application.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>
    @php
    $count = 0
    @endphp
    @foreach ($app as $app )
        @if ($app->status == "Approved")
        @php $count++ @endphp
        @if ($count <= 1)
    <!--Status Button-->
    <!--Recommend Modal-->
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="fixed inset-0 bg-gray-900 bg-opacity-60 transition-opacity"></div>
                <div class="fixed z-10 inset-0 overflow-y-auto">
                    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                        <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <!-- Heroicon name: outline/exclamation -->
                                        <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Application Admission</h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Are you sure you want to admit this application? This action cannot be undone.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <form method="post" action="{{ route('registrar.application.update', $application->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Admitted" class="" />
                                    <!--Button-->
                                    <button name="submit" value="Update" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-green-400 text-base font-medium text-g-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                        Proceed
                                    </button>

                                </form>
                                <button type="button" class="modal-close mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Reject Modal-->
    <div class="modal-reject opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="fixed inset-0 bg-gray-900 bg-opacity-60 transition-opacity"></div>
                <div class="fixed z-10 inset-0 overflow-y-auto">
                    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                        <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <!-- Heroicon name: outline/exclamation -->
                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Reject Application</h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">Are you sure you want to reject this application? This action cannot be undone.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <form method="post" action="{{ route('registrar.application.update', $application->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Rejected" />
                                    <!--Button-->
                                    <button name="submit" value="Update" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-red-400 text-base font-medium text-g-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                        Reject
                                    </button>

                                </form>
                                <button type="button" class="modal-close1 mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="inline-flex justify-end">
        <!--Button-->
        <div class="block mb-8">
            <button class="">
                <a class="modal-open ml-1 inline-flex items-center px-4 py-2 bg-green-400 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">Admit</a>
            </button>
        </div>
        <!--Reject Status Button-->
        <form method="post" action="{{ route('adviser.application.update', $application->id) }}">
            <!--Button-->
            <div class="block mb-8">
                <button class="">
                    <a class="modal-open-reject ml-1 inline-flex items-center px-4 py-2 bg-rose-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">Reject</a>
                </button>
            </div>
    </div>
@endif
@endif

@endforeach



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
                            <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">

                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <!-- Heroicon name: solid/paper-clip -->
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                        </svg>
                                        <x-jet-label for="applicantImage" value="{{ asset($application->applicantImage) }}" />
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ asset('requirements/' .  $application->applicantImage) }}" class="font-medium text-indigo-600 hover:text-indigo-500"> Download </a>
                                    </div>
                                </li>
                            </ul>
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
                        
                        @elseif($application->status == "Admitted")
                        <td>
                            <dd  class="mt-1 text-sm text-green-400 sm:mt-0 sm:col-span-2 font-bold">{{$application->status}}</dd>

                        </td>
                        @endif
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
                </dl>

            </div>
        </div>
        </div>
<br><br><br>
    <style>
        [x-cloak] {
            display: none
        }
    </style>
 <style>
        .modal,
        .modal-reject {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>
    <script>
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener('click', function(event) {
                event.preventDefault()
                toggleModal()
            })
        }

        var openmodal = document.querySelectorAll('.modal-open-reject')
        for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener('click', function(event) {
                event.preventDefault()
                toggleModal1()
            })
        }

        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)

        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleModal)
        }

        var closemodal1 = document.querySelectorAll('.modal-close1')
        for (var i = 0; i < closemodal1.length; i++) {
            closemodal1[i].addEventListener('click', toggleModal1)
        }

        function toggleModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }

        function toggleModal1() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal-reject')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }
    </script>
</x-app-layout>