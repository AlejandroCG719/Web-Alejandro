<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Project;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Hash;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
        $this->middleware('prueba')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return  view('projects.index',[
            'projects' => Project::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('projects.create',[
            'project'=> new Project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveProjectRequest $request
     * @return RedirectResponse
     */
    public function store(SaveProjectRequest $request)
    {
        //return $request->all();
        Project::create($request->validated());

        return redirect()->route('projects.index')->with('status','El proyecto fue creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return Factory|View
     */
    public function show(Project $project)
    {
       /* $project = Project::findOrFail($project);*/
        return  view('projects.show',[
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return Factory|View
     */
    public function edit(Project $project)
    {
        return  view('projects.edit',[
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Project $project
     * @param SaveProjectRequest $request
     * @return RedirectResponse
     */
    public function update(Project $project, SaveProjectRequest $request)
    {
        $project->update($request->validated() );
        return redirect()->route('projects.show',$project)->with('status', 'El proyecto fue actualizado con éxito.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con éxito.');
    }
}
