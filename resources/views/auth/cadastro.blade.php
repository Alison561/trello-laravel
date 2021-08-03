@extends('templates.index')

@section('title', 'login')

@section('conteudo')

    <div class="flex-center">
        <form id="form" class="flex-center-col" action="{{ route('signingUp') }}" method="post">
            @csrf
            <h1>Crie sua conta</h1>
            <div class="goup-form">
                @error('nome')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input placeholder="Digite o seu nome e sobrenome" value="{{ old('nome') }}" type="text" name="nome" id="nome">
            </div>
            <div class="goup-form">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input placeholder="Digite o seu email" value="{{ old('email') }}" type="text" name="email" id="email">
            </div>
            <div class="goup-form">
                @error('pass')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input placeholder="Digite o sua senha" value="{{ old('pass') }}" type="password" name="pass" id="pass">
            </div>
            <button>cadastre - se</button>
        </form>
    </div>
    
@endsection