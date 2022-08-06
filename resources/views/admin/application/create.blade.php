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


	<!----------New Multistep Form-------------->
	<div class="container">

		<body class="">
			<form action="{{ route('admin.application.store') }}" method="post" class="">
				@csrf
				<div class="tab-wrap ">

					<!-- active tab on page load gets checked attribute -->
					<input type="radio" id="tab1" name="tabGroup1" class="tab" checked>
					<label for="tab1">Baic Information</label>

					<input type="radio" id="tab2" name="tabGroup1" class="tab">
					<label for="tab2">Upload Requirements</label>

					<input type="radio" id="tab3" name="tabGroup1" class="tab">
					<label for="tab3">Subject Selection</label>

					<div class="tab__content h-auto sm:p-6">
						<h3>Short Section</h3>
						<div class="mb-5 grid grid-cols-3 gap-4">
							<div class="mt-4">
								<x-jet-label for="firstName" value="{{ __('First Name') }}" />
								<x-jet-input id="firstName" class="block mt-1 w-full" type="text" name="firstName" :value="old('firstName')" required autofocus autocomplete="firstName" />
							</div>
							<div class="mt-4">
								<x-jet-label for="middleName" value="{{ __('Middle Name') }}" />
								<x-jet-input id="middleName" class="block mt-1 w-full" type="text" name="middleName" :value="old('middleName')" required autofocus autocomplete="middleName" />
							</div>


							<div>
								<label for="lastName" class="font-bold mb-1 text-gray-700 block">Last Name</label>
								<input type="text" required class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Mama" name="lastName" id="lastName">
							</div>
						</div>



						<div class="mb-5 grid grid-cols-2 gap-4">
							<div>
								<label for="date" class="font-bold mb-1 text-gray-700 block">Birth Date</label>
								<input type="date" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" name="birthDate" id="birthDate">
							</div>

							<div>
								<label for="gender" class="font-bold mb-1 text-gray-700 block">Gender</label>
								<select name="gender" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>

							<div class="col-span-2">
								<label for="email" class="font-bold mb-1 text-gray-700 block">Email</label>
								<input type="email" required class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="joemama@gmail.com" name="email" id="email">
							</div>

							<div>
								<label for="number" class="font-bold mb-1 text-gray-700 block">Contact Number</label>
								<input type="number" required class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="696969696969" name="phone" id="phone">
							</div>

							<div>
								<label for="email" class="font-bold mb-1 text-gray-700 block">Company</label>
								<input type="text" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Jollikod" name="company" id="company">
							</div>

							<div class="col-span-2">
								<label for="email" class="font-bold mb-1 text-gray-700 block">Address</label>
								<input type="text" class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="Dasma Cavite" name="address" id="address">
							</div>

						</div>




					</div>

					<div class="tab__content">
						<h3>Medium Section</h3>


						<div>
							<div class=" justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
								<div class="space-y-1 text-center">
									<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="True">
										<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
									<div class="text-sm text-gray-600 text-center flex">
										<label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
											<span>Upload a file</span>
											<input id="file-upload" name="file-upload" type="file" class="sr-only text-center">
										</label>
										<p class="pl-1">or drag and drop</p>
									</div>
									<p class="text-xs text-gray-500">
										PNG, JPG, GIF up to 10MB
									</p>
								</div>
							</div>
						</div>
					</div>


					<div class="tab__content">
						<h3>Long Section</h3>
						<p>Praesent nonummy mi in odio. Nullam accumsan lorem in dui. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Nullam accumsan lorem in dui. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>

						<p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Morbi mattis ullamcorper velit. Pellentesque posuere. Etiam ut purus mattis mauris sodales aliquam. Praesent nec nisl a purus blandit viverra.</p>

						<p>Praesent nonummy mi in odio. Nullam accumsan lorem in dui. Vestibulum turpis sem, aliquet eget, lobortis pellentesque, rutrum eu, nisl. Nullam accumsan lorem in dui. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>

						<p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Morbi mattis ullamcorper velit. Pellentesque posuere. Etiam ut purus mattis mauris sodales aliquam. Praesent nec nisl a purus blandit viverra.</p>
					</div>

				</div>
				<div>
					<button type="submit" value="submit" class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Complete</button>
				</div>

	</div>

	</form>
	</body>

	<style>
		.tab-wrap {

			border-radius: 6px;
			max-width: 100%;
			display: flex;
			flex-wrap: wrap;
			position: relative;
			list-style: none;
			background-color: #fff;
			margin: 40px 0;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
		}


		.tab {
			display: none;
		}

		.tab:checked:nth-of-type(1)~.tab__content:nth-of-type(1) {
			opacity: 1;

			position: relative;
			top: 0;
			z-index: 100;
			transform: translateY(0px);
			text-shadow: 0 0 0;
		}

		.tab:checked:nth-of-type(2)~.tab__content:nth-of-type(2) {
			opacity: 1;

			position: relative;
			top: 0;
			z-index: 100;
			transform: translateY(0px);
			text-shadow: 0 0 0;
		}

		.tab:checked:nth-of-type(3)~.tab__content:nth-of-type(3) {
			opacity: 1;

			position: relative;
			top: 0;
			z-index: 100;
			transform: translateY(0px);
			text-shadow: 0 0 0;
		}

		.tab:checked:nth-of-type(4)~.tab__content:nth-of-type(4) {
			opacity: 1;

			position: relative;
			top: 0;
			z-index: 100;
			transform: translateY(0px);
			text-shadow: 0 0 0;
		}

		.tab:checked:nth-of-type(5)~.tab__content:nth-of-type(5) {
			opacity: 1;

			position: relative;
			top: 0;
			z-index: 100;
			transform: translateY(0px);
			text-shadow: 0 0 0;
		}

		.tab:first-of-type:not(:last-of-type)+label {
			border-top-right-radius: 0;
			border-bottom-right-radius: 0;
		}

		.tab:not(:first-of-type):not(:last-of-type)+label {
			border-radius: 0;
		}

		.tab:last-of-type:not(:first-of-type)+label {
			border-top-left-radius: 0;
			border-bottom-left-radius: 0;
		}

		.tab:checked+label {
			background-color: #fff;
			box-shadow: 0 -1px 0 #fff inset;
			cursor: default;
		}

		.tab:checked+label:hover {
			box-shadow: 0 -1px 0 #fff inset;
			background-color: #fff;
		}

		.tab+label {
			box-shadow: 0 -1px 0 #eee inset;
			border-radius: 6px 6px 0 0;
			cursor: pointer;
			display: block;
			text-decoration: none;
			color: #333;
			flex-grow: 3;
			text-align: center;
			background-color: #f2f2f2;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			text-align: center;

			height: 50px;

			padding: 15px;
		}

		.tab+label:hover {
			background-color: #f9f9f9;
			box-shadow: 0 1px 0 #f4f4f4 inset;
		}

		.tab__content {
			padding: 10px 25px;
			background-color: transparent;
			position: absolute;
			width: 100%;
			z-index: -1;
			opacity: 0;
			left: 0;

			border-radius: 6px;
		}

		/* boring stuff */
		body {
			font-family: "Helvetica", sans-serif;
			background-color: #e7e7e7;
			color: #777;
			font-weight: 300;
		}

		.container {
			margin: 0 auto;
			display: block;
			min-width: 100%px;
			max-width: 1000px;
		}

		.container>*:not(.tab-wrap) {
			padding: 0 80px;
		}

		h2 {
			font-size: 1em;
		}

		h3 {
			font-weight: 400;
		}

		p {
			line-height: 1.6;
			margin-bottom: 20px;
		}
	</style>

	<br><br><br>
	<!--Form V2-->

	<div>
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
			<div class="block mb-8">
				<a href="{{ route('admin.application.index') }}" class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">Back to list</a>
			</div>
			<div class="mt-5 md:mt-0 md:col-span-2">
				<form action="{{ route('admin.application.store') }}" method="post">
					@csrf
					<div class="shadow overflow-hidden sm:rounded-md">
						<div class="px-4 py-5 bg-white sm:p-6 border-0">
							<label class="font-bold mb-1 text-gray-700 block">Applicant Information</label>
							<div class="grid grid-cols-6  gap-4 border-t-2 border-gray-200">
								<label class="font-medium mb-1 text-gray-600 pt-4 block col-span-6">Basic Information</label>
								<div class="mt-4 col-span-2">
									<x-jet-label class="" for="name" value="{{ __('First Name') }}" />
									<x-jet-input id="name" class="block mt-1 w-full" type="text" name="firstName" :value="old('name')" required autofocus autocomplete="name" />
								</div>
								<!--Middle Name-->
								<div class="mt-4 col-span-2">
									<x-jet-label for="name" value="{{ __('Middle Name') }}" />
									<x-jet-input id="name" class="block mt-1 w-full" type="text" name="middleName" :value="old('name')" required autofocus autocomplete="name" />
								</div>
								<!--Last Name-->
								<div class="mt-4 col-span-2 ">
									<x-jet-label for="name" value="{{ __('Last Name') }}" />
									<x-jet-input id="name" class="block mt-1 w-full" type="text" name="lastName" :value="old('name')" required autofocus autocomplete="name" />
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
										<option selected>Select an option</option>
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
													<label for="applcantImage" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
														<span>Upload a file</span>
														<input id="applcantImage" name="applcantImage" type="file" required autofocus>
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
									<button class="m-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
										Create
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