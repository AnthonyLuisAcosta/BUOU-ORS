<x-app-layout>
  <x-slot name="header" class="toHide">
    <h2 class="toHide font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Fees') }} | <span class=" text-md text-gray-500">{{__('View')}}</span>
    </h2>
  </x-slot>
  <div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="toHide block mb-8">
        <a href="{{ route('registrar.fees.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>
      <div class="flex">
        <div class="w-full -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle sm:px-6 lg:px-8">
            <!--content-->

            <div id="printForm" class=" overflow-hidden bg-white p-12">
              <div class="Formlogo m-5 inline-flex grid grid-cols-3 place-items-center content-center">


                <div class=" place-items-center center content-center pl-20">
                  <img src="/img/OU.png" class="w-4/12 place-items-center center content-center " alt="...">
                </div>
                <div class="text-sm text-center">
                  <tr>Bicol University</tr><br>
                  <tr>Open University</tr><br>
                  <tr>Legazpi City</tr>
                </div>

                <div class=" place-items-center center content-center pl-36">
                  <img src="/img/BU.png" class="w-5/12  place-items-center content-center" alt="..." />
                </div>

              </div>
              <div class="flex justify-center items center">
                <h1 class="font-semibold text-lg py-5 ">CERTIFICATE OF REGISTRATION</h1>
              </div>
              <div class="grid grid-cols-3 grid-rows-2 border border-black p-2 text-sm">
                <!--ROW 1-->
                <div class="mt-1">
                  <p>Name: {{$application->firstName.' '.$application->middleName[0].'.'.' '.$application->lastName}}</p>
                </div>
                <div class="mt-1">
                  @foreach($programs as $program)
                  @if($application->programs_id == $program->id)
                  <p>Program: {{$program->description}}</p>
                  @endif
                  @endforeach
                </div>
                <div class="mt-1">
                  <p>Academic Year: {{$term->year.' '.$term->label}}</p>
                </div>
                <!--ROW 2-->
                <div class="mt-1">
                  <p>Gender: {{$application->gender}}</p>
                </div>
                <div class="mt-1">
                  <p>Age: {{$application->getAge()}}</p>
                </div>
                <div class="mt-1">
                  <p>Status: {{$application->status}}</p>
                </div>
              </div>
              <div class="border border-2 border-black p-2 mt-2">
                <div class="flex justify-center items-center">
                  <h1 class="font-semibold">INFORMATION</h1>
                </div>
                <div class="grid grid-cols-4 grid-rows-4 text-sm">
                  <!--TITLE ROW-->
                  <div class="mt-1">
                    <p class="font-semibold">Code</p>
                  </div>
                  <div class="mt-1">
                    <p class="font-semibold">Subject</p>
                  </div>
                  <div class="mt-1">
                    <p class="font-semibold">Units</p>
                  </div>
                  <div class="mt-1">
                    <p class="font-semibold">Faculty</p>
                  </div>
                  <!--CONTENT ROW-->
                  <!--SUBJECT 1-->
                  @foreach($subjects as $subject)
                  @if($subject->id == $application->subject1)
                  <div class="mt-1">
                    <p>{{$subject->subj_code}}</p>
                  </div>
                  <div class="mt-1">
                    <p>{{$subject->title}}</p>
                  </div>
                  <div id="firstSub" class="mt-1">
                    <p>{{$subject->units}}</p>
                  </div>
                  <div class="mt-1">
                    <p>{{$subject->prof}}</p>
                  </div>
                  @endif
                  @endforeach
                  <!--SUBJECT 2-->
                  @foreach($subjects as $subject)
                  @if($subject->id == $application->subject2)
                  <div class="mt-1">
                    <p>{{$subject->subj_code}}</p>
                  </div>
                  <div class="mt-1">
                    <p>{{$subject->title}}</p>
                  </div>
                  <div id="secondSub" class="mt-1">
                    <p>{{$subject->units}}</p>
                  </div>
                  <div class="mt-1">
                    <p>{{$subject->prof}}</p>
                  </div>
                  @endif
                  @endforeach
                  <!--SUBJECT 3-->
                  @foreach($subjects as $subject)
                  @if($subject->id == $application->subject3)
                  <div class="mt-1">
                    <p>{{$subject->subj_code}}</p>
                  </div>
                  <div class="mt-1">
                    <p>{{$subject->title}}</p>
                  </div>
                  <div id="thirdSub" class="mt-1">
                    <p>{{$subject->units}}</p>
                  </div>
                  <div class="mt-1">
                    <p>{{$subject->prof}}</p>
                  </div>
                  @endif
                  @endforeach
                </div>
                <!--TOTAL UNITS COMPUTATION-->
                @php
                foreach($subjects as $subject){
                if($application->subject1 == NULL)
                $unit1 = 0.0;
                else if($subject->id == $application->subject1)
                $unit1 = $subject->units;
                if($application->subject2 == NULL)
                $unit2 = 0.0;
                else if($subject->id == $application->subject2)
                $unit2 = $subject->units;
                if($application->subject3 == NULL)
                $unit3 = 0.0;
                else if($subject->id == $application->subject3)
                $unit3 = $subject->units;
                }
                $totalUnits = $unit1 + $unit2 + $unit3;
                $totalUnits =number_format("$totalUnits",1);
                @endphp
                <div>
                  <p class="text-xs mt-3">Total Units: {{$totalUnits}}</p>
                </div>
              </div>
              <div class="flex">
                <!--Assessed standard fees-->
                <div class="flex flex-col w-1/3 mt-4 ">
                  <p class="text-md font-semibold">ASSESSED FEES</p>
                  <div class="flex flex-rows">
                    <p class="w-1/2 text-sm font-semibold">Admission Fee</p>
                    <p class="w-1/2 text-sm font-semibold text-right ">{{number_format($template->admission,2)}}</p>
                  </div>
                  <div class="flex flex-rows">
                    <p class="w-1/2 text-sm font-semibold">Tuition Fee</p>
                    <p class="w-1/2 text-sm font-semibold text-right ">{{number_format($template->tuition,2)}}</p>
                  </div>
                  <div class="flex flex-rows">
                    <p class="w-1/2 text-sm font-semibold">Matriculation</p>
                    <p class="w-1/2 text-sm font-semibold text-right ">{{number_format($template->matricula,2)}}</p>
                  </div>
                  <div class="flex flex-rows">
                    <p class="w-1/2 text-sm font-semibold">Medical/Dental Fee</p>
                    <p class="w-1/2 text-sm font-semibold text-right ">{{number_format($template->medical,2)}}</p>
                  </div>
                  <div class="flex flex-rows">
                    <p class="w-1/2 text-sm font-semibold">Library Fee</p>
                    <p class="w-1/2 text-sm font-semibold text-right ">{{number_format($template->library,2)}}</p>
                  </div>
                  <div class="flex flex-rows">
                    <p class="w-1/2 text-sm font-semibold">Athletic Fee</p>
                    <p class="w-1/2 text-sm font-semibold text-right ">{{number_format($template->athletic,2)}}</p>
                  </div>
                  <div class="flex flex-rows">
                    <p class="w-1/2 text-sm font-semibold">Cultural Fee (PFD) </p>
                    <p class="w-1/2 text-sm font-semibold text-right ">{{number_format($template->cultural,2)}}</p>
                  </div>
                  <div class="flex flex-rows">
                    <p class="w-1/2 text-sm font-semibold">Guidance Fee</p>
                    <p class="w-1/2 text-sm font-semibold text-right ">{{number_format($template->guidance,2)}}</p>
                  </div>
                  <div class="flex flex-rows">
                    <p class="w-1/2 text-sm font-semibold">SCUAA Fee</p>
                    <p class="w-1/2 text-sm font-semibold text-right ">{{number_format($template->scuaa,2)}}</p>
                  </div>
                </div>
                <!--Additional Fees -->
                @php
                $adds->shift();
                $adds->all();
                @endphp
                <!-- addFee1 -->
                <div class="flex flex-col w-1/3 mt-9 pl-10">
                  <!--ADDFEE1-->
                  @foreach($adds as $add)
                  @if($fee->addFees1 == $add->id)
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-semibold">{{$add->label}}</p>
                    <p class="w-1/3 text-sm font-semibold text-right ">{{number_format($add->cost,2)}}</p>
                  </div>
                  @endif
                  @endforeach
                  <!--ADDFEE2-->
                  @foreach($adds as $add)
                  @if($fee->addFees2 == $add->id)
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-semibold">{{$add->label}}</p>
                    <p class="w-1/3 text-sm font-semibold text-right ">{{number_format($add->cost,2)}}</p>
                  </div>
                  @endif
                  @endforeach
                  <!--ADDFEE3-->
                  @foreach($adds as $add)
                  @if($fee->addFees3 == $add->id)
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-semibold">{{$add->label}}</p>
                    <p class="w-1/3 text-sm font-semibold text-right ">{{number_format($add->cost,2)}}</p>
                  </div>
                  @endif
                  @endforeach
                  <!--ADDFEE4-->
                  @foreach($adds as $add)
                  @if($fee->addFees4 == $add->id)
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-semibold">{{$add->label}}</p>
                    <p class="w-1/3 text-sm font-semibold text-right ">{{number_format($add->cost,2)}}</p>
                  </div>
                  @endif
                  @endforeach
                  <!--ADDFEE5-->
                  @foreach($adds as $add)
                  @if($fee->addFees5 == $add->id)
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-semibold">{{$add->label}}</p>
                    <p class="w-1/3 text-sm font-semibold text-right ">{{number_format($add->cost,2)}}</p>
                  </div>
                  @endif
                  @endforeach
                  <!--ADDFEE6-->
                  @foreach($adds as $add)
                  @if($fee->addFees6 == $add->id)
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-semibold">{{$add->label}}</p>
                    <p class="w-1/3 text-sm font-semibold text-right ">{{number_format($add->cost,2)}}</p>
                  </div>
                  @endif
                  @endforeach
                  <!--ADDFEE7-->
                  @foreach($adds as $add)
                  @if($fee->addFees7 == $add->id)
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-semibold">{{$add->label}}</p>
                    <p class="w-1/3 text-sm font-semibold text-right ">{{number_format($add->cost,2)}}</p>
                  </div>
                  @endif
                  @endforeach
                  <!--ADDFEE8-->
                  @foreach($adds as $add)
                  @if($fee->addFees8 == $add->id)
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-semibold">{{$add->label}}</p>
                    <p class="w-1/3 text-sm font-semibold text-right ">{{number_format($add->cost,2)}}</p>
                  </div>
                  @endif
                  @endforeach
                  <!--ADDFEE9-->
                  @foreach($adds as $add)
                  @if($fee->addFees9 == $add->id)
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-semibold">{{$add->label}}</p>
                    <p class="w-1/3 text-sm font-semibold text-right ">{{number_format($add->cost,2)}}</p>
                  </div>
                  @endif
                  @endforeach
                  <!--ADDFEE10-->
                  @foreach($adds as $add)
                  @if($fee->addFees10 == $add->id)
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-semibold">{{$add->label}}</p>
                    <p class="w-1/3 text-sm font-semibold text-right ">{{number_format($add->cost,2)}}</p>
                  </div>
                  @endif
                  @endforeach
                </div>
                <!--End of Additional Fees -->
                <!--TOTAL-->
                <div class="flex flex-col w-1/3 mt-9 pl-10">
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-bold">TOTAL</p>
                    <p class="w-1/3 text-sm font-bold text-right ">{{number_format($fee->total,2)}}</p>
                  </div>
                  <div class="flex flex-rows-2 mt-1">
                    <p class="w-2/3 text-sm font-semibold">Outstanding Balance</p>
                    <p class="w-1/3 text-sm font-semibold text-right ">{{number_format($fee->balance,2)}}</p>
                  </div>
                  <!--STATUS PAID/UNPAID-->
                  @if($fee->status == 0)
                  <div class="flex flex-rows-2 mt-1 ml-6">
                    <p class="text-right font-bold text-red-600  border-2 border-red-500 rounded-sm px-2 ml-44">UNPAID</p>
                  </div>
                  @elseif($fee->status == 2)
                  <!--INSTALLMENT OPTION-->
                  <div class="flex flex-rows-2 mt-1">
                    <p class="text-right font-bold text-amber-600 border-2 border-amber-500 rounded-sm px-2 ml-40">INSTALLMENT</p>
                  </div>
                  @else
                  <div class="flex flex-rows-2 mt-1 ml-4">
                    <p class="text-right font-bold text-green-600 border-2 border-green-500 rounded-sm px-2 ml-52">PAID</p>
                  </div>
                  @endif
                </div>
                <!--End of TOTAL-->
              </div>
              <div class="grid grid-cols-3 grid-rows-2 text-sm mt-10">
                <div class="flex flex-rows-2">
                  <p class="w-1/3">Official Receipt:</p>
                  @if($fee->receipt != 0)
                  <p class="w-2/3 font-semibold border-b-2 border-gray-500 mr-2 text-right">{{$fee->receipt}}</p>
                  @else
                  <p class="w-2/3 font-semibold border-b-2 border-gray-500 mr-2 text-right"></p>
                  @endif
                </div>
                <div class="flex justify-center items-center mr-2">
                  <p class="border-b-2 border-gray-500 font-semibold">{{strtoupper($application->lastName.', '.$application->firstName.' '.$application->middleName[0].'.') }}</p>
                </div>
                <div class="flex justify-center items-center mr-2">
                  <p class="border-b-2 border-gray-500 font-semibold">{{strtoupper($cashier->first_name.' '.$cashier->middle_name[0].'. '.$cashier->last_name) }}</p>
                </div>
                <div>
                  <p>Payment/Validation Date:</p>
                </div>
                <div class="flex justify-center items-center">
                  <p>Student's Signature</p>
                </div>
                <div class="flex justify-center items-center">
                  <p>Registrar</p>
                </div>
              </div>
              <div class="bgBlue flex justify-center items-center mt-5 bg-cyan-200 p-1">
                <p>KEEP THIS CERTIFICATE. YOU WILL BE REQUIRED TO PRESENT THIS IN ALL YOUR DEALINGS WITH THE COLLEGE.</p>
              </div>
              <div class="text-red-500 text-xs">
                <p>Note : Invalid without the Registrar's Signature</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--FULL PAY MODAL-->
      <div class="modal-full-pay opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

          <div class="modal-close-1 absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
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
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Official Receipt:</h3>
                        <div class="mt-2">
                          <p class="text-sm text-gray-500">Please enter government issued OR reference number.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form class="" action="{{ route('cashier.fees.update', $fee->id) }}" method="post">
                    @csrf
                    @method("PATCH")
                    <div class="bg-gray-50 px-4 py-3">
                      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <div class="mt-2">
                          <input type="text" name="receipt" id="receipt" cols="30" rows="10" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-200" id="inline-full-name" type="text" />
                        </div>
                      </div>
                      <input type="hidden" name="status" value="1">
                      <input type="hidden" name="balance" value="{{$fee->balance - $fee->balance}}">
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                      <button name="submit" value="Update" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-green-400 text-base font-medium text-g-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Proceed
                      </button>
                      <button type="button" class="modal-close-1 mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!--INSTALLMENT PAY MODAL-->
      <div class="modal-install-pay opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

          <div class="modal-close-2 absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
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
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Official Receipt:</h3>
                        <div class="mt-2">
                          <p class="text-sm text-gray-500">Please enter government issued OR reference number.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form class="" action="{{ route('cashier.fees.update', $fee->id) }}" method="post">
                    @csrf
                    @method("PATCH")
                    <div class="bg-gray-50 px-4 py-3">
                      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <div class="mt-2">
                          <input type="text" name="receipt" id="receipt" cols="30" rows="10" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-200" id="inline-full-name" type="text" />
                        </div>
                      </div>
                      <input type="hidden" name="status" value="2">
                      <input type="hidden" name="balance" value="{{$fee->balance/2}}">
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                      <button name="submit" value="Update" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-green-400 text-base font-medium text-g-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Proceed
                      </button>
                      <button type="button" class="modal-close-2 mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!--modal button-->
      <div class="flex mt-6 mr-20 float-right mb-10">
        <button class="">
          <a class="modal-open-1 w-full inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-green-200 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">Full Payment ₱{{number_format($fee->balance,2)}}</a>
        </button>
        <button class="ml-4">
          <a class="modal-open-2 w-full inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-amber-200 hover:bg-amber-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">Installment ₱{{number_format($fee->balance/2,2)}}</a>
        </button>
      </div>
    </div>
  </div>
  <style>
    .Formlogo {
      display: none;
    }

    @media print {
      @page {
        margin: 0;
      }

      body {
        margin-left: -290px;
        margin-top: -6%;
        height: 40%;
        width: 100%;


      }

      html {
        font-size: 85%;
        box-shadow: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;

      }

      nav {
        display: none;
      }

      header {
        display: none;
      }

      .content {
        margin: 0;
        height: 0%;
        width: 110%;

      }

      .btn {
        display: none;
      }

      .sidebar {
        display: none;
      }




      .main {
        width: 300%;
        box-shadow: none;

      }

      .toHide {
        display: none;
      }

      .bgBlue {
        background-color: #a5f3fc !important;
        -webkit-print-color-adjust: exact;
      }

      .Formlogo {
        display: grid;
      }
    }

  </style>
  </style>
  <script>
    var openmodal = document.querySelectorAll('.modal-open-1')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event) {
        event.preventDefault()
        toggleModal()
      })
    }

    var openmodal = document.querySelectorAll('.modal-open-2')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event) {
        event.preventDefault()
        toggleModal1()
      })
    }

    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)

    var closemodal = document.querySelectorAll('.modal-close-1')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }

    var closemodal1 = document.querySelectorAll('.modal-close-2')
    for (var i = 0; i < closemodal1.length; i++) {
      closemodal1[i].addEventListener('click', toggleModal1)
    }

    function toggleModal() {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal-full-pay')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }

    function toggleModal1() {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal-install-pay')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }

  </script>
</x-app-layout>
