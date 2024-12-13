<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
class ProjectController extends BaseController
{
    public function index()
    {
        $projects = Project::with('members.student')->where('student_id', auth()->user()->id)->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:ongoing,completed',
            'files' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $validated['student_id'] = auth()->user()->id;

        if ($request->hasFile('files')) {
            $validated['files'] = $request->file('files')->store('project_files');
        }

        $project = Project::create($validated);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }
}
