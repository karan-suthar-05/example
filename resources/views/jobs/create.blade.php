<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>
    <div>
        <form action="/jobs" method="POST">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Create new job</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be
                        careful what you share.</p>

                    <x-form-field>
                        <x-form-label for="Title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="Title" id="Title" placeholder="CEO"
                                value="{{ old('Title') }}" />
                            <x-form-error name="Title" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="Salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="Salary" id="Salary" placeholder="$50000"
                                value="{{ old('Salary') }}" />
                            <x-form-error name="Salary" />
                        </div>
                    </x-form-field>
                </div>
                {{-- <ul>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    @endif
                </ul> --}}
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <x-form-button>Save</x-form-button>
            </div>
        </form>
    </div>
</x-layout>
