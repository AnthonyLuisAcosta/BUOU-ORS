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

  <div class="h-screen">
    <!--WELCOME and TERM-->
    <div class="flex">
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
    <div class="flex">
      <div class="w-1/2 mx-4 p-2">
        <div class="flex justify-center">
          <div class="h-full w-full px-8 py-10 bg-white rounded-lg shadow-lg hover:bg-gray-100 text-center">
            <h2 class="text-gray-600 text-xs sm:text-sm md:text-md lg:text-md font-bold leading-snug">
              Admitted
            </h2>
            <p class="mt-2 text-md sm:text-lg md:text-xl lg:text-3xl font-extrabold text-green-500">
              {{$admitted}}
            </p>
          </div>
        </div>
      </div>
      <div class="w-1/2 mx-4 p-2 ">
        <div class="flex justify-center">
          <div class="h-max w-full px-10 pt-8 pb-12 bg-white rounded-lg shadow-lg ">
            <h2 class="text-gray-900 text-xs sm:text-sm md:text-md lg:text-2xl font-bold leading-snug text-center">
              Announcement
            </h2>
            @foreach($announcement as $value)
            @if($value->title == 'default')
            <p class="whitespace-pre-line mt-2 text-xs sm:text-sm md:text-md lg:text-lg">
              {{$value->field}}
            </p>
            @endif
            @endforeach
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

</x-app-layout>
