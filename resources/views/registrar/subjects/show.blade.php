<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Subjects') }} | <span class=" text-md text-gray-500">{{__('View Subject')}}</span>
        </h2>
      </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Return Button -->
            <div class="block mb-8">
                <a href="{{ route('registrar.subjects.index') }}" class="ml-1 inline-flex items-center px-4 py-1 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-200 focus:shadow-outline-gray hover:text-white disabled:opacity-25 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                <span class="flex-1 ml-1 whitespace-nowrap">Back to list</span>
                </a>
            </div>
            
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">

                                <!-- Code -->
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-xs text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Code
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $subjects->subj_code }}
                                    </td>
                                </tr>

                                <!-- Title -->
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $subjects->title }}
                                    </td>
                                </tr>

                                <!-- Category -->
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Category
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        @foreach($categories as $category)
                                            @if ($subjects->cat_id == $category->id)                       
                                                    {{ $category->category }}                  
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>

                                <!-- Program -->
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Program
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        @foreach($programs as $program)
                                            @if ($subjects->programs_id == $program->id)                       
                                                    {{ $program->description }}                  
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>

                                <!-- Units -->
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Units
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $subjects->units }}
                                    </td>
                                </tr>

                                <!-- Professor -->
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Professor
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $subjects->prof }}
                                    </td>
                                </tr>

                                <!-- Term -->
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Term
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        @foreach($terms as $term)
                                            @if($subjects->term == $term->id)
                                                {{$term->year.' '.$term->label}}
                                            @endif
								        @endforeach
                                    </td>
                                </tr>

                                <!-- Created at -->
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created at
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $subjects->created_at }}
                                    </td>
                                </tr>

                                <!-- Updated at -->
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Updated at
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $subjects->updated_at }}
                                    </td>
                                </tr>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>