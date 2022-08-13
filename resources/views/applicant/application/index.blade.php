<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applications') }}
        </h2>
</x-slot>

<!-- Applicants allowed to submit only one application -->
<div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			
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
			<div class="flex items-center justify-end px-3 py-4">
					<a href="{{ route('application.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">New Application</a>
			</div>	
			
			@endif
			
		@else
		<div class="flex items-center justify-end px-3 py-4">
					<a href="{{ route('application.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">New Application</a>
		</div>	
		@endif
		

		<!--Container-->
		<div class="container w-full mx-auto px-2">

			

			<!--Card-->
			<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white text-justify">


				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead class="text-center">
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
										<tr>
									<!--Filter Table-->
									@if($row->applicant_id == Auth::user()->id)
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
											
											<td class="text-sm">{{ $row->updated_at }}</td>
											<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
												
												
											<a href="{{ route('application.show', $row->id) }}" class="text-white rounded-lg hover:bg-blue-900 mb-2 mr-2 bg-blue-400 py-1 px-3">View</a>
											@if ($row->status == "Pending")
											<a href="{{ route('application.edit', $row->id) }}" class="text-white rounded-lg hover:bg-indigo-900 mb-2 mr-2 bg-indigo-400 py-1 px-3">Edit</a>
											@endif
											@if ($row->status == "Rejected")
												<!--DELETE BUTTON-->
												<div id="{{$row->id}}" class="modal">
													<p>Are you sure you want to delete account?</p>
													<div class="text-right">
													<form class="inline-block" action="{{ route('application.destroy', $row->id) }}" method="POST">
														<input type="hidden" name="_method" value="DELETE">
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<input type="submit" class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" rel="modal:close" value="Yes">
													</form>
													<a href="" rel="modal:close" class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-600 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">Close</a>
													</div>
												</div>
												<!-- Link to open the modal -->
												<a href="#{{$row->id}}" rel="modal:open" class="text-white rounded-lg hover:bg-red-900 mb-2 mr-2 bg-red-400 py-1 px-2 cursor-pointer">Delete</a>
												<!--END OF DELETE BUTT-->
											@endif
											</td>
									
									@endif
						
										</tr>
							@endforeach
					</tbody>
				
				</table>


			</div>
			<!--/Card-->


		</div>
		<!--/container-->
<style>
	[x-cloak] { display: none }
</style>

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
	</script>
</x-app-layout>
