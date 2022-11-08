<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Subjects') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

			<!--Container-->
			<div class="container w-full mx-auto px-2">
			<!--Card-->
			<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
				<table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
							<th data-priority="1">Course Code</th>
							<th data-priority="2">Course Title</th>
							<th data-priority="3">Category</th>
							<th data-priority="3">Program</th>
							<th data-priority="4">Units</th>
							<th data-priority="5">Professor</th>
							<th data-priority="6">Term</th>
						</tr>
					</thead>
					<tbody>
						@foreach($subjects as $subject)
								<td>{{ $subject->subj_code }}</td>
								<td>{{ $subject->title }}</td>
							
								@foreach($categories as $category)
									@if($subject->cat_id == $category->id)
										<td>{{ $category->category }}</td>
									@endif
								@endforeach
								
								@foreach($programs as $program)
                					@if($subject->programs_id == $program->id)
										<td>{{ $program->description }}</td>
									@endif
								@endforeach

								<td>{{ $subject->units }}</td>
								<td>{{ $subject->prof }}</td>
								
								@foreach($terms as $term)
									@if($subject->term == $term->id)
										<td>{{$term->year.' '.$term->label}}</td>
									@endif
								@endforeach
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