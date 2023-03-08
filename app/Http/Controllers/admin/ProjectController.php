<?php

namespace App\Http\Controllers\admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();

        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|unique:projects',
            'description' => 'required|string',
            'project_url' => 'required|url',
            'image_url' => 'url|nullable'
        ]);

        $data = $request->all();

        $new_project = new Project();
        $new_project->fill($data);
        $new_project->save();

        return to_route('admin.projects.show', $new_project->id)->with('message', "Il progetto <strong>" . strtoupper($new_project->name) . "</strong> è stato aggiunto con successo")->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => ['required', 'string', Rule::unique('projects')->ignore($project->id)],
            'description' => 'required|string',
            'project_url' => 'required|url',
            'image_url' => 'url|nullable'
        ]);

        $data = $request->all();
        $project->fill($data);
        $project->save();

        return to_route('admin.projects.show', $project->id)->with('message', "Il progetto <strong>" . strtoupper($project->name) . "</strong> è stato modificato con successo")->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index')->with('message', "Il progetto <strong>" . strtoupper($project->name) . "</strong> è stato eliminato con successo")->with('type', 'success');
    }
}
