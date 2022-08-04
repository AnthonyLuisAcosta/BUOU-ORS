<Head>
  <nav x-data="{ open: false }" class="bg-white border-b border-gray-200 fixed">
    <!-- Primary Navigation Menu -->
    <div class="max-w-screen w-screen mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <!-- Logo -->
          <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
              <x-jet-application-mark class="block h-3 w-auto" />
            </a>
          </div>

          <!-- Navigation Links -->
          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

          </div>
        </div>

        <div class="hidden sm:flex sm:items-center">
          <!-- Teams Dropdown -->
          @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
          <div class="ml-3 relative">
            <x-jet-dropdown align="right" width="60">
              <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                  <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                    {{ Auth::user()->currentTeam->name }}

                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </span>
              </x-slot>

              <x-slot name="content">
                <div class="w-60">
                  <!-- Team Management -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Team') }}
                  </div>

                  <!-- Team Settings -->
                  <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                    {{ __('Team Settings') }}
                  </x-jet-dropdown-link>

                  @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                  <x-jet-dropdown-link href="{{ route('teams.create') }}">
                    {{ __('Create New Team') }}
                  </x-jet-dropdown-link>
                  @endcan

                  <div class="border-t border-gray-100"></div>

                  <!-- Team Switcher -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Switch Teams') }}
                  </div>

                  @foreach (Auth::user()->allTeams() as $team)
                  <x-jet-switchable-team :team="$team" />
                  @endforeach
                </div>
              </x-slot>
            </x-jet-dropdown>
          </div>
          @endif

          <!-- Settings Dropdown -->
          <div class="ml-3 relative">
            <x-jet-dropdown align="right" width="48">
              <x-slot name="trigger">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                  <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </button>
                @else
                <span class="inline-flex rounded-md">
                  <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                    {{ Auth::user()->first_name. ' ' . Auth::user()->last_name }}

                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </span>
                @endif
              </x-slot>

              <x-slot name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                  {{ __('Manage Account') }}
                </div>

                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                  {{ __('Profile') }}
                </x-jet-dropdown-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                  {{ __('API Tokens') }}
                </x-jet-dropdown-link>
                @endif

                <div class="border-t border-gray-100"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf

                  <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                  </x-jet-dropdown-link>
                </form>
              </x-slot>
            </x-jet-dropdown>
          </div>
        </div>

        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden">
          <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
      <div class="pt-2 pb-3 space-y-1">
        <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
          {{ __('Dashboard') }}
        </x-jet-responsive-nav-link>
      </div>



      <!-- Responsive Settings Options -->
      <div class="pt-4 pb-1 border-t border-gray-200">
        <div class="flex items-center px-4">
          @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
          <div class="shrink-0 mr-3">
            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
          </div>
          @endif

          <div>
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
          </div>
        </div>

        <div class="mt-3 space-y-1">
          <!-- Account Management -->
          <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
            {{ __('Profile') }}
          </x-jet-responsive-nav-link>

          @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
          <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
            {{ __('API Tokens') }}
          </x-jet-responsive-nav-link>
          @endif

          <!-- Authentication -->
          <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
              {{ __('Log Out') }}
            </x-jet-responsive-nav-link>
          </form>

          <!-- Team Management -->
          @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
          <div class="border-t border-gray-200"></div>

          <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manage Team') }}
          </div>

          <!-- Team Settings -->
          <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
            {{ __('Team Settings') }}
          </x-jet-responsive-nav-link>

          @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
          <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
            {{ __('Create New Team') }}
          </x-jet-responsive-nav-link>
          @endcan

          <div class="border-t border-gray-200"></div>

          <!-- Team Switcher -->
          <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Switch Teams') }}
          </div>

          @foreach (Auth::user()->allTeams() as $team)
          <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </nav>

</Head>


<div class="hidden top-16 h-screen sm:flex bg-white fixed">
  <aside aria-label="Sidebar">

    <div class="overflow-y-auto py-4 px-3 rounded ">
      <ul class="space-y-2">
        <li>
          <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:group-hover:text-black hover:bg-gray-100 dark:hover:bg-blue-100">
            <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:dark:group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
            <span class="ml-3">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.application.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:group-hover:text-black hover:bg-gray-100 dark:hover:bg-blue-100">
            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:dark:group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Application</span>
            <span class="inline-flex justify-center items-center px-2 ml-3 text-sm font-medium  rounded-full bg-yellow-200  text-black">Pending</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.programs.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:group-hover:text-black hover:bg-gray-100 dark:hover:bg-blue-100">
            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:dark:group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Programs</span>
            <span class="inline-flex justify-center items-center px-2 ml-3 text-sm font-medium  rounded-full bg-yellow-200  text-black">Pending</span>
          </a>
        </li>
        @if(Auth::user()->role_id == 5)
        @else
        <li>
          <a href="users" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:group-hover:text-black hover:bg-gray-100 dark:hover:bg-blue-100">
            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:dark:group-hover:text-black" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
            <span class="inline-flex justify-center items-center px-2 ml-3 text-sm font-medium  rounded-full bg-yellow-200  text-black">Pending</span>
          </a>
        </li>
        @endif
      </ul>

    </div>
  </aside>
</div>

<style>
  #Sidebar {
    background-color: #f1f1f1;
    position: absolute;
    float: left;
    height: auto;
    overflow: auto;
  }

</style>
