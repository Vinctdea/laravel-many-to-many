<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Job;

class DashboardController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('id', 'desc')->first();
        $categories = Category::all();

        return view('admin.dashboard', compact('jobs', 'categories'));
    }
}
