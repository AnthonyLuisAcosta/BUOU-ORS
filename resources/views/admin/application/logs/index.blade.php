<x-app-layout>

	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Applications / Logs') }}
		</h2>
	</x-slot>
	<!-- Alert-->
	<!-- Alert-->
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
	<div>
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

			<div class="flex items-center justify-end px-3 py-4">
				
					<a href="{{ route('admin.application.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
							<path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
						</svg>
						<span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
					</a>
				

			</div>

			<!--Container-->
			<div class="container w-full mx-auto px-2">



				<!--Card-->
				<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white text-justify">


					<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
						<thead class="text-center">
							<tr>
								<th data-priority="1">Log ID</th>
								<th data-priority="2">User</th>
								<th data-priority="3">Activity</th>
								<th data-priority="3">Applicant</th>
								<th data-priority="4">Application ID</th>
								<th data-priority="5">Created at</th>
								<th data-priority="6">Updated at</th>

							</tr>
						</thead>
						<tbody>
							@foreach($logs as $row)
							
							<tr>
								<!--Filter Table-->
								<!--@/if($row['status']=="Pending")-->
								<td>{{ $row->id}}</td>

								@foreach($user as $a)
								@if($row->user == $a->id)
								<td>{{ $a->first_name}} {{ $a->last_name}}</td>
								@endif
								@endforeach

								<td>{{ $row->activity }}</td>
								@foreach($application as $app)
								@if($app->id == $row->application_id)
								<td>{{ $app->firstName.' '.$app->lastName }}</td>
								@endif
								@endforeach
								<td>{{ $row->application_id }}</td>





								<td class="text-sm">{{ $row->created_at }}</td>
								<td class="text-sm">{{ $row->updated_at }}</td>


								<!--@/endif-->

							</tr>
							@endforeach
						</tbody>
						<div id="count"></div>
					</table>


				</div>
				<!--/Card-->


			</div>
			<div wire:loading class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden bg-gray-700 opacity-75 flex flex-col items-center justify-center">
	<div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4"></div>
	<h2 class="text-center text-white text-xl font-semibold">Loading...</h2>
	<p class="w-1/3 text-center text-white">This may take a few seconds, please don't close this page.</p>
	</div>
			<!--/container-->
			<style>
				[x-cloak] {
					display: none
				}
			</style>

			<!-- jQuery -->
			<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


			<!--Datatables -->
			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
			<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
			<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
			<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
			<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

			<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

			<script>
				$(document).ready(function() {
					$('#example').DataTable({
						dom: 'Bfrtip',
						buttons: [{
								extend: 'copyHtml5',
								exportOptions: {
									columns: [0, 1, 2, 3, 4, 5]
								}
							},
							{
								extend: 'excelHtml5',
								exportOptions: {
									columns: [0, 1, 2, 3, 4, 5]
								}
							},
							{
								extend: 'pdfHtml5',
								exportOptions: {
									columns: [0, 1, 2, 3, 4, 5]
								}
							},
							'colvis'
						]
					});

				});
			</script>
</x-app-layout>