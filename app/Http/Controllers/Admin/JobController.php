<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobsRequest;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Models\Category;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

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
        $tags = Tag::all();
        return view('admin.jobs.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobsRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['title'], Job::class);

        if (array_key_exists('path_image', $data)) {

            $image_path = Storage::put('uploads', $data['path_image']);

            $original_name = $request->file('path_image')->getClientOriginalName();

            $data['path_image'] = $image_path;
            $data['image_original_name'] = $original_name;
        }
        $job = Job::create($data);

        if (array_key_exists('tags', $data)) {
            $job->tags()->attach($data['tags']);
        }

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
        $tags = Tag::all();
        return view('admin.jobs.edit', compact('job', 'categories', 'tags'));
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

        if (array_key_exists('tags', $data)) {
            $job->tags()->sync($data['tags']);
        } else {
            $job->tags()->detach();
        }

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
