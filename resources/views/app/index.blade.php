@extends('templates.app')

@section('title', 'App')

@section('conteudo')
    <div class="container">
        <div class="center">
            <div class="flex newproject">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="text" placeholder="Create new project" name="projeto" id="projeto">
                <button id="new">New</button>
            </div>
        </div>
        <h2>My Projects</h2>
        <div id="app" class="flex-wrap">
            @foreach ($projects as $item)
                <a href="{{route('app.project', ['project' => $item->id]);}}">
                    <div class="card">
                        <h3>{{$item->nome}}</h3>
                    </div> 
                </a>
            @endforeach
        </div>
    </div>
    <script src="{{asset('js/create.js')}}"></script>
@endsection