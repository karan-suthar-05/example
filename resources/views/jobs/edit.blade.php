<x-layout>
    <x-slot:heading>Edit Job : {{ $job->title }}</x-slot:heading>
    <div>
        <form action="/jobs/{{ $job->id }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Update job</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be
                        careful what you share.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="Title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                    <input type="text" name="Title" id="Title"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="Programmer" value="{{ $job->title }}">
                                </div>
                                @error('Title')
                                    <p class="text-red-500 text-sm font-semibold mt-3">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="Salary"
                                class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                    <input type="text" name="Salary" id="Salary"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                        placeholder="$50000" value="{{ $job->salary }}">
                                </div>
                                @error('Salary')
                                    <p class="text-red-500 text-sm font-semibold mt-3">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mt-6 flex items-center justify-between gap-x-3">
                <div>

                    <button form="delete-form"
                        class="mx-3 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>

                </div>
                <div>
                    <a href="/jobs/{{ $job->id }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit"
                        class="mx-3 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </div>
        </form>
        <form action="/jobs/{{ $job->id }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-layout>
