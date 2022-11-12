<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Fees') }}
    </h2>
  </x-slot>
  <div>
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      @include('alert')
      <!--Container-->
      <div class="container w-full mx-auto px-2">
        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
          <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
              <tr>
                <th data-priority="1">Name of Admitted Applicant</th>
                <th data-priority="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($applications as $application)
              <tr class="text-center">
                <td class="text-center">{{ $application->lastName.', '.$application->firstName.' '.$application->middleName[0].'.'}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  @if($fees->isEmpty())
                  <a href="{{route ('registrar.fees.edit', $application->id)}} " class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Generate</a>
                  @else
                  @foreach($fees as $fee)
                  @if($fee->appRef_id == $application->id)
                  <button title="Fee for this applicant has already been generated. Please clear previous assement to generate new fee." class="inline text-blue-600 hover:text-blue-900 mr-2 cursor-not-allowed">Generate</button>
                  @else
                  <a href="{{route ('registrar.fees.edit', $application->id)}} " class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Generate</a>
                  @endif
                  @endforeach
                  @endif
                  <a href="{{route ('registrar.fees.show', $application->id)}} " class="text-amber-600 hover:text-amber-900 mb-2 mr-2">View</a>
                  <!-- Link to open the modal -->
                  <a href="#{{$application->id}}" rel="modal:open" class="text-red-600 hover:text-red-900 mr-2 cursor-pointer">Clear
                  </a>
                  <!--DELETE BUTTON-->
                  <div id="{{$application->id}}" class="modal">
                    <p>Are you sure you want to clear applicant's assessed fees?</p>
                    <div class="text-right">
                      <form class="inline-block" action="{{ route('registrar.fees.destroy', $application->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 hover:cursor-pointer active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" rel="modal:close" value="Yes">
                      </form>
                      <a href="" rel="modal:close" class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-600 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">Close</a>
                    </div>
                  </div>
                  <!--END OF DELETE BUTTON-->
                </td>
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
