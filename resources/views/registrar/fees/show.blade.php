<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Fees') }} | <span class=" text-md text-gray-500">{{__('Generate')}}</span>
    </h2>
  </x-slot>
  <div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="block mb-8">
        <a href="{{ route('registrar.fees.index') }}" class="ml-1 inline-flex items-center px-4 py-1 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-cyan-200 hover:bg-cyan-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
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
            <div id="printForm" class="shadow overflow-hidden border-b border-gray-200 bg-white p-12">
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
                  <p class="text-xs">Total Units: {{$totalUnits}}</p>
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
            </div>
            <!--JS BUTTONS-->
            <div class="float-right">
              <input id="tuitionCost" class="p-1 rounded-md shadow-md outline-none text-right" placeholder="Enter tuition fee">
              <button id="tuitionButton" class="mt-5 text-sm bg-amber-200 text-gray-800 py-1 px-2 rounded-md shadow-md hover:bg-amber-400 hover:text-gray-200">Tuition Fee</button>
              <input id="misCost" class="p-1 rounded-md shadow-md outline-none text-right" placeholder="Enter misc fees">
              <button id="misButton" class="mt-5 text-sm bg-amber-200 text-gray-800 py-1 px-2 rounded-md shadow-md hover:bg-amber-400 hover:text-gray-200">Misc Fees</button>
              <button id="solveTotal" class="mt-5 text-sm bg-green-200 text-gray-800 py-1 px-2 rounded-md shadow-md hover:bg-green-400 hover:text-gray-200">Generate Total</button>
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
        tuitionFee.innerHTML = tuitionField.value;
        tuitionField.value = "";
      }
      //MISC FEES
      let miscField = document.getElementById("misCost");
      let miscButton = document.getElementById("misButton");
      //field to submit value
      let miscFee = document.getElementById("miscFee");
      miscButton.onclick = function() {
        miscFee.innerHTML = miscField.value;
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
</x-app-layout>