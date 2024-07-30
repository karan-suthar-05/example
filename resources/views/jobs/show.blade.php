<x-layout>
    <x-slot:heading>Home</x-slot:heading>
    <h1 class="font-semibold text-3xl">{{ $job['title'] }}</h1>
    <p class="text-xl mb-3">Salary : {{ $job['salary'] }}</p>
    <x-button href="/jobs/edit/{{ $job->id }}">Edit</x-button>
</x-layout>
