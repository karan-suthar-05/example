<x-layout>
    <x-slot:heading>Job Listing</x-slot:heading>

    <div class="space-y-2">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}"
                class="block p-4 rounded-lg border border-gray-400 hover:border-gray-800 transition">
                <div class="font-semibold text-sm text-blue-500">{{ $job->employer->name }}</div>
                <strong>{{ $job['title'] }}</strong> pays {{ $job['salary'] }}
            </a>
        @endforeach
    </div>
    <div class="pt-4">
        {{ $jobs->links() }}
    </div>
</x-layout>
