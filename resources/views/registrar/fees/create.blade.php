<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Fees') }} | <span class=" text-md text-gray-500">{{__('Generate')}}</span>
    </h2>
  </x-slot>
  @include('alert')
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
      <div class="flex items-center justify-center mt-5 md:mt-0 md:col-span-2">
        <div class=" border-t-2 w-full border-gray-200 flex gap-4">
          <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-9/12 w-9/12">

            <div class="px-4 py-5 sm:px-6">
              <h3 class="text-lg leading-6 font-medium text-gray-900">Application Overview</h3>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">Application information.</p>
            </div>
            <div class="border-t border-gray-200">
              <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Name</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $application->firstName."  ".$application->middleName[0].'.'."  ".$application->lastName}}</dd>
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
                  <dt class="text-sm font-medium text-gray-500">Age</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $application->getAge() }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500"> Academic Year</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{$term->year.' '.$term->label}}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500"> Status</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $application->status }}</dd>
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
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Total Units</dt>
                  <dd class="mt-1 text-sm text-gray-900 font-bold sm:mt-0 sm:col-span-2">{{$totalUnits}}</dd>
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
              </dl>
            </div>
          </div>
          <div class="bg-white shadow overflow-hidden sm:rounded-lg max-w-6xl w-fit">
            <div class="px-4 py-5 sm:px-6">
              <h3 class="text-lg leading-6 font-medium text-gray-900">Fees Overview</h3>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">Fees Assessment.</p>
            </div>
            <form action="{{ route('registrar.fees.index') }}" method="post">
              @csrf
              <input type="hidden" name="appRef_id" value="{{$application->id}}">
              <div class=" border-t border-gray-200 shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6 border-0">
                  <div class="mt-4">
                    <x-jet-label for="fees" value="Assessed Fees" />
                    <select id="fees" name="fees" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                      <option selected value="0">Select an option</option>
                      @foreach($templates as $template)
                      <option value="{{$template->id}}">
                        {{$template->type.' '.$template->units}}.0 - ₱{{number_format($template->total,2)}}
                      </option>
                      @endforeach
                    </select>
                  </div>
                  @php
                  $adds->shift();
                  $adds->all();
                  @endphp
                  <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="">
                      <x-jet-label for="addFees1" value="Additional Fees 1" />
                      <select id="addFees1" name="addFees1" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                        <option selected value="1">None</option>
                        @foreach($adds as $add)
                        <option value="{{$add->id}}">{{$add->label.'- ₱'.number_format($add->cost,2)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="">
                      <x-jet-label for="addFees2" value="Additional Fees 2" />
                      <select id="addFees2" name="addFees2" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                        <option selected value="1">None</option>
                        @foreach($adds as $add)
                        <option value="{{$add->id}}">{{$add->label.'- ₱'.number_format($add->cost,2)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="">
                      <x-jet-label for="addFees3" value="Additional Fees 3" />
                      <select id="addFees3" name="addFees3" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                        <option selected value="1">None</option>
                        @foreach($adds as $add)
                        <option value="{{$add->id}}">{{$add->label.'- ₱'.number_format($add->cost,2)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="">
                      <x-jet-label for="addFees4" value="Additional Fees 4" />
                      <select id="addFees4" name="addFees4" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                        <option selected value="1">None</option>
                        @foreach($adds as $add)
                        <option value="{{$add->id}}">{{$add->label.'- ₱'.number_format($add->cost,2)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="">
                      <x-jet-label for="addFees5" value="Additional Fees 5" />
                      <select id="addFees5" name="addFees5" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                        <option selected value="1">None</option>
                        @foreach($adds as $add)
                        <option value="{{$add->id}}">{{$add->label.'- ₱'.number_format($add->cost,2)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="">
                      <x-jet-label for="addFees6" value="Additional Fees 6" />
                      <select id="addFees6" name="addFees6" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                        <option selected value="1">None</option>
                        @foreach($adds as $add)
                        <option value="{{$add->id}}">{{$add->label.'- ₱'.number_format($add->cost)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="">
                      <x-jet-label for="addFees7" value="Additional Fees 7" />
                      <select id="addFees7" name="addFees7" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                        <option selected value="1">None</option>
                        @foreach($adds as $add)
                        <option value="{{$add->id}}">{{$add->label.'- ₱'.number_format($add->cost,2)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="">
                      <x-jet-label for="addFees8" value="Additional Fees 8" />
                      <select id="addFees8" name="addFees8" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                        <option selected value="1">None</option>
                        @foreach($adds as $add)
                        <option value="{{$add->id}}">{{$add->label.'- ₱'.number_format($add->cost,2)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="">
                      <x-jet-label for="addFees9" value="Additional Fees 9" />
                      <select id="addFees9" name="addFees9" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                        <option selected value="1">None</option>
                        @foreach($adds as $add)
                        <option value="{{$add->id}}">{{$add->label.'- ₱'.number_format($add->cost,2)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="">
                      <x-jet-label for="addFees10" value="Additional Fees 10" />
                      <select id="addFees10" name="addFees10" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                        <option selected value="1">None</option>
                        @foreach($adds as $add)
                        <option value="{{$add->id}}">{{$add->label.'- ₱'.number_format($add->cost,2)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <input type="hidden" name="addCost1" value="0">
                    <input type="hidden" name="addCost2" value="0">
                    <input type="hidden" name="addCost3" value="0">
                    <input type="hidden" name="addCost4" value="0">
                    <input type="hidden" name="addCost5" value="0">
                    <input type="hidden" name="addCost6" value="0">
                    <input type="hidden" name="addCost7" value="0">
                    <input type="hidden" name="addCost8" value="0">
                    <input type="hidden" name="addCost9" value="0">
                    <input type="hidden" name="addCost10" value="0">
                    <input type="hidden" name="status" value="0">
                    <input type="hidden" name="total" value="0">
                    <input type="hidden" name="balance" value="0">

                  </div>
                  <div class="mt-4 rounded-lg flex items-center justify-end py-1 bg-gray-50 text-right sm:px-6 overflow-hidden">
                    <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-green-200 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                      Generate
                    </button>
                    <button class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-red-200 hover:bg-red-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                      <a href="{{ route('registrar.terms.index') }}">Cancel</a>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>
<!--
<div class="w-1/2 lg:w-1/2 shadow overflow-hidden rounded-lg">
          <form action="{{ route('registrar.fees.index') }}" method="post">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6 border-0">
<div class="grid grid-rows-2 gap-4">
  <div class="mt-4">
    <x-jet-label for="year" value="Assessed Fees" />
    <select id="role" name="year" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
      <option selected>Select an option</option>
      @foreach($templates as $template)
      <option value="{{$template->id}}">
        {{$template->type.' '.$template->units}}.0 - ₱{{$template->total}}
      </option>
      @endforeach
  </div>
  </select>
  <div>
  </div>
  <div class="mt-4">
    <x-jet-label for="label" value="Additional Fees" />
    <select id="role" name="label" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
      <option selected value="0">None</option>
      @foreach($adds as $add)
      <option value="{{$add->cost}}">{{$add->label.'- ₱'.$add->cost}}</option>
      @endforeach
    </select>
  </div>
  <div class="mt-4">
    <x-jet-label for="label" value="Additional Fees" />
    <select id="role" name="label" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
      <option selected value="0">None</option>
      @foreach($adds as $add)
      <option value="{{$add->cost}}">{{$add->label.'- ₱'.$add->cost}}</option>
      @endforeach
    </select>
  </div>
  <div class="mt-4">
    <x-jet-label for="label" value="Additional Fees" />
    <select id="role" name="label" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
      <option selected value="0">None</option>
      @foreach($adds as $add)
      <option value="{{$add->cost}}">{{$add->label.'- ₱'.$add->cost}}</option>
      @endforeach
    </select>
  </div>
  <input type="hidden" name="status" value="0">
</div>
<div class="mt-4 rounded-lg flex items-center justify-end py-1 bg-gray-50 text-right sm:px-6 overflow-hidden">
  <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-green-200 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
    Add
  </button>
  <button class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-red-200 hover:bg-red-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
    <a href="{{ route('registrar.terms.index') }}">Cancel</a>
  </button>
</div>
</div>
</div>
</form>
</div>
-->
