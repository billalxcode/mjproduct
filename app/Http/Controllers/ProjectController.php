<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('project.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project_name       = $request->project_name;
        $project_description= $request->project_description;
        $project_status     = $request->project_status;
        $project_start_date = $request->project_start_date;
        
        $image              = $request->file('image');
        $image_path         = Storage::disk('public')->put('images', $image);

        Project::create([
            'project_name'  => $project_name,
            'project_description'   => $project_description,
            'project_status'    => $project_status,
            'project_start_date'    => $project_start_date,
            'project_banner'    => $image_path
        ]);

        return redirect()->route('dashboard.project')->with('success', "Success create new project");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, $id)
    {
        $data = $project->find($id);
        return view('project.edit', [
            'action' => route('dashboard.project.update', $id),
            'project'   => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
