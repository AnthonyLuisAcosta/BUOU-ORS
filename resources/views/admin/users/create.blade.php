<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Users') }} | <span class=" text-md text-gray-500">{{__('Create User')}}</span>
    </h2>
  </x-slot>
  <x-jet-validation-errors class="mb-4" />

  @if (session('status'))
  <div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
  </div>
  @endif

  <div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="block mb-8">
        <a href="{{ route('admin.users.index') }}" class="ml-1 inline-flex items-center px-4 py-1 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('admin.users.store') }}" method="post">
          @csrf
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6 border-0">
              <!--GRID-->
              <div class="grid grid-cols-2 grid-rows-3 gap-4">
                <!--First Name-->
                <div class="mt-4">
                  <x-jet-label for="name" value="{{ __('First Name') }}" />
                  <x-jet-input id="name" class="block mt-1 w-full" type="text" name="first_name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <!--Middle Name-->
                <div class="mt-4">
                  <x-jet-label for="name" value="{{ __('Middle Name') }}" />
                  <x-jet-input id="name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <!--Last Name-->
                <div class="mt-4">
                  <x-jet-label for="name" value="{{ __('Last Name') }}" />
                  <x-jet-input id="name" class="block mt-1 w-full" type="text" name="last_name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <!--Email-->
                <div class="mt-4">
                  <x-jet-label for="email" value="{{ __('Email') }}" />
                  <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                  <x-jet-label for="role" value="Role" />
                  <select id="role" name="role_id" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                    <option selected>Select an option</option>
                    @foreach($roles as $role)
                    <option class="block mt-1 w-full" value="{{$role->role_id}}">{{$role->role_name }}</option>
                    @endforeach
                  </select>
                </div>
                <!--Password-->
                <div class="mt-4">
                  <x-jet-label for="password" value="{{ __('Password') }}" />
                  <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                </div>
              </div>
            </div>
            <!--END OF GRID-->
            <!--Button-->
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Create
              </button>
              <button class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">
                <a href="{{ route('admin.users.index') }}">Cancel</a>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>
