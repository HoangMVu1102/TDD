<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('project.index', compact('projects'));
    }
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));

    }
    public function store()
    {
//            validate data
        $attributes =  request()->validate(['tittle'=>'required']);

//            persist
        Project::create(request($attributes));
//            redirect
        return redirect('/Projects');
    }

}
