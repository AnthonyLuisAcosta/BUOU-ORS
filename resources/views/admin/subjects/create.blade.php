<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Subjects') }} | <span class=" text-md text-gray-500">{{__('Add Subject')}}</span>
      </h2>
    </x-slot>
  
    <div>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="block mb-8">
          <a href="{{ route('admin.subjects.index') }}" class="ml-1 inline-flex items-center px-4 py-1 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
            </svg>
            <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
          </a>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="{{ route('admin.subjects.store') }}" method="post">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6 border-0">

                <!--GRID-->
                <div class="grid grid-cols-2 grid-rows-4 gap-4">

                  <!--Subject Code Field-->
                  <div class="mt-4">
                    <x-jet-label for="subj_code" value="{{ __('Code') }}" />
                    <x-jet-input id="subj_code" class="block mt-1 w-full" type="text" name="subj_code" :value="old('subj_code')" required autocomplete="subj_code" />
                  </div>

                  <!--Term Field-->
                  <!--<div class="mt-4">
                    <x-jet-label for="term" value="Term" />
                    <select id="term" name="term" required autocomplete="term" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option selected></option>
                        <option class="block mt-1 w-full" value="2022-2023, 1st Sem">2022-2023, 1st Sem</option>
                        <option class="block mt-1 w-full" value="2022-2023, 2nd Sem">2022-2023, 2nd Sem</option>
                    </select>
                  </div>-->

                  <!--Title Field-->
                  <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autocomplete="title" />
                  </div>

                  <!--Professor Field-->
                  <div class="mt-4">
                    <x-jet-label for="prof" value="{{ __('Professor') }}" />
                    <x-jet-input id="prof" class="block mt-1 w-full" type="text" name="prof" :value="old('prof')" required />
                  </div>
                
                  <!--Category Field-->
                  <div class="mt-4">
                    <x-jet-label for="cat_id" value="Category" />
                    <select id="cat_id" name="cat_id" required autocomplete="cat_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option selected></option>
                        @foreach ($categories as $category)
                          <option class="block mt-1 w-full" value="{{ $category->id }}">
                              {{ $category->category }}
                          </option>
                        @endforeach
                    </select>
                  </div>

                  <!--Units Field-->
                  <!--<div class="mt-4">
                    <x-jet-label for="units" value="{{ __('Units') }}" />
                    <x-jet-input id="units" class="block mt-1 w-full" type="number" name="units" :value="old('units')" required autocomplete="units" />
                  </div>-->

                  <!--Program Field-->
                  <div class="mt-4">
                    <x-jet-label for="programs_id" value="Program" />
                    <select id="programs_id" name="programs_id" required autocomplete="programs_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option selected></option>
                        @foreach ($programs as $program)
                            <option class="block mt-1 w-full" value="{{ $program->id }}">
                                {{ $program->description }}
                            </option>
                        @endforeach
                    </select>
                  </div>

                    <!--Enable/disable-->
                    <!--<div class="mt-4">
                        <label for="is_enabled" class="inline-flex relative items-center cursor-pointer">
                            <input type="checkbox" value="boolean" id="is_enabled" name="is_enabled" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Is enabled</span>
                        </label>
                    </div>-->
                </div>
              </div>
              <!--END OF GRID-->
              <!--Button-->
              <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                  Create
                </button>
                
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>

    <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
  </x-app-layout>
  