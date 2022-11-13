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
                <th data-priority="1">Name</th>
                <th data-priority="2">Status</th>
                <th data-priority="3">Total</th>
                <th data-priority="4">Balance</th>
                <th data-priority="5">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($fees as $fee)
              @foreach($applications as $application)
              @if($fee->appRef_id == $application->id)
              <tr class="text-center">
                <td class="text-center">{{$application->firstName.' '.$application->middleName[0].'.'.' '. $application->lastName}}</td>
                <td>
                  @if($fee->status == 0)
                  <p class="font-semibold text-red-500 text-sm">UNPAID</p>
                  @elseif($fee->status == 2)
                  <p class="font-semibold text-amber-500 text-sm">INSTALLMENT</p>
                  @else
                  <p class="font-semibold text-green-500 text-sm">PAID</p>
                  @endif
                </td>
                <td class="text-sm">₱{{number_format($fee->total,2)}}</td>
                <td class="text-sm">₱{{number_format($fee->balance,2)}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <a href="{{route ('cashier.fees.show', $fee->id)}} " class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                  @if($fee->balance == 0)
                  <!--hide update button-->
                  <!--
                  <button title="Fees have been fully paid." class="inline text-amber-600 hover:text-amber-900 mr-2 cursor-not-allowed">Update</button>
                  -->
                  @else
                  <a href="{{route ('cashier.fees.edit', $fee->id)}} " class="text-amber-600 hover:text-amber-900 mb-2 mr-2">Update</a>
                  @endif
                </td>
                @endif
                @endforeach
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
