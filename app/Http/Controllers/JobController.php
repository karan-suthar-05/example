<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with("employer")->latest()->simplePaginate(4);
        return view("jobs.index",[
            "jobs" => $jobs,
        ]);
    }
    public function create()
    {
        return view("jobs.create");
    }
    public function show(Job $job)
    {
        return view("jobs.show",[
            "job" => $job
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'Title' => ['required', 'min:3'],
            'Salary' => ['required']
        ]);

        Job::create([
            'title' => request("Title"),
            "salary" => request("Salary"),
            "employer_id" => 1
        ]);

        return redirect("/jobs");
    }
    public function edit(Job $job)
    {
        return view("jobs.edit",[
            "job" => $job
        ]);
    }
    public function update(Request $request,Job $job)
    {
        $request->validate([
            'Title'=>['required','min:3'],
            'Salary'=>['required']
        ]);
        // authorization

        $job->update([
            "title" => request("Title"),
            "salary" => request("Salary")
        ]);
        return redirect("/jobs/".$job->id);
    }
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect("/jobs");
    }
}
