<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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

        $job = Job::create([
            'title' => request("Title"),
            "salary" => request("Salary"),
            "employer_id" => 1
        ]);

        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );

        return redirect("/jobs");
    }
    public function edit(Job $job)
    {
        // gate is defined in provides
        // if(Gate::denies("editjob",$job))
        // {
            //     abort(403);
            // }

            // if(Auth::user()->cannot("edit-job",$job))
            // {
                //     dd("ahh ahh you can not do this!!!");
                // }
        // Gate::authorize("edit-job",$job);

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
