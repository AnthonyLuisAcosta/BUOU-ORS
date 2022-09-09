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
                <th data-priority="1">Applicant</th>
                <th data-priority="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($applications as $application)
              <tr class="text-center">
                <td class="text-center">{{ $application->lastName.', '.$application->firstName.' '.$application->middleName[0].'.'}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <a href="{{ route('registrar.fees.show', $application->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Generate</a></td>
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
