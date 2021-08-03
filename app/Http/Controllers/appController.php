<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tasks;
use App\Models\projects;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class appController extends Controller
{
    public function index(Request $req){
        return view('app.index', ['user' => Auth::user(), 'projects' => projects::where('id_user', Auth::user()->id)->get()]);
    }

    public function creat(Request $req){
        $data = [];
        $req->validate([
            'post' => 'required|max:255',
        ]);
        $data['project'] = projects::create([
            'nome' => $req->post,
            'slug' => Str::slug($req->post),
            'id_user' => Auth::user()->id
        ]);

        $data['url'] = route('app.project', ['project' => $data['project']['id']]);
        return response()->json($data);
    }

    public function project(projects $project){
        return view('app.project', ['user' => Auth::user(), 
        'project' => $project, 
        'todo' => tasks::where('assignment', 'todo')->where('id_project', $project->id)->get(),
        'doing' => tasks::where('assignment', 'doing')->where('id_project', $project->id)->get(),
        'done' => tasks::where('assignment', 'done')->where('id_project', $project->id)->get(),
        ]);
    }

    public function tasks(Request $req){
        $req->validate([
            'nome' => 'required|max:255',
            'id_project' =>'required',
            'id_project' =>'required'
        ]);

        return tasks::create([
            "nome" => $req->nome,
            "id_project" => $req->id_project,
            "assignment" => $req->assignment
        ]);

        // $project = projects::find($req->id_project);

    }

    public function uptasks(Request $req){
        tasks::where('id', $req->id)->update(["assignment" => $req->assignment]);
    }

}
