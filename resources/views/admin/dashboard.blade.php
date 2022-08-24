<x-app-layout>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DataTables </title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!--Replace with your tailwind.css once created-->

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <!-- Insert Content-->

  <!--Sample Content-->

  <div class="flex-wrap h-full">
    <!--WELCOME and TERM-->
    <div class="flex">
      <!--WELCOME-->
      <div class="w-1/2 mx-4 p-2">
        <div class="flex justify-center ">
          <div class="w-full px-10 py-4 bg-white rounded-lg shadow-lg">
            <h2 class="lg:text-xl md:text-lg sm:text-md text-xs font-bold tracking-tight">
              Welcome, {{Auth::user()->first_name}}!
            </h2>
            <div class="space-y-1 text-gray-500 font-bold focus:outline-none focus:underline lg:text-md md:text-sm sm:text-xs text-xs">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="hover:text-blue-400" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                  {{ __('Sign Out') }}
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--TERM-->
      <div class="w-1/2 mx-4 p-2">
        <div class="flex justify-center ">
          <div class="h-max w-full px-10 py-4 text-center bg-white rounded-lg shadow-lg">
            @foreach($terms as $term)
            @if($term->status == 1)
            <h2 class="lg:text-xl md:text-lg sm:text-md text-xs font-bold tracking-tight">
              {{$term->year.' '.$term->label}}
            </h2>
            @endif
            @endforeach
            <p class="space-y-1 text-gray-600 focus:outline-none focus:underline lg:text-md md:text-sm sm:text-xs text-xs">
              Active Term
            </p>
          </div>
        </div>
      </div>
    </div>
    <!--END-->
    <!--STATUS AND ANNOUNCEMENT-->
    <div class="flex justify-center">
      <!--STATUS-->
      <div class="w-1/2 sm:w-1/2 mx-4 p-2">
        <div class="block sm:flex justify-center">
          <div class="w-full mb-1 sm:w-1/3 p-0 sm:p-2">
            <div class="w-full px-0 py-2 sm:px-8 sm:py-10 bg-white rounded-lg shadow-lg hover:bg-gray-100 text-center">
              <h2 class="text-gray-600 text-xs sm:text-sm md:text-md lg:text-md font-bold leading-snug">
                Pending
              </h2>
              <p class="mt-0 sm:mt-2  text-sm sm:text-md md:text-lg lg:text-3xl font-extrabold text-orange-500">
                {{$pending}}
              </p>
            </div>
          </div>
          <div class="w-full mb-1 sm:w-1/3 p-0 sm:p-2">
            <div class="w-full px-0 py-2 sm:px-8 sm:py-10 bg-white rounded-lg shadow-lg hover:bg-gray-100 text-center">
              <h2 class="text-gray-600 text-xs sm:text-sm md:text-md lg:text-md font-bold leading-snug">
                Recommended
              </h2>
              <p class="mt-0 sm:mt-2 text-sm sm:text-md md:text-lg lg:text-3xl font-extrabold text-blue-400">
                {{$recommended}}
              </p>
            </div>
          </div>
          <div class="w-full mb-1 sm:w-1/3 p-0 sm:p-2">
            <div class="w-full px-0 py-2 sm:px-8 sm:py-10 bg-white rounded-lg shadow-lg hover:bg-gray-100 text-center">
              <h2 class="text-gray-600 text-xs sm:text-sm md:text-md lg:text-md font-bold leading-snug">
                Admitted
              </h2>
              <p class="mt-0 sm:mt-2 text-sm sm:text-md md:text-lg lg:text-3xl font-extrabold text-green-500">
                {{$admitted}}
              </p>
            </div>
          </div>
        </div>
        <div class="block sm:flex items-center justify-center">
          <div class="w-full mb-1 sm:w-1/3 p-0 sm:p-2">
            <div class="w-full px-0 py-2 sm:px-8 sm:py-10 bg-white rounded-lg shadow-lg hover:bg-gray-100 text-center">
              <h2 class="text-gray-600 text-xs sm:text-sm md:text-md lg:text-md font-bold leading-snug">
                Approved
              </h2>
              <p class="mt-0 sm:mt-2  text-sm sm:text-md md:text-lg lg:text-3xl font-extrabold text-yellow-400">
                {{$approved}}
              </p>
            </div>
          </div>
          <div class="w-full mb-1 sm:w-1/3 p-0 sm:p-2">
            <div class="w-full px-0 py-2 sm:px-8 sm:py-10 bg-white rounded-lg shadow-lg hover:bg-gray-100 text-center">
              <h2 class="text-gray-600 text-xs sm:text-sm md:text-md lg:text-md font-bold leading-snug">
                Rejected
              </h2>
              <p class="mt-0 sm:mt-2 text-sm sm:text-md md:text-lg lg:text-3xl font-extrabold text-red-400">
                {{$rejected}}
              </p>
            </div>
          </div>
        </div>
      </div>
      <!--ANNOUNCEMENT-->
      <div class="w-1/2 mx-4 p-2 ">
        <div class="flex justify-center">
          <div class="h-full w-full px-10 pt-8 pb-12 bg-white rounded-lg shadow-lg ">
            <h2 class="text-gray-900 text-xs sm:text-md md:text-lg lg:text-2xl font-bold leading-snug text-center">
              Announcement
            </h2>
            @foreach($announcement as $value)
            @if($value->title == 'default')
            <p class="whitespace-pre-line mt-2 text-xs sm:text-sm md:text-md lg:text-lg">
              {{$value->field}}
            </p>
            @endif
            @endforeach
            <!--MODAL EDIT FORM-->
            <div id="{{$value->id}}" class="modal p-20">
              <div>
                <form action="{{ route('admin.dashboard.update', $value->id) }}" method="POST">
                  @csrf
                  @method("PUT")
                  <div>
                    <input type="hidden" name="id" value="1">
                    <input type="hidden" name="title" value="default">
                    <label for="field" class="text-lg font-bold">Announcement Field</label>
                    <textarea id="field" class="mt-4 w-full rounded-lg h-48" type="field" name="field" placeholder="{{$value->field}}" required autofocus></textarea>
                  </div>
              </div>
              <div class="text-right mt-2">
                <input type="submit" class="hover:cursor-pointer text-green-500 hover:text-green-700 font-bold" rel="modal:close" value="Save Changes">
                </form>
                <a href="" rel="modal:close" class="ml-4 text-red-500 hover:text-red-700 font-bold">Cancel</a>
              </div>
            </div>
            <!--END MODAL-->
            <!--MODAL BUTTON-->
            <div class="text-right">
              <a href="#{{$value->id}}" rel="modal:open" class="bg-amber-200 hover:bg-amber-300 hover:text-black rounded-md px-4 py-1 text-xs lg:text-xs text-gray-700 cursor-pointer">EDIT</a>
            </div>
            <p class="mt-2 text-xs sm:text-sm md:text-md lg:text-lg">
              For a short tutorial on how to file an application and how the online admission system works please see :
              <a target="blank" href="https://www.youtube.com/watch?v=uU0E3IR4aY4" class="inline-block text-blue-700 hover:text-amber-500">BUOU Online Admission - Applicant's Guide</a>
            </p>
            <p class="mt-2 text-xs sm:text-sm md:text-md lg:text-lg">
              For the needed forms and attachments pls see:
              <a target="blank" href="https://drive.google.com/drive/folders/1z1yrEhX23tQ3uqBrRmUU9dPGtpqnGjuC?usp=sharing" class="inline-block text-blue-700 hover:text-amber-500">Required Forms - Google Drive</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!--END-->

  </div>
  <!-- jQuery -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  </x-app-layout->
