<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Programs') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('admin.programs.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to list</a>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('admin.programs.store') }}" method="post">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="description" class="block font-medium text-sm text-gray-700 pt-3">Code</label>
                            <input type="text" name="code" id="code" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('code', '') }}" />
                            @error('code')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <label for="description" class="block font-medium text-sm text-gray-700 pt-3">Description</label>
                            <input type="text" name="description" id="description" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('description', '') }}" />
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <label for="adviser" class="block font-medium text-sm text-gray-700 pt-3">Program Adviser</label>
                            <select type="text" name="adviser" id="adviser" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('adviser', '') }}" >
                            @error('adviser')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <label for="dean" class="block font-medium text-sm text-gray-700 pt-3">Dean</label>
                            <select type="text" name="dean" id="dean" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('dean', '') }}" >
                            @error('dean')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <label for="registrar" class="block font-medium text-sm text-gray-700 pt-3">Registrar</label>
                            <select type="text" name="registrar" id="registrar" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('registrar', '') }}" >
                            @error('registrar')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>