<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Inertia\Inertia;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::orderBy('read')->orderBy('created_at', 'desc')->get();

        return Inertia::render('Admin/JobApplications/Index', [
            'applications' => $applications,
        ]);
    }

    public function markAsRead(JobApplication $application)
    {
        $application->update(['read' => true]);

        return back();
    }
}