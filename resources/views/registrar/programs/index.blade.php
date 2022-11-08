<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Programs') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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

			<!--Container-->
			<div class="container w-full mx-auto px-2">
				<!--Card-->
				<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
					<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
						<thead>
							<tr>
								<th data-priority="1">Code</th>
								<th data-priority="2">Program</th>
								<th data-priority="3">Program Adviser</th>
							</tr>
						</thead>
						<tbody>
							@foreach($programs as $program)
									<td>{{ $program->code }}</td>
									<td>{{ $program->description }}</td>
									<td>
                                        @foreach($users as $user)
                                            @if ($program->adviser == $user->id)                       
                                                    {{ $user->first_name.' '.$user->last_name }}                  
                                            @endif
                                        @endforeach
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