<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applications') }}
        </h2>
</x-slot>

<div>
<a href ="{{ route('dean.application.status')}}" class="btn btn-success">Approve all</a>

	<div class="inline-flex justify-end">
			@php
				$count = 0
			@endphp
		@foreach($application as $app)
		<form method="post" action="{{ route('dean.application.update', $app->id) }}">
			@csrf
			@method('PUT')
		
		

		<input type="submit" class="hidden" name="status" value="Approved" />
		
		@endforeach
		<div class="block mb-8">
			<button class="">
				<input type="hidden" name="submit" value="Approved" />
				<a name="submit" class="ml-1 inline-flex items-center px-4 py-2 bg-green-400 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">Approve</a>
		</button>
</form>
			@php
				$count++
			@endphp
		

	
            </div>
        

		
	</div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			
            <div class="flex items-center justify-end px-3 py-4"></div>

		<!--Container-->
		<div class="container w-full mx-auto px-2">

			

			<!--Card-->
			<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow text-center bg-white">


				<table id="example" class="stripe hover " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
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
					@if($row->status == "Recommended")
												
										<tr>
									<!--Filter Table-->
									<!--@/if($row['status']=="Pending")-->
											<td>{{ $row->firstName.' '.$row->lastName }}</td>
											<td>{{ $row->email }}</td>

											@if($row->status == "Pending")
											<td style="color:#f97316">{{ $row->status }}</td>
										@elseif($row->status == "Recommended")
											<td class="text-blue-500 ">{{ $row->status }}</td>
										@elseif($row->status == "Approved")
											<td class="text-yellow-500 ">{{ $row->status }}</td>
										@elseif($row->status == "Admitted")
											<td class="text-green-500">{{ $row->status }}</td>
										@endif
										
											@foreach($programs as $program)
													@if($row->programs_id == $program->id)
														<td class="text-left">{{ $program->description }}</td>
													@endif
											@endforeach
											
											<td>{{ $row->updated_at }}</td>
											<td class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium">
											<a href="{{ route('dean.application.show', $row->id) }}" class="text-white rounded-lg hover:bg-blue-900 mb-2 mr-2 bg-blue-400 py-1 px-3">View</a>
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
