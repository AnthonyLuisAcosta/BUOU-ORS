<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Users') }} | <span class=" text-md text-gray-500">{{__('Edit User')}}</span>
    </h2>
  </x-slot>

  <div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="block mb-8">
        <a href="{{ route('admin.users.index') }}" class="ml-1 inline-flex items-center px-4 py-1  border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-cyan-200 hover:bg-cyan-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
          </svg>
          <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
        </a>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
          @csrf
          @method("PATCH")
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6 border-0">
              <!--GRID-->
              <div class="grid grid-cols-2 grid-rows-3 gap-4">
                <!--First Name-->
                <div class="mt-4">
                  <x-jet-label for="name" value="{{ __('First Name') }}" />
                  <x-jet-input id="name" class="block mt-1 w-full" type="text" name="first_name" required autofocus autocomplete="name" value="{{$user->first_name}}" />
                </div>
                <!--Middle Name-->
                <div class="mt-4">
                  <x-jet-label for="name" value="{{ __('Middle Name') }}" />
                  <x-jet-input id="name" class="block mt-1 w-full" type="text" name="middle_name" required autofocus autocomplete="name" value="{{$user->middle_name}}" />
                </div>
                <!--Last Name-->
                <div class="mt-4">
                  <x-jet-label for="name" value="{{ __('Last Name') }}" />
                  <x-jet-input id="name" class="block mt-1 w-full" type="text" name="last_name" required autofocus autocomplete="name" value="{{$user->last_name}}" />
                </div>
                <!--Email-->
                <div class="mt-4">
                  <x-jet-label for="email" value="{{ __('Email') }}" />
                  <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" required value="{{$user->email}}" />
                </div>

                <div class="mt-4">
                  <x-jet-label for="role" value="Role" />
                  <select id="role" name="role_id" class="block mt-1 w-full text-gray-800 bg-white border-solid border-gray-300 rounded-md">
                    @foreach($roles as $role)
                    @if($user->role_id == $role->role_id)
                    <option selected value="{{$role->role_id}}">{{$role->role_name }}</option>
                    @endif
                    @endforeach
                    @foreach($roles as $role)
                    <option class="block mt-1 w-full text-gray-500" value="{{$role->role_id}}">{{$role->role_name }}</option>
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
              <button class="inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-green-200 hover:bg-green-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                Save Changes
              </button>
              <button class="ml-1 inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest text-gray-800 shadow-md bg-red-200 hover:bg-red-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
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
