<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Template') }} | <span class=" text-md text-gray-500">{{__('Create')}}</span>
    </h2>
  </x-slot>
  @include('alert')

  <div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="block mb-8">
        <a href="{{ route('cashier.template.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('cashier.template.store') }}" method="post">
          @csrf
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6 border-0">
              <!--GRID-->
              <div class="grid grid-cols-2 grid-rows-6 gap-4">
                <!--Degree Type-->
                <div class="mt-4">
                  <x-jet-label for="type" value="Degree Type" />
                  <select id="type" type="text" name="type" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                    <option selected>Select degree type</option>
                    <option class="block mt-1 w-full" value="Masteral">Masteral Degree</option>
                    <option class="block mt-1 w-full" value="Doctoral">Doctoral Degree</option>
                  </select>
                </div>
                <!--Units-->
                <div class="mt-4">
                  <x-jet-label for="type" value="Units" />
                  <select id="role" type="number" name="units" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                    <option selected>Select units</option>
                    <option class="block mt-1 w-full" value="3.0">3.0</option>
                    <option class="block mt-1 w-full" value="6.0">6.0</option>
                    <option class="block mt-1 w-full" value="9.0">9.0</option>
                    <option class="block mt-1 w-full" value="12.0">12.0</option>
                  </select>
                </div>
                <!--Admission Fee-->
                <div class="mt-4">
                  <x-jet-label for="admission" value="{{ __('Admission Fee (₱)') }}" />
                  <x-jet-input id="admission" class="block mt-1 w-full amount" type="number" step="0.01" name="admission" required autofocus />
                </div>
                <!--Tuition Fee-->
                <div class="mt-4">
                  <x-jet-label for="tuition" value="{{ __('Tuition Fee (₱)') }}" />
                  <x-jet-input id="tuition" class="block mt-1 w-full amount" type="number" step="0.01" name="tuition" required autofocus />
                </div>
                <!--Matricula Fee-->
                <div class="mt-4">
                  <x-jet-label for="matricula" value="{{ __('Matriculation Fee (₱)') }}" />
                  <x-jet-input id="matricula" class="block mt-1 w-full amount" type="number" step="0.01" name="matricula" required autofocus />
                </div>
                <!--Medical Fee-->
                <div class="mt-4">
                  <x-jet-label for="medical" value="{{ __('Medical/Dental Fee (₱)') }}" />
                  <x-jet-input id="medical" class="block mt-1 w-full amount" type="number" step="0.01" name="medical" required autofocus />
                </div>
                <!--library Fee-->
                <div class="mt-4">
                  <x-jet-label for="library" value="{{ __('Library Fee (₱)') }}" />
                  <x-jet-input id="library" class="block mt-1 w-full amount" type="number" step="0.01" name="library" required autofocus />
                </div>
                <!--athletic Fee-->
                <div class="mt-4">
                  <x-jet-label for="athletic" value="{{ __('Athletic Fee (₱)') }}" />
                  <x-jet-input id="athletic" class="block mt-1 w-full amount" type="number" step="0.01" name="athletic" required autofocus />
                </div>
                <!--cultural Fee-->
                <div class="mt-4">
                  <x-jet-label for="cultural" value="{{ __('Cultural Fee (₱)') }}" />
                  <x-jet-input id="cultural" class="block mt-1 w-full amount" type="number" step="0.01" name="cultural" required autofocus />
                </div>
                <!--guidance Fee-->
                <div class="mt-4">
                  <x-jet-label for="guidance" value="{{ __('Guidance Fee (₱)') }}" />
                  <x-jet-input id="guidance" class="block mt-1 w-full amount" type="number" step="0.01" name="guidance" required autofocus />
                </div>
                <!--scuaa Fee-->
                <div class="mt-4">
                  <x-jet-label for="scuaa" value="{{ __('SCUAA Fee (₱)') }}" />
                  <x-jet-input id="scuaa" class="block mt-1 w-full amount" type="number" step="0.01" name="scuaa" required autofocus />
                </div>
                <!--distLearn Fee-->
                <div class="mt-4">
                  <x-jet-label for="distLearn" value="{{ __('Distance Learning Fee (₱)') }}" />
                  <x-jet-input id="distLearn" onblur="findTotal()" class="block mt-1 w-full amount" type="number" step="0.01" name="distLearn" required autofocus />
                </div>
                <!--Grand Total-->
                <div hidden>
                  <x-jet-label for="total" value="{{ __('Grand Total') }}" />
                  <x-jet-input id="total" type="number" name="total" value="0" />
                </div>
              </div>
              <!--END OF GRID-->
              <!--Button-->
              <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 mt-4">
                <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-green-200 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                  Create
                </button>
                <button class="ml-1 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-red-200 hover:bg-red-400 hover:text-gray-200">
                  <a href="{{ route('cashier.template.index') }}">Cancel</a>
                </button>
              </div>
            </div>
        </form>
        <div>
        </div>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>
