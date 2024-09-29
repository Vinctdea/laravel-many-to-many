<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobsRequest;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Models\Category;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::orderBy('id', 'desc')->paginate(5);
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.jobs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobsRequest $request)
    {

        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['title'], Job::class);
        $job = Job::create($data);
        return redirect()->route('admin.jobs.show', $job);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $categories = Category::all();
        return view('admin.jobs.edit', compact('job', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobsRequest $request, Job $job)
    {
        $data = $request->all();
        if ($data['title'] != $job->title) {
            $data['slug'] = helper::generateSlug($data['title'], Job::class);
        }

        $job->update($data);

        return redirect()->route('admin.jobs.show', $job)->with('message', 'modifica avvenuta correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job  $job)
    {
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('delete', 'Elemento ' . $job->title . ' è stato eliminato');
    }
}
