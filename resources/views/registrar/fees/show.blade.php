<x-app-layout>
  <x-slot name="header" class="toHide">
    <h2 class="toHide font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Fees') }} | <span class=" text-md text-gray-500">{{__('Generate')}}</span>
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

        <a onclick="window.print();" class="btn pointer printBtn ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer">
          <svg class="h-5 w-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Print</span>
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
              <div class="flex flex-col w-1/3 mt-4 ">
                <p class="text-md font-semibold">ASSESSED FEES</p>
                <div class="flex flex-rows">
                  <p class="w-1/2 text-sm font-semibold">Tuition Fee</p>
                  <p id="tuitionFee" class="w-1/2 text-sm font-semibold text-right "></p>
                </div>
                <div class="flex flex-rows">
                  <p class="w-1/2 text-sm font-semibold">Misc Fees</p>
                  <p id="miscFee" class="w-1/2 text-sm font-semibold text-right border-b-2 border-gray-500"></p>
                </div>
                <div class="flex flex-rows mt-1">
                  <p class="w-1/2 text-sm font-semibold">Total Fee</p>
                  <p id="totalFee" class="w-1/2 text-sm font-semibold text-right"></p>
                </div>
              </div>
              <div class="grid grid-cols-3 grid-rows-2 text-sm mt-10">
                <div class="flex flex-rows-2">
                  <p class="w-1/3">Official Receipt:</p>
                  <p class="w-2/3 border-b-2 border-gray-500 mr-2"></p>
                </div>
                <div class="flex justify-center items-center mr-2">
                  <p class="border-b-2 border-gray-500 font-semibold">{{strtoupper($application->lastName.', '.$application->firstName.' '.$application->middleName[0].'.') }}</p>
                </div>
                <div class="flex justify-center items-center mr-2">
                  <p class="border-b-2 border-gray-500 font-semibold">{{strtoupper(Auth::user()->first_name.' '.Auth::user()->middle_name[0].'. '.Auth::user()->last_name) }}</p>
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
            <!--JS BUTTONS-->
            <div class="toHide float-right mt-4">
              <input id="tuitionCost" class="p-1 rounded-md shadow-md outline-none text-right text-sm shadow-md" placeholder="Enter amount (₱)">
              <button id="tuitionButton" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">Tuition Fee</button>
              <input id="misCost" class="p-1 rounded-md shadow-md outline-none text-right text-sm shadow-md" placeholder="Enter amount (₱)">
              <button id="misButton" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">Misc Fees</button>
              <button id="solveTotal" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-green-200 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">Generate Total</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      //TUITION FEE
      let tuitionField = document.getElementById("tuitionCost");
      let tuitionButton = document.getElementById("tuitionButton");
      //field to submit value
      let tuitionFee = document.getElementById("tuitionFee");
      tuitionButton.onclick = function() {
        tuitionFee.innerHTML = Number(parseFloat(tuitionField.value.replace(/,/g, '')).toFixed(2)).toLocaleString('en');
        tuitionField.value = "";
      }
      //MISC FEES
      let miscField = document.getElementById("misCost");
      let miscButton = document.getElementById("misButton");
      //field to submit value
      let miscFee = document.getElementById("miscFee");
      miscButton.onclick = function() {
        miscFee.innerHTML = Number(parseFloat(miscField.value.replace(/,/g, '')).toFixed(2)).toLocaleString('en');
        miscField.value = "";
      }
      //GENERATE TOTAL FEE
      let totalField = document.getElementById("totalFee");
      let totalButton = document.getElementById("solveTotal");
      totalButton.onclick = function() {
        let total = 0;
        //parse float number and omits the comma(,) for computation
        total = parseFloat(tuitionFee.innerHTML.replace(/,/g, '')) + parseFloat(miscFee.innerHTML.replace(/,/g, ''));
        //float number with comma separator and fixed decimal point(2)
        totalField.innerHTML = Number(parseFloat(total).toFixed(2)).toLocaleString('en');
      }

    </script>
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
        margin-top: -2%;
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
</x-app-layout>
