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
			<div class="block mb-8">
				<a href="{{ route('admin.application.index') }}" class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">Back to list</a>
			</div>
			<div class="mt-5 md:mt-0 md:col-span-2">
				<form action="{{ route('admin.application.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="shadow overflow-hidden sm:rounded-md">
						<div class="px-4 py-5 bg-white sm:p-6 border-0">
							<label class="font-bold mb-1 text-gray-700 block">Applicant Information</label>
							<div class="grid grid-cols-6  gap-4 border-t-2 border-gray-200">
								<label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Basic Information</label>
								<div class="mt-4 col-span-2">
									<x-jet-label class="" for="firstName" value="{{ __('First Name') }}" />
									<x-jet-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="firstName" />
								</div>
								<!--Middle Name-->
								<div class="mt-4 col-span-2">
									<x-jet-label for="middleName" value="{{ __('Middle Name') }}" />
									<x-jet-input id="middleName" class="block mt-1 w-full" type="text" name="middleName" :value="old('middleName')" required autofocus autocomplete="middleName" />
								</div>
								<!--Last Name-->
								<div class="mt-4 col-span-2 ">
									<x-jet-label for="lastName" value="{{ __('Last Name') }}" />
									<x-jet-input id="lastName" class="block mt-1 w-full" type="text" name="lastName" :value="old('lastName')" required autofocus autocomplete="lastName" />
								</div>
							</div>
							<div class="mt-10 col-span-6 border-t-2 border-gray-200"></div>

							<div class="grid grid-cols-6  gap-4 pb-10">
								
								<!--Birthdate-->
								<div class="mt-4 col-span-2">
									<x-jet-label for="birthDate" value="{{ __('Birth date') }}" />
									<x-jet-input id="birthDate" class="block mt-1 w-full" type="date" name="birthDate" :value="old('birthDate')" required autofocus autocomplete="birthDate" />
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
											<x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
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
												<div class="flex text-sm text-gray-600">
													<label for="applicantImage" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
														<span>Upload a file</span>
														<input id="applicantImage" name="applicantImage" type="file" required>
													</label>
													<p class="pl-1">or drag and drop</p>
												</div>
												<p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
											</div>
										</div>
									</div>
							
								


							<div class="grid grid-cols-6  gap-4 pt-10">
								
								<!--Subject Selection-->
								<div class="mt-4 col-span-6">
									<label class="pb-4 font-bold mb-1 text-gray-700 block border-b-2 border-gray-200">Subject Selection</label>

									<x-jet-label for="" value="" class="pt-6"/>
									<select name="" class="form-control block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
										<option selected>Select Subject</option>
										<option class="block mt-1 w-full" value="">Subject 1</option>
										<option class="block mt-1 w-full" value="">Subject 2</option>

									</select>
								</div>
								

								
							</div>
								<!--Button-->
								<div class="flex items-center justify-end px-4 bg-white text-right sm:px-6 py-6">
									<input type="submit" value="Add" class="m-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
									
									
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