<x-layout>
    <x-slot:heading>Register</x-slot:heading>
    <div>
        <form action="/register" method="POST">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">

                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            {{-- :value="old()" works only with blade components not with normal tag for normal use {{}} this --}}
                            <x-form-input type="text" name="first_name" id="first_name" :value="old('first_name')" />
                            <x-form-error name="first_name" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="last_name" id="last_name"
                                value="{{ old('last_name') }}" />
                            <x-form-error name="last_name" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" value="{{ old('email') }}" />
                            <x-form-error name="email" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" />
                            <x-form-error name="password" />
                        </div>
                    </x-form-field>
                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password_confirmation" id="password_confirmation" />
                            <x-form-error name="password_confirmation" />
                        </div>
                    </x-form-field>

                </div>

            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <x-form-button>Register</x-form-button>
            </div>
        </form>
    </div>
</x-layout>
