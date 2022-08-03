<x-app-layout>
    @if($message = Session::get('success'))

<div class="alert alert-success">
    {{ $message }}
</div>

@endif

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			
            <div class="flex items-center justify-end px-3 py-4">
                <a href="{{ route('admin.application.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">New Application</a>
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
                            <th data-priority="2">Gender</th>
							<th data-priority="3">CREATED AT</th>
							<th data-priority="4">UPDATED AT</th>
							<th data-priority="5">ACTION</th>
						</tr>
                        
					</thead>
					<tbody>
                        @if(count($data) > 0)
						@foreach($data as $row)
											<td>{{ $row->firstName.' '.$row->lastName }}</td>
											<td>{{ $row->email }}</td>
                                            <td>{{ $row->gender }}</td>
											<td>{{ $row->created_at }}</td>
											<td>{{ $row->updated_at }}</td>
											<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
												<a href="{{ route('admin.application.show', $row->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
												<a href="{{ route('admin.application.edit', $row->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
												<form class="inline-block" action="{{ route('admin.application.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
													<input type="hidden" name="_method" value="DELETE">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
												</form>
											</td>
										</tr>
									@endforeach           
					</tbody>
                    @else
                     <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                     </tr>
                     @endif

				</table>
                {!! $data->links() !!}


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
