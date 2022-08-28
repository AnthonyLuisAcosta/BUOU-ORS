<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Programs') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

			<!--Container-->
			<div class="container w-full mx-auto px-2 ">

				@foreach ($programs as $program)
					@if($program->adviser == Auth::user()->id)

						<!--Program info -->
						<div class="shadow overflow-hidden sm:rounded-md pt-1 block mb-7 bg-gray-300">
							<div class="px-6 sm:p-5 font-semibold"> MY PROGRAM</div>
							<div class="px-4 py-5 bg-white sm:p-6">
								<div><strong>Code: </strong><span>{{ $program->code }}</span></div>
								<div><strong>Description: </strong><span>{{ $program->description }}</span></div>
								@foreach($terms as $term)
									@if($term->status == 1)
									<div><strong>Term: </strong>
										<span>{{$term->year.' '.$term->label}}</span></div>
									@endif
								@endforeach
							</div>
						</div>

					@endif
				@endforeach

				<!--Card-->
				<div class="shadow overflow-hidden sm:rounded-md pt-1 block mb-7 bg-gray-300">
				<div class="px-6 sm:p-5 font-semibold">ADMITTED APPLICANTS UNDER MY PROGRAM</div>
				<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
					<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
						<thead>
							<tr>
								<th data-priority="1">ID</th>
								<th data-priority="2">Name</th>
								<th data-priority="3">Email</th>
								<th data-priority="4">Phone</th>
							</tr>
						</thead>
						<tbody>
							@foreach($applications as $application)
							 @foreach($programs as $program)
							 	@if($application->programs_id == $program->id &&$application->status == 'Admitted' && $program->adviser == Auth::user()->id)
								<tr>
								<td>{{ $application->id }}</td>
								<td>{{ $application->firstName.' '. $application->lastName }}</td>
								<td>{{ $application->email }}</td>	
								<td>{{ $application->phone }}</td>
								</tr>
								@endif
								@endforeach
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
				<!--/Card-->
			</div>
			<!--/container-->

	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

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