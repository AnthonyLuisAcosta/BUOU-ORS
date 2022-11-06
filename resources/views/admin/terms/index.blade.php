<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Terms') }}
    </h2>
  </x-slot>
  <div>
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      @include('alert')
      <div class="flex items-center justify-end px-3 py-4">
        <a href="{{ route('admin.terms.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">Add Term</a>
      </div>
      <!--Container-->
      <div class="container w-full mx-auto px-2">
        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
          <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
              <tr>
                <th data-priority="1">Term</th>
                <th data-priority="2">Status</th>
                <th data-priority="3">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($terms as $term)
              <tr class="text-center">
                <td class="text-center">{{ $term->year.' '.$term->label }}</td>
                <!--0 is inactive, 1 is active-->
                @if($term->status == 0)
                <td class="text-center text-sm">
                  <p class="text-white rounded-md bg-amber-400">Inactive</p>
                </td>
                @else
                <td class="text-center text-sm">
                  <p class="text-white rounded-md bg-green-400">Active</p>
                </td>
                @endif
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                  <!--0 is inactive, 1 is active-->
                  @if($term->status == 0)
                  <!--ENABLE BUTTON-->
                  @if(in_array("1", $stat))
                  <button title="There is an active term. Please disable it before enabling another term." class="inline text-green-500 mr-2 cursor-not-allowed">Enable</button>
                  @else
                  <form class="inline" action="{{route('admin.terms.update', $term->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="1">
                    <input type="submit" class="text-green-500 mr-2 hover:cursor-pointer" value="Enable">
                  </form>
                  @endif
                  @else
                  <form class="inline" action="{{route('admin.terms.update', $term->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="0">
                    <input type="submit" class="text-amber-500 mr-2 hover:cursor-pointer" value="Disable">
                  </form>
                  @endif
                  <a href="{{ route('admin.terms.edit', $term->id) }}" class="text-indigo-600 mr-2">Edit</a>
                  <!-- Link to open the modal -->
                  <a href="#{{$term->id}}" rel="modal:open" class="text-red-600 mr-2 cursor-pointer">Delete</a>
                </td>
                <!--DELETE BUTTON-->
                <div id="{{$term->id}}" class="modal">
                  <p>Are you sure you want to delete account?</p>
                  <div class="text-right">
                    <form class="inline-block" action="{{ route('admin.terms.destroy', $term->id) }}" method="POST">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 hover:cursor-pointer active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" rel="modal:close" value="Yes">
                    </form>
                    <a href="" rel="modal:close" class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-600 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">Close</a>
                  </div>
                </div>
                <!--END OF DELETE BUTTON-->
                @endforeach
              </tr>
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
</x-app-layout>
