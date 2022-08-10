<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subjects') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

			<!-- Alert-->
			@if (session ('success'))
			<div id="alert" class="flex p-4 mb-4 bg-blue-100 border-t-4 border-blue-500 dark:bg-blue-200" role="alert">
				<svg class="flex-shrink-0 w-5 h-5 text-blue-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				<div class="ml-3 font-medium text-blue-700">
				{{ session('success') }}
				</div>
			</div>
			@endif

			<div class="flex items-center justify-end px-3 py-4">
                <a href="{{ route('admin.subjects.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Add Subjects</a>
            </div>

			<!--Container-->
			<div class="container w-full mx-auto px-2">
			<!--Card-->
			<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
							<th data-priority="1">Code</th>
							<th data-priority="2">Title</th>
							<th data-priority="3">Category</th>
							<th data-priority="3">Program</th>
							<th data-priority="4">Professor</th>
							<!--<th data-priority="5">Units</th>
							<th data-priority="6">Term</th>-->
							<th data-priority="4">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($subjects as $subject)
								<td>{{ $subject->subj_code }}</td>
								<td>{{ $subject->title }}</td>
							
								@foreach($categories as $cat)
									@if($subject->cat_id == $cat->id)
										<td>{{ $cat->category }}</td>
									@endif
								@endforeach
								
								@foreach($programs as $program)
                					@if($subject->programs_id == $program->id)
										<td>{{ $program->description }}</td>
									@endif
								@endforeach
								<td>{{ $subject->prof }}</td>
								<!--<td>{{ $subject->units }}</td>
								<td>{{ $subject->term }}</td>-->
								
								<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
									<a href="{{ route('admin.subjects.show', $subject->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
									<a href="{{ route('admin.subjects.edit', $subject->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
									
									<!--DELETE BUTTON-->
									<div id="{{$subject->id}}" class="modal">
										<p>Are you sure you want to delete this subject?</p>
										<div class="text-right">
											<form class="inline-block" action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="submit" class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" rel="modal:close" value="Yes">
											</form>
											<a href="" rel="modal:close" class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-600 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">Close</a>
										</div>
									</div>

									<!-- Link to open the modal -->
									<a href="#{{$subject->id}}" rel="modal:open" class="text-red-600 hover:text-red-900 mb-2 mr-2 cursor-pointer">Delete</a>
									<!--END OF DELETE BUTTON-->
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

	<!-- jQuery Modal -->
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
	
	<!--Alert Timeout-->
	<script>
		setTimeout(function () {
			$("#alert").hide();
		}, 3000);
		
	</script>



</x-app-layout>