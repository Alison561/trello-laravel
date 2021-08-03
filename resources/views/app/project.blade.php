@extends('templates.app')

@section('title', 'App | Projeto')

@section('conteudo')
    <section id="body">
        <h2 id="h1">{{$project->nome}}</h2>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div id="draggable">

            <div class="draggable">

                <div class="header"><h2>To Do</h2></div>

                <div assignment="todo" class="content todo">
                    @foreach ($todo as $item)
                        <div assignment="{{$item->id}}" class="drag" draggable="true"><p>{{$item->nome}}</p></div>
                    @endforeach
                </div>
                <div class="footer">
                    <div assignment="todo" class="ico"><i class="fa fa-plus" aria-hidden="true"></i></div>
                    <input type="text" id="todo">
                </div>
            </div>

            <div class="draggable">

                <div class="header"><h2>Doing</h2></div>

                <div assignment="doing" class="content doing">
                    @foreach ($doing as $item)
                        <div assignment="{{$item->id}}" class="drag" draggable="true"><p>{{$item->nome}}</p></div>
                    @endforeach
                </div>

                <div class="footer">
                    <div assignment="doing" class="ico"><i class="fa fa-plus" aria-hidden="true"></i></div>
                    <input type="text" id="doing">
                </div>

            </div>

            <div class="draggable">

                <div class="header"><h2>Done</h2></div>

                <div assignment="done" class="content done">
                    @foreach ($done as $item)
                        <div assignment="{{$item->id}}" class="drag" draggable="true"><p>{{$item->nome}}</p></div>
                    @endforeach
                </div>

                <div class="footer">

                    <div assignment="done" class="ico"><i class="fa fa-plus" aria-hidden="true"></i></div>
                    <input type="text" id="done">
                </div>

            </div>
        </div>
    </section>
    <script src="{{asset('js/assignment.js')}}"></script>
    <script src="{{asset('js/draggable.js')}}"></script>
@endsection