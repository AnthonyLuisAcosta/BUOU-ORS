<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Template') }} | <span class=" text-md text-gray-500">{{__('View')}}</span>
    </h2>
  </x-slot>
  <div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="block mb-8">
        <a href="{{ route('cashier.template.index') }}" class="ml-1 inline-flex items-center px-4 py-1 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-cyan-200 hover:bg-cyan-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg">
              <table class="min-w-full divide-y divide-gray-200 w-full">
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Type
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{$template->type}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Units
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{$template->units.''.".0"}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Admission Fee
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{"₱".''.number_format($template->admission).''.".00"}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Tuition Fee
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{"₱".''.number_format($template->tuition).''.".00"}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Matriculation Fee
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{"₱".''.number_format($template->matricula).''.".00"}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Medical/Dental Fee
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{"₱".''.number_format($template->medical).''.".00"}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Library Fee
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{"₱".''.number_format($template->library).''.".00"}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Athletic Fee
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{"₱".''.number_format($template->athletic).''.".00"}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Cultural Fee (PFD)
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{"₱".''.number_format($template->cultural).''.".00"}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Guidance Fee
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{"₱".''.number_format($template->guidance).''.".00"}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    SCUAA Fee
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{"₱".''.number_format($template->scuaa).''.".00"}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Distance Learning Fee
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    {{"₱".''.number_format($template->distLearn).''.".00"}}
                  </td>
                </tr>
                <tr class="border-b">
                  <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Grand Total
                  </th>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200 font-bold">
                    {{"₱".''.number_format($template->total).''.".00"}}
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
