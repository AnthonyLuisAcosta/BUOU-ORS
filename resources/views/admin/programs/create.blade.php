<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Programs') }} | <span class=" text-md text-gray-500">{{__('Create Program')}}</span>
    </h2>
  </x-slot>

  <div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    @if (session ('error'))
			<div id="alert" class="flex p-4 mb-4 bg-red-500 dark:bg-red-200" role="alert">
				<svg class="flex-shrink-0 w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
				<div class="ml-3 font-medium text-white">
				{{ session('error') }}
			</div>
			</div>
			@endif

      <!-- Return Button -->
      <div class="block mb-8">
        <a href="{{ route('admin.programs.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
            </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
          </a>
      </div>

      <div class="mt-5 md:mt-0 md:col-span-2">

        <!-- Form -->
        <form action="{{ route('admin.programs.store') }}" method="post">
          @csrf
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">

              <!-- Code field -->
              <div class="mt-4">
                <x-jet-label for="code" value="{{ __('Code') }}" />
                <x-jet-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autocomplete="code" />
              </div>

              <!-- Error Message -->
              @error('code')
                <p class="text-sm text-red-600">This code already exist</p>
              @enderror
              

              <!-- Description field -->
              <div class="mt-4">
                <x-jet-label for="description" value="{{ __('Description') }}" />
                <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autocomplete="description" />
              </div>
              
              <!-- Program Adviser field -->
              <div class="mt-4">
                <x-jet-label for="adviser" value="Program Adviser" />
                <select id="adviser" name="adviser" required autocomplete="adviser" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                  <option selected></option>
                  @foreach ($users as $user)
                    @if ($user->role_id == '4' || $user->role_id == '3')
                      <option class="block mt-1 w-full" value="{{ $user->id }}">
                          {{ $user->first_name.' '.$user->last_name }}
                      </option>
                    @endif
                  @endforeach
                </select>
              </div>

              <!-- Dean field -->
              <div class="mt-4">
                <x-jet-label for="dean" value="Dean" />
                <select id="dean" name="dean" required autocomplete = "dean" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                  <option selected></option>
                  @foreach ($users as $user)
                    @if ($user->role_id == '3')
                      <option class="block mt-1 w-full" value="{{ $user->id }}">
                          {{ $user->first_name.' '.$user->last_name }}
                      </option>
                    @endif
                  @endforeach
                </select>
              </div>
      

              <!-- Registrar field -->
              <div class="mt-4">
                <x-jet-label for="registrar" value="Registrar" />
                <select id="registrar" name="registrar" required autocomplete = "registrar" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                  <option selected></option>
                  @foreach ($users as $user)
                    @if ($user->role_id == '2')
                      <option class="block mt-1 w-full" value="{{ $user->id }}">
                          {{ $user->first_name.' '.$user->last_name }}
                      </option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            
            <!-- Create Button -->
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-green-200 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                Create
              </button>
          </div>
        </form>
        <!-- End of Form -->
      </div>
    </div>
  </div>
</x-app-layout>
