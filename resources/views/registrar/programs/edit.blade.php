<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Programs') }} | <span class=" text-md text-gray-500">{{__('Edit Program')}}</span>
        </h2>
      </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Return Button -->
            <div class="block mb-8">
              <a href="{{ route('registrar.programs.index') }}" class="ml-1 inline-flex items-center px-4 py-1 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                  </svg>
                <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
                </a>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">

                <!-- Form -->
                <form action="{{ route('registrar.programs.update', $programs->id) }}" method="post">
                    @csrf
                    @method("PATCH")
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">

                            <!-- Code Field -->
                            <div class="mt-4">
                              <x-jet-label for="code" value="{{ __('Code') }}" />
                              <input type="text" name="code" id="code" type="text" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                   value="{{ old('code', $programs->code) }}" required = "code" />
                            </div>

                            <!-- Error Message -->
                            @error('code')
                              <p class="text-sm text-red-600">This code already exist</p>
                            @enderror
              
                            <!-- Description Field -->
                            <div class="mt-4">
                              <x-jet-label for="description" value="{{ __('Description') }}" />
                              <input type="text" name="description" id="description" type="text" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                   value="{{ old('description', $programs->description) }}" required ="description" />
                            </div>
                            
                            <!-- Program Adviser Field -->
                            <div class="mt-4">
                              <x-jet-label for="adviser" value="Program Adviser" />
                              <select id="adviser" name="adviser" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                @foreach ($users as $user)
                                  @if ($user->role_id == '4')
                                    <option selected class="block mt-1 w-full" value="{{ $user->id }}">
                                        {{ $user->first_name.' '.$user->last_name }}
                                    </option>
                                  @endif
                                @endforeach
                              </select>
                            </div>

                            <!-- Dean Field -->
                            <div class="mt-4">
                              <x-jet-label for="dean" value="Dean" />
                              <select id="dean" name="dean" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                @foreach ($users as $user)
                                  @if ($user->role_id == '3')
                                    <option selected class="block mt-1 w-full" value="{{ $user->id }}">
                                        {{ $user->first_name.' '.$user->last_name }}
                                    </option>
                                  @endif
                                @endforeach
                              </select>
                            </div>
                            
                            <!-- Registrar Field -->
                            <div class="mt-4">
                              <x-jet-label for="registrar" value="Registrar" />
                              <select id="registrar" name="registrar" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                @foreach ($users as $user)
                                  @if ($user->role_id == '2')
                                    <option selected class="block mt-1 w-full" value="{{ $user->id }}">
                                        {{ $user->first_name.' '.$user->last_name }}
                                    </option>
                                  @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                        
                        <!-- Update Button -->
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <button class="inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-green-200 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                            Save Changes
                          </button>
                        </div>
                    </div>
                </form>
                <!-- End of Form -->
            </div>
        </div>
    </div>
</x-app-layout>