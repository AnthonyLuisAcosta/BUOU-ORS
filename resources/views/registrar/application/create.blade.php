<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applications') }}
        </h2>
</x-slot>

<div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			
		<div class="block mb-8">
			<a href="{{ route('registrar.application.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>

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
					@if($row->status == "Enrolled")
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
											@elseif($row->status == "Processed")
												<td>
												<span class="inline-flex justify-center items-center px-5 py-1 ml-3 text-sm font-medium  rounded-full bg-green-400 text-white">{{ $row->status }}</span>
												</td>
											@elseif($row->status == "Enrolled")
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
												
												
												<a href="{{ route('registrar.application.show', $row->id) }}" class="text-white rounded-lg hover:bg-blue-900 mb-2 mr-2 bg-blue-400 py-1 px-2">View</a>
												
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
	</script>

	    <style>
			[x-cloak] { display: none }
		</style>

</x-app-layout>