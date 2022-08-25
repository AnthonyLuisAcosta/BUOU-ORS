<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Applications') }} | Create
    </h2>
  </x-slot>
  @section('content')

  @if($errors->any())

  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)

      <li class="bg-red-200 float">{{ $error }}</li>

      @endforeach
    </ul>
  </div>
  @endif

  <br><br><br>
  <!--Form V2-->

  <div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">

      			<!-- Alert-->
			@if (session ('success'))
			<div id="alert" class="flex p-4 mb-4 bg-red-500 dark:bg-red-200" role="alert">
				<svg class="flex-shrink-0 w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				<div class="ml-3 font-medium text-white">
				{{ session('success') }}
			</div>
			</div>
			@endif
      
      <div class="block mb-8">
        <a href="{{ route('application.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <!--from route('applicant.application.store') to ('application.store')-->
        <form action="{{ route('application.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6 border-0">
              <label class="font-bold mb-1 text-gray-700 block">Applicant Information</label>
              <div class="grid grid-cols-6  gap-4 border-t-2 border-gray-200">
                <label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Basic Information</label>
                
                <x-jet-input id="applicant_id" class="hidden" type="applicant_id" name="applicant_id" value="{{Auth::user()->id}}" required autofocus />
                
                <div class="mt-4 col-span-2">
                  <x-jet-label class="" for="firstName" value="{{ __('First Name') }}" />
                  <x-jet-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" value="{{Auth::user()->first_name}}" required autofocus autocomplete="firstName" />
                </div>
                <!--Middle Name-->
                <div class="mt-4 col-span-2">
                  <x-jet-label for="middleName" value="{{ __('Middle Name') }}" />
                  <x-jet-input id="middleName" class="block mt-1 w-full" type="text" name="middleName" value="{{Auth::user()->middle_name}}" required autofocus autocomplete="middleName" />
                </div>
                <!--Last Name-->
                <div class="mt-4 col-span-2 ">
                  <x-jet-label for="lastName" value="{{ __('Last Name') }}" />
                  <x-jet-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" value="{{Auth::user()->last_name}}" required autofocus autocomplete="lastName" />
                </div>
              </div>
              <div class="mt-10 col-span-6 border-t-2 border-gray-200"></div>

              <div class="grid grid-cols-6  gap-4 pb-10">

                <!--Birthdate-->
                <div class="mt-4 col-span-2">
                  <x-jet-label for="birthDate" value="{{ __('Birth date') }}" />
                  <x-jet-input id="birthDate" class="block mt-1 w-full" type="date" name="birthDate" value="old('birthDate')" required autofocus autocomplete="birthDate" />
                </div>
                <!--Gender-->
                <div class="mt-4 col-span-2">
                  <x-jet-label for="gender" value="Gender" />
                  <select name="gender" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                    <option disabled>Select an option</option>
                    <option class="block mt-1 w-full" value="Male">Male</option>
                    <option class="block mt-1 w-full" value="Female">Female</option>

                  </select>
                </div>
                <div class="mt-10 col-span-6 border-t-2 border-gray-200"></div>
                <label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Contact</label>

                <!--Email-->
                <div class="mt-4 col-span-4">
                  <x-jet-label for="email" value="{{ __('Email Address') }}" />
                  <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{Auth::user()->email}}" required autofocus autocomplete="email" />
                </div>
                <!--Phone-->
                <div class="mt-4 col-span-3">
                  <x-jet-label for="phone" value="{{ __('Contact Number') }}" />
                  <x-jet-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                </div>

                <div class="mt-10 col-span-6 border-t-2 border-gray-200"></div>
                <label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Residence Address</label>

                <!--Address-->
                <div class="mt-4 col-span-6">
                  <x-jet-label for="address" value="{{ __('Address') }}" />
                  <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                </div>
                <!--Company-->
                <div class="mt-4 col-span-3">
                  <x-jet-label for="company" value="{{ __('Company') }}" />
                  <x-jet-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" required autofocus autocomplete="company" />
                </div>

              </div>


              <label class="py-4 pt-10 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Upload Requirements</label>

              <div class="mt-10">

                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                  <div class="space-y-1 text-center ">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="mx-auto justify-center text-gray-600">
                      <label for="applicantImage" class="cursor-pointer bg-white rounded-md font-bold text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      </label>
                      <!-- actual upload which is hidden -->
                      <input type="file" id="applicantImage" name="applicantImage" hidden :value="old('applicantImage')"/>

                      <!-- our custom upload button -->
                      <label for="applicantImage" class="cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">Choose File</label>

                    </div>
                    <!--Display File Name-->
                    <span id="file-chosen" class=" mx-auto justify-center font-sm text-gray-600"></span>

                    <p class="text-xs text-gray-500">PNG, JPG, GIF, PDF up to 10MB</p>
                  </div>
                </div>
              </div>




              <div class="grid grid-cols-6  gap-4 pt-10">

                 <!--Program Selection-->
                 <div class="mt-4 col-span-6">
                  <label class="pb-4 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Program Selection</label>

                  <x-jet-label for="programs_id" value=" Programs" class="pt-6" />
                  <select name="programs_id" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                    <option selected>Select Program</option>
                    @foreach($programs as $row)
                    <option class="block mt-1 w-full" name="programs_id" value="{{ $row->id}}">{{ $row->code}}: &ensp; {{ $row->description}}</option>
                    @endforeach
                    </select>
                
                   <!--Subject Selection-->
								<div class="mt-4 col-span-6">
									<label class="pb-4 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Subject Selection</label>

									<x-jet-label for="programs_id" value=" Subjects" class="pt-6" />
									<select name="subject1" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
										<option value="null" selected>Select Subject</option>
										@foreach($subjects as $row)
                      @foreach($programs as $prog)
                          @if($prog->id == $row->programs_id)
										          <option class="block mt-1 w-full" name="subject1" value="{{ $row->id}}">{{ $prog->code}}: &emsp;  {{ $row->title}} &emsp; Units: {{ $row->units}} </option>
                          @endif
                      @endforeach
										@endforeach

									</select>

                  <x-jet-label for="programs_id" value=" Subjects" class="pt-6" />
									<select name="subject2" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
										<option selected disabled>Select Subject</option>
                  
										@foreach($subjects as $row)
                      @foreach($programs as $prog)
                          @if($prog->id == $row->programs_id)
										          <option class="block mt-1 w-full" name="subject2"  value="{{ $row->id}}">{{ $prog->code}}: &emsp;  {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
                          @endif
                      @endforeach
										@endforeach

									</select>

                  <x-jet-label for="programs_id" value=" Subjects" class="pt-6" />
									<select name="subject3" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
										<option selected disabled>Select Subject</option>
										@foreach($subjects as $row)
                      @foreach($programs as $prog)
                          @if($prog->id == $row->programs_id)
										          <option class="block mt-1 w-full" name="subject3"  value="{{ $row->id}}">{{ $prog->code}}: &emsp;  {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
                          @endif
                      @endforeach
										@endforeach

									</select>
								</div>

                  
                </div>



              </div>
              <!--Button-->
              <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-green-200 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                Create
              </button>
              <button class="ml-1 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-red-200 hover:bg-red-400 hover:text-gray-200">
                <a href="{{ route('application.index') }}">Cancel</a>
              </button>
            </div>
            </div>
            <!--END OF GRID-->
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const applicantImage = document.getElementById('applicantImage');

    const fileChosen = document.getElementById('file-chosen');

    applicantImage.addEventListener('change', function() {
      fileChosen.textContent = this.files[0].name
    })

  </script>

  <!--Alert Timeout-->
	<script>
		setTimeout(function () {
			$("#alert").hide();
		}, 3000);
		
	</script>

</x-app-layout>
