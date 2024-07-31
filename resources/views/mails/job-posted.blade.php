<h2>
    {{ $job->title }}
</h2>
<p>
    Congratulations! Your job is live now on out website.
</p>
<p>
    <a href="{{ url('/jobs/' . $job->id) }}">Click to show your job...</a>
</p>
