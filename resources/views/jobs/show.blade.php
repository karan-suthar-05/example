<x-layout>
    <x-slot:heading>Home</x-slot:heading>
    <h1 class="font-semibold text-3xl">{{ $job['title'] }}</h1>
    <p class="text-xl mb-3">Salary : {{ $job['salary'] }}</p>
    {{-- @can('edit-job', $job) --}}
    @can('edit', $job)
        <x-button href="/jobs/{{ $job->id }}/edit">Edit</x-button>
    @endcan
</x-layout>
