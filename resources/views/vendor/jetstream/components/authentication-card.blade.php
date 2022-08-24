<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 bg-cover" style="background:url('/img/ORS_BG2.png');
            background-size: cover;">
  <div>
    {{ $logo }}
  </div>

  <div class="w-5/6 sm:w-1/3 mt-4 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    {{ $slot }}
  </div>
</div>
