<x-app-layout>

	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Applications') }} | Edit
		</h2>
	</x-slot>

	<div>
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
			<div class="block mb-8">
				<a href="{{ route('admin.application.index') }}" class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">Back to list</a>
			</div>
			
			<div class="mt-5 md:mt-0 md:col-span-2">
				<form method="post" action="{{ route('admin.application.update', $application->id) }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="shadow overflow-hidden sm:rounded-md">
						<div class="px-4 py-5 bg-white sm:p-6 border-0">
							<!--Status-->
							<div class="mt-4 col-span-2 pb-16">
								<label class="font-bold mb-1 text-gray-700 block">Application Status</label>
								<select name="status" class="form-control block mt-1  text-gray-500 bg-white border-solid border-gray-300 rounded-md">
									<option hidden selected class=" text-gray">{{$application->status}}</option>
									<option class="block mt-1 w-full bg-blue-200" value="Pending">Pending</option>
									<option class="block mt-1 w-full bg-blue-200" value="Recommended">Recommend</option>
									<option class="block mt-1 w-full bg-green-200" value="Admitted">Admit</option>
									<option class="block mt-1 w-full bg-red-200" value="Rejected">Reject</option>
								</select>
							</div>

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
								<input type="file" name="applicantImage" />
							</div>
							<div class="grid grid-cols-6  gap-4 pt-10">

								<!--Subject Selection-->
								<div class="mt-4 col-span-6">
									<label class="pb-4 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Subject Selection</label>

									<x-jet-label for="programs_id" value=" Programs" class="pt-6" />
									<select name="programs_id" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
										@foreach($programs as $row)				
												@if( $row->id == $application->programs_id)
												<option  selected class="block mt-1 w-full" value="{{ $application->programs_id }}">{{ $row->description}}</option>
												@endif
										@endforeach
										
										@foreach($programs as $row)
										<option class="block mt-1 w-full" name="programs_id" value="{{ $row->id}}">{{ $row->description}}</option>
										@endforeach

									</select>
								</div>



							</div>
							<!--Button-->
							<div class="flex items-center justify-end px-4 bg-white text-right sm:px-6 py-6">
								<button class="m-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
									<input type="hidden" name="hidden_id" value="{{ $application->id }}" />
									<input type="submit" class="btn btn-primary" value="Update" />
								</button>
								<button class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">
									<a href="{{ route('admin.application.index') }}">Cancel</a>
								</button>
							</div>
						</div>
						<!--END OF GRID-->
					</div>
				</form>
			</div>
		</div>
	</div>

		
</x-app-layout>