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
  <div>
    <h2 class="font-semibold text-lg text-gray-800 leading-tight">Welcome {{Auth::user()->first_name}}!</h2>
  </div>
  <div class="flex flex-rows">
    <div class="w-2/3 m-4 p-4">
      <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-2 p-2">Status</h2>
      <div class="flex items-center justify-center">
        <div class="w-1/3 p-2 ">
          <div class="max-w-md px-8 py-10 bg-white rounded-lg shadow-lg hover:bg-gray-100 ">
            <h2 class="text-gray-900 text-2xl font-bold leading-snug">
              Application Status
            </h2>
            <p class="mt-2 text-lg">
              Status
            </p>
            <a href="#" class="mt-6 inline-block text-blue-700">Read more</a>
          </div>
        </div>
        <div class="w-1/3 p-2 ">
          <div class="max-w-md px-8 py-10 bg-white rounded-lg shadow-lg hover:bg-gray-100 ">
            <h2 class="text-gray-900 text-2xl font-bold leading-snug">
              Application Status
            </h2>
            <p class="mt-2 text-lg">
              Status
            </p>
            <a href="#" class="mt-6 inline-block text-blue-700">Read more</a>
          </div>
        </div>
        <div class="w-1/3 p-2 ">
          <div class="max-w-md px-8 py-10 bg-white rounded-lg shadow-lg hover:bg-gray-100 ">
            <h2 class="text-gray-900 text-2xl font-bold leading-snug">
              Application Status
            </h2>
            <p class="mt-2 text-lg">
              Status
            </p>
            <a href="#" class="mt-6 inline-block text-blue-700">Read more</a>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-center">
        <div class="w-1/3 p-2 ">
          <div class="max-w-md px-8 py-10 bg-white rounded-lg shadow-lg hover:bg-gray-100 ">
            <h2 class="text-gray-900 text-2xl font-bold leading-snug">
              Application Status
            </h2>
            <p class="mt-2 text-lg">
              Status
            </p>
            <a href="#" class="mt-6 inline-block text-blue-700">Read more</a>
          </div>
        </div>
        <div class="w-1/3 p-2 ">
          <div class="max-w-md px-8 py-10 bg-white rounded-lg shadow-lg hover:bg-gray-100 ">
            <h2 class="text-gray-900 text-2xl font-bold leading-snug">
              Application Status
            </h2>
            <p class="mt-2 text-lg">
              Status
            </p>
            <a href="#" class="mt-6 inline-block text-blue-700">Read more</a>
          </div>
        </div>
      </div>
    </div>
    <div class="w-1/3 m-4 mb-4 p-4">
      <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-2 p-2">Announcement</h2>
      <div class="flex">
        <!-- Wrapper div with a height greater than the contents -->
        <div class="min-h-screen flex items-center justify-center bg-gray-100">
          <!-- Card or contents that should be centered vertically -->
          <div class="max-w-md px-10 py-12 bg-white rounded-lg shadow-lg">
            <h2 class="text-gray-900 text-2xl font-bold leading-snug">
              Getting Started with Tailwind CSS Custom Forms
            </h2>
            <p class="mt-2 text-lg">
              In this tutorial, I show you how to install the Tailwind CSS Custom Forms
              plugin and get started using it.
            </p>
            <a href="#" class="mt-6 inline-block text-blue-700">Read more</a>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
