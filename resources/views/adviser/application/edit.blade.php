<x-app-layout>

	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Applications') }} | Edit
		</h2>
	</x-slot>
						<!-- Alert-->
						@if (session ('success'))
						<div id="alert" class="flex p-4 mb-4 z-50 bg-red-200 border-t-4 dark:bg-green-200" role="alert">
							<svg class="flex-shrink-0 w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
							</svg>
							<div class="ml-3 font-medium text-gray-700">
								{{ session('success') }}
							</div>
						</div>
						@endif
	<div>
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
			<div class="block mb-8">
			<a href="{{ route('adviser.application.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>
			
			<div class="mt-5 md:mt-0 md:col-span-2">
				<form method="post" action="{{ route('adviser.application.update', $application->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="shadow overflow-hidden sm:rounded-md">
						<div class="px-4 py-5 bg-white sm:p-6 border-0">
							

							<label class="font-bold mb-1 text-gray-700 block">Applicant Information</label>
							<div class="grid grid-cols-6  gap-4 border-t-2 border-gray-200">
								<label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Basic Information</label>
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
							<div class="mt-10 col-span-6 border-t-2 border-gray-200"></div>

							<div class="grid grid-cols-6  gap-4 pb-10">

								<!--Birthdate-->
								<div class="mt-4 col-span-2">
									<x-jet-label for="birthDate" value="{{ __('Birth date') }}" />
									<x-jet-input id="birthDate" readonly class="form-control block mt-1 w-full" type="date" name="birthDate" value="{{$application->birthDate}}" required autofocus />
								</div>
								<!--Gender-->
								<div class="mt-4 col-span-2">
									<x-jet-label for="gender" value="Gender" />
									<select readonly name="gender" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
										<option readonly selected>{{$application->gender}}</option>
									</select>
								</div>
								<div class="mt-10 col-span-6 border-t-2 border-gray-200"></div>
								<label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Contact</label>

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

								<div class="mt-10 col-span-6 border-t-2 border-gray-200"></div>
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


							<label class="py-4 pt-10 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Upload Requirements</label>




							<div class="col-sm-10">
								<ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200 w-auto">
									<li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
										<div class="w-0 flex-1 flex items-center">
											<!-- Heroicon name: solid/paper-clip -->
											<svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
												<path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
											</svg>
											<x-jet-label for="applicantImage" value="{{ asset($application->applicantImage) }}" />
										</div>
										<div class="ml-4 flex-shrink-0">

										</div>
									</li>
								</ul>
								
								<br />
								<img src="{{ asset('requirements/' . $application->applicantImage) }}" width="100" class="img-thumbnail" />
								<br><br>
								<input type="hidden" id="applicantImage" name="applicantImage" value="{{ $application->applicationImage }}" class="form-control" />
								<input hidden type="file" name="applicantImage" />
							</div>
							<div class="grid grid-cols-6  gap-4 pt-10">

								<!--Program Selection-->
								<div class="mt-4 col-span-6">
									<label class="pb-4 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Program Selection</label>

									<x-jet-label for="programs_id" value=" Programs" class="pt-6" />
									<select readonly name="programs_id" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
										@foreach($programs as $row)				
												@if( $row->id == $application->programs_id)
												<option readonly selected class="block mt-1 w-full" value="{{ $application->programs_id }}">{{ $row->description}}</option>
												@endif
										@endforeach
										
									</select>
								</div>

								<!-- Subject Selection -->
								<div class="mt-4 col-span-6">
									<label class="pb-4 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Subject Selection</label>

									<x-jet-label for="programs_id" value=" Subjects" class="pt-6" />
									<select name="subject1" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
									
									@foreach($subjects as $row)
										@foreach($programs as $prog)
										@if($prog->id == $application->programs_id)
											@if($row->id == $application->subject1)
													<option selected class="block mt-1 w-full" name="subject1"  value="{{$application->subject1}}">{{ $prog->code}}: &emsp;  {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
											@endif
										@endif
										@endforeach
											
										
									@endforeach
									<option value = ""class="block mt-1 w-full">No Subject</option>
										@foreach($subjects as $row)
											@foreach($programs as $prog)
											@if($row->programs_id == $prog->id)
													<option class="block mt-1 w-full" name="subject1"  value="{{$row->id}}">{{ $prog->code}}: &emsp;  {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
												@endif
											@endforeach
										@endforeach

									</select>

								<x-jet-label for="programs_id" value=" Subjects" class="pt-6" />
								<select name="subject2" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
									
									@foreach($subjects as $row)
										@foreach($programs as $prog)
										@if($prog->id == $application->programs_id)
											@if($row->id == $application->subject2)
													<option selected disabled class="block mt-1 w-full" name="subject2"  value="{{$application->subject2}}">{{ $prog->code}}: &emsp;  {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
													<option selected class="hidden block mt-1 w-full" name="subject2"  value="{{$application->subject2}}">{{ $prog->code}}: &emsp;  {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
											@endif
										@endif
										@endforeach
											
										
									@endforeach
									<option value = ""class="block mt-1 w-full">No Subject</option>
										@foreach($subjects as $row)
											@foreach($programs as $prog)
											@if($row->programs_id == $prog->id)
													<option class="block mt-1 w-full" name="subject2"  value="{{$row->id}}">{{ $prog->code}}: &emsp;  {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
												@endif
											@endforeach
										@endforeach

									</select>

                  <x-jet-label for="programs_id" value=" Subjects" class="pt-6" />
				  <select name="subject3" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
									
									@foreach($subjects as $row)
										@foreach($programs as $prog)
										@if($prog->id == $application->programs_id)
											@if($row->id == $application->subject3)
											<option selected disabled class="block mt-1 w-full" name="subject3"  value="{{$application->subject3}}">{{ $prog->code}}: &emsp;  {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
													<option selected class="hidden block mt-1 w-full" name="subject3"  value="{{$application->subject3}}">{{ $prog->code}}: &emsp;  {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
											@endif
										@endif
										@endforeach
											
										
									@endforeach
									<option value = ""class="block mt-1 w-full">No Subject</option>
										@foreach($subjects as $row)
											@foreach($programs as $prog)
											@if($row->programs_id == $prog->id)
													<option class="block mt-1 w-full" name="subject3"  value="{{$row->id}}">{{ $prog->code}}: &emsp;  {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
												@endif
											@endforeach
										@endforeach

</select>
								</div>

							</div>
							<!--Button-->
							<div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button class="inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-green-200 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                Update
              </button>
              <button class="ml-1 inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-red-200 hover:bg-red-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                <a href="{{ route('adviser.application.index') }}">Cancel</a>
              </button>
            </div>
						</div>
						</div>
						<!--END OF GRID-->
					</div>
				</form>
			</div>
		</div>
	</div>

	<style>
        [x-cloak] { display: none }
    </style>
		
</x-app-layout>