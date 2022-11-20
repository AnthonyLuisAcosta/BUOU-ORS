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
			<a href="{{ route('application.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>
			
			<div class="mt-5 md:mt-0 md:col-span-2">
				<form method="post" action="{{ route('application.update', $application->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="shadow overflow-hidden sm:rounded-md">
						<div class="px-4 py-5 bg-white sm:p-6 border-0">

							<label class="font-bold mb-1 text-gray-700 block">Applicant Information</label>
							<div class="grid grid-cols-6  gap-4 border-t-2 border-gray-200">
								<label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Basic Information</label>
								<div class="mt-4 col-span-2">
									<x-jet-label for="firstName" value="{{ __('First Name') }}" />
									<x-jet-input class="form-control block mt-1 w-full" type="text" name="firstName" value="{{$application->firstName}}" required autofocus />
								</div>
								<!--Middle Name-->
								<div class="mt-4 col-span-2">
									<x-jet-label for="middleName" value="{{ __('Middle Name') }}" />
									<x-jet-input class="block mt-1 w-full" type="text" name="middleName" value="{{$application->middleName}}" required autofocus />
								</div>
								<!--Last Name-->
								<div class="mt-4 col-span-2 ">
									<x-jet-label for="name" value="{{ __('Last Name') }}" />
									<x-jet-input class="form-control block mt-1 w-full" type="text" name="lastName" value="{{$application->lastName}}" required autofocus />
								</div>
							</div>
							<div class="mt-10 col-span-6 border-t-2 border-gray-200"></div>

							<div class="grid grid-cols-6  gap-4 pb-10">

								<!--Birthdate-->
								<div class="mt-4 col-span-2">
									<x-jet-label for="birthDate" value="{{ __('Birth date') }}" />
									<x-jet-input id="birthDate" class="form-control block mt-1 w-full" type="date" name="birthDate" value="{{$application->birthDate}}" required autofocus />
								</div>
								<!--Gender-->
								<div class="mt-4 col-span-2">
									<x-jet-label for="gender" value="Gender" />
									<select name="gender" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
										<option selected>{{$application->gender}}</option>
										<option class="block mt-1 w-full" value="Male">Male</option>
										<option class="block mt-1 w-full" value="Female">Female</option>

									</select>
								</div>
								<div class="mt-10 col-span-6 border-t-2 border-gray-200"></div>
								<label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Contact</label>

								<!--Email-->
								<div class="mt-4 col-span-4">
									<x-jet-label for="email" value="{{ __('Email Address') }}" />
									<x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$application->email}}" required autofocus />
								</div>
								<!--Phone-->
								<div class="mt-4 col-span-3">
									<x-jet-label for="phone" value="{{ __('Contact Number') }}" />
									<x-jet-input id="phone" class="block mt-1 w-full" type="number" name="phone" value="{{$application->phone}}" required autofocus />
								</div>

								<div class="mt-10 col-span-6 border-t-2 border-gray-200"></div>
								<label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Residence Address</label>

								<!--Address-->
								<div class="mt-4 col-span-6">
									<x-jet-label for="address" value="{{ __('Address') }}" />
									<x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{$application->address}}" required autofocus />
								</div>
								<!--Company-->
								<div class="mt-4 col-span-3">
									<x-jet-label for="company" value="{{ __('Company') }}" />
									<x-jet-input id="company" class="block mt-1 w-full" type="text" name="company" value="{{$application->company}}" required autofocus />
								</div>

							</div>


							<label class="req py-4 pt-10 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Upload Requirements</label>


							<div class="mt-10">

								<div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
									<div class="space-y-1 text-center ">
										<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
											<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
										<div class="mx-auto justify-center text-gray-600">
											
											<div class="mb-3">
												<label class="form-label" for="inputImage">Select Files:</label>
												<div class="row">
			
													<div class="col-md-12">
														<div class="form-group">
															<input type="file" name="files[]" placeholder="Choose files" multiple>
														</div>
														@error('files')
														<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
														@enderror
													</div>
												</div>
											</div>
										</div>
										@foreach($files as $row)
											@if( $row->application_id == $application->id)
												<p>{{$row->name}}</p>
											@endif
										@endforeach
										<!--Display File Name-->
										<span id="file-chosen" class=" mx-auto justify-center font-sm text-gray-600"></span>

										<p class="text-xs text-gray-500">PNG, JPG, PDF or DOCX</p>
									</div>
								</div>
							</div>
							<div class="grid grid-cols-6  gap-4 pt-10">

								<!--Programs Selection-->
								<div class="mt-4 col-span-6">
									<label class="pb-4 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Subject Selection</label>

									<x-jet-label for="programs_id" value=" Programs" class="pt-6" />
									<select name="programs_id" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
										@foreach($programs as $row)
										@if( $row->id == $application->programs_id)
										<option selected class="block mt-1 w-full" value="{{ $application->programs_id }}">{{ $row->description}}</option>
										@endif
										@endforeach

										@foreach($programs as $row)
										<option class="block mt-1 w-full" name="programs_id" value="{{ $row->id}}">{{ $row->description}}</option>
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
										<option selected class="block mt-1 w-full" name="subject1" value="{{$application->subject1}}">{{ $prog->code}}: &emsp; {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
										@endif
										@endif
										@endforeach


										@endforeach
										<option value="" class="block mt-1 w-full">No Subject</option>
										@foreach($subjects as $row)
										@foreach($programs as $prog)
										@if($row->programs_id == $prog->id)
										<option class="block mt-1 w-full" name="subject1" value="{{$row->id}}">{{ $prog->code}}: &emsp; {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
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
										<option selected disabled class="block mt-1 w-full" name="subject2" value="{{$application->subject2}}">{{ $prog->code}}: &emsp; {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
										<option selected class="hidden block mt-1 w-full" name="subject2" value="{{$application->subject2}}">{{ $prog->code}}: &emsp; {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
										@endif
										@endif
										@endforeach


										@endforeach
										<option value="" class="block mt-1 w-full">No Subject</option>
										@foreach($subjects as $row)
										@foreach($programs as $prog)
										@if($row->programs_id == $prog->id)
										<option class="block mt-1 w-full" name="subject2" value="{{$row->id}}">{{ $prog->code}}: &emsp; {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
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
										<option selected disabled class="block mt-1 w-full" name="subject3" value="{{$application->subject3}}">{{ $prog->code}}: &emsp; {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
										<option selected class="hidden block mt-1 w-full" name="subject3" value="{{$application->subject3}}">{{ $prog->code}}: &emsp; {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
										@endif
										@endif
										@endforeach


										@endforeach
										<option value="" class="block mt-1 w-full">No Subject</option>
										@foreach($subjects as $row)
										@foreach($programs as $prog)
										@if($row->programs_id == $prog->id)
										<option class="block mt-1 w-full" name="subject3" value="{{$row->id}}">{{ $prog->code}}: &emsp; {{ $row->title}} &emsp; Units: {{ $row->units}}</option>
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

	<style>
		[x-cloak] {
			display: none
		}

		@media print {
			@page {
				margin: 0;
			}

			body {
				margin-left: -180px;
				margin-top: -200px;
				height: 100%;
				width: 110%;
			}

			nav {
				display: none;
			}

			header {
				visibility: hidden;
			}

			.content {
				margin: 0;
			}

			.btn {
				display: none;
			}

			.sidebar {
				display: none;
			}

			.req {
				display: none;
			}

			.req1 {
				visibility: hidden;
			}
		}
	</style>

	<!--Alert Timeout-->
	<script>
		setTimeout(function() {
			$("#alert").hide();
		}, 3000);
	</script>

</x-app-layout>