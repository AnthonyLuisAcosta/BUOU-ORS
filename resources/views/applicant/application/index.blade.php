<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applications') }}
        </h2>
</x-slot>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pr-5">
			
			@if (session ('success'))
			<div id="alert" class="flex p-4 mb-4 z-50 bg-green-200 border-t-4 dark:bg-green-200" role="alert">
				<svg class="flex-shrink-0 w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
				</svg>
				<div class="ml-3 font-medium text-gray-700">
					{{ session('success') }}
				</div>
			</div>
			@endif
					
		@if ($application->isNotEmpty())
		
		@php
			$count = 0
		@endphp
		
    			
			@foreach ($application as $app )
				@if ($app->applicant_id == Auth::user()->id)
						@php
							$count++
						@endphp
						
				@endif
			@endforeach

	

					@if ( $count < "1")
					<div style="margin-left: 300px;">
					<div class="flex items-center justify-end px-3 py-4">
							<a href="{{ route('application.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">New Application</a>
					</div>	
					</div>
					@endif
				
				@else
				<div class="flex items-center justify-end px-3 py-4">
							<a href="{{ route('application.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">New Application</a>
				</div>	
				@endif

</div>
@php
	$applicant_id = Auth::user()->id
@endphp
<div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			
            <div class="flex items-center justify-end px-3 py-4"></div>

		<!--Container-->
		<div class="container w-full mx-auto px-2">

			

			<!--Card-->
			<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
							<th data-priority="1">Name</th>
							<th data-priority="2">Email</th>
							<th data-priority="2">Status</th>
							<th data-priority="3">Program</th>
							<th data-priority="4">Updated at</th>
							<th data-priority="5">Action</th>
						</tr>
					</thead>
					<tbody>
					@foreach($application as $row)
					@if($row->applicant_id == $applicant_id)
										<tr>
									<!--Filter Table-->
									<!--@/if($row['status']=="Pending")-->
											<td>{{ $row->firstName.' '.$row->lastName }}</td>
											<td>{{ $row->email }}</td>
											
											@if($row->status == "Pending")
												<td >
												<span style="background-color: rgb(253 186 116);" class="inline-flex justify-center items-center px-5 py-1 ml-3 text-sm font-medium  rounded-full text-white">{{ $row->status }}</span>
												</td>
											@elseif($row->status == "Recommended")
												<td>
												<span class="inline-flex justify-center items-center px-5 py-1 ml-3 text-sm font-medium  rounded-full bg-blue-400 text-white">{{ $row->status }}</span>
												</td>
											@elseif($row->status == "Approved")
												<td>
												<span class="inline-flex justify-center items-center px-5 py-1 ml-3 text-sm font-medium  rounded-full bg-yellow-300 text-white">{{ $row->status }}</span>
												</td>
											@elseif($row->status == "Admitted")
												<td>
												<span class="inline-flex justify-center items-center px-5 py-1 ml-3 text-sm font-medium  rounded-full bg-green-400 text-white">{{ $row->status }}</span>
												</td>
											@elseif($row->status == "Rejected")
												<td>
												<span class="inline-flex justify-center items-center px-5 py-1 ml-3 text-sm font-medium  rounded-full bg-red-400 text-white">{{ $row->status }}</span>
												</td>
											@endif
											@foreach($programs as $program)
													@if($row->programs_id == $program->id)
														<td class="text-left">{{ $program->description }}</td>
													@endif
											@endforeach
											
											<td>{{ $row->updated_at }}</td>
											<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
												
												
												<a href="{{ route('adviser.application.show', $row->id) }}" class="text-white rounded-lg hover:bg-blue-900 mb-2 mr-2 bg-blue-400 py-1 px-2">View</a>
												<a href="{{ route('adviser.application.edit', $row->id) }}" class="text-white rounded-lg hover:bg-indigo-900 mb-2 mr-2 bg-indigo-400 py-1 px-3">Edit</a>
												
											</td>
									
									<!--@/endif-->
						
										</tr>
									@endif
							@endforeach
					</tbody>
				
				</table>


			</div>
			<!--/Card-->


		</div>
		<!--/container-->

	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});

			//Alert Timeout
	
			setTimeout(function () {
			$("#alert").hide();
		}, 3000);
		
	</script>

<style>
	[x-cloak] { display: none }
</style>

</x-app-layout>
