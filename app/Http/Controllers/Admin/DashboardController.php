<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class DashboardController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('id', 'desc')->first();
        $count = Job::count();

        return view('admin.dashboard', compact('jobs', 'count'));
    }
}
