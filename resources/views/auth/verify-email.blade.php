@extends('templates.index')

@section('title', 'verificação de email')

@section('conteudo')

    <div class="flex-center">
        <div id="form" class="flex-center-col">
            <h1>clique no botão abaixo para verificar o email abaixo</h1>
            <a style="color: white" class="btn" href="{{route('verification.send')}}">clique para verificar o email</a>
        </div>
    </div>

@endsection