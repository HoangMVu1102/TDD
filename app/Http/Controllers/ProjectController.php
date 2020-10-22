<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('project.index', compact('projects'));
    }
    public function store()
    {
//            validate data
//            persist
        Project::create(request(['title','description']));
//            redirect
        return redirect('/Projects');
    }

}
