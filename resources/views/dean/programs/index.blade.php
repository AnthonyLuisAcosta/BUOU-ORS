<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('My Program') }}
      </h2>
  </x-slot>

  <div>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="flex items-center justify-end px-3 py-4">
          <a href="{{ route('dean.programs.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">View all Programs</a>
      </div>

    <!--Container-->
    <div class="container w-full mx-auto px-2 ">

          <!--Program info -->
          <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
              <thead>
                <tr>
                  <th data-priority="1">Code</th>
                  <th data-priority="2">Description</th>
                  <th data-priority="3">Term</th>
                  <th data-priority="4">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($programs as $program)
                  @if($program->adviser == Auth::user()->id)
                  <tr>
                  <td>{{ $program->code }}</td>
                  <td>{{ $program->description}}</td>
                  @foreach($terms as $term)
                    @if($term->status == 1)
                      <td>{{$term->year.' '.$term->label}}</td>
                    @endif
                  @endforeach
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="{{ route('dean.programs.edit', $program->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View Subjects</a>
                    <a href="{{ route('dean.programs.show', $program->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">View Admitted Applicants</a>
                  </td>
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>

      
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