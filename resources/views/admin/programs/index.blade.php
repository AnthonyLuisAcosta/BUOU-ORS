<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Programs') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			
            <div class="flex items-center justify-end px-3 py-4">
                <a href="{{ route('admin.programs.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">New Program</a>
            </div>

		<!--Container-->
		<div class="container w-full mx-auto px-2">

			

			<!--Card-->
			<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
							<th data-priority="1">CODE</th>
							<th data-priority="2">DESCRIPTION</th>
							<th data-priority="3">CREATED AT</th>
							<th data-priority="4">UPDATED AT</th>
							<th data-priority="5">ACTION</th>
						</tr>
					</thead>
					<tbody>
						@foreach($programs as $program)
											<td>{{ $program->code }}</td>
											<td>{{ $program->description }}</td>
											<td>{{ $program->created_at }}</td>
											<td>{{ $program->updated_at }}</td>
											<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
												<a href="{{ route('admin.programs.show', $program->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
												<a href="{{ route('admin.programs.edit', $program->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
												<form class="inline-block" action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
													<input type="hidden" name="_method" value="DELETE">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
												</form>
											</td>
										</tr>
									@endforeach
					</tbody>

				</table>


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