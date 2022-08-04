<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Users') }} | <span class=" text-md text-gray-500">{{__('Edit User')}}</span>
    </h2>
  </x-slot>

  <div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="block mb-8">
        <a href="{{ route('admin.users.index') }}" class="ml-1 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">Back to list</a>
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
                  <x-jet-input id="name" class="block mt-1 w-full" type="text" name="first_name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{$user->first_name}}" />
                </div>
                <!--Middle Name-->
                <div class="mt-4">
                  <x-jet-label for="name" value="{{ __('Middle Name') }}" />
                  <x-jet-input id="name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{$user->middle_name}}" />
                </div>
                <!--Last Name-->
                <div class="mt-4">
                  <x-jet-label for="name" value="{{ __('Last Name') }}" />
                  <x-jet-input id="name" class="block mt-1 w-full" type="text" name="last_name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{$user->last_name}}" />
                </div>
                <!--Email-->
                <div class="mt-4">
                  <x-jet-label for="email" value="{{ __('Email') }}" />
                  <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="{{$user->email}}" />
                </div>

                <div class="mt-4">
                  <x-jet-label for="role" value="Role" />
                  <select id="role" name="role_id" class="block mt-1 w-full text-gray-500 bg-white border-solid border-gray-300 rounded-md">
                    @foreach($roles as $role)
                    @if($user->role_id == $role->role_id)
                    <option selected>{{$role->role_name }}</option>

                    @endif
                    @endforeach
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
                Save Changes
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
