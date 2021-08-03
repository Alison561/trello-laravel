@extends('templates.index')

@section('title', 'login')

@section('conteudo')

    <div class="flex-center">
        <form id="form" class="flex-center-col" action="{{ route('authenticate') }}" method="post">
            @csrf
            <h1>Fazer login no MyProject</h1>
            <div class="goup-form">
                    @error('email')
                        <div>{{ $message }}</div>
                    @enderror
                <input placeholder="Digite o seu email" value="{{ old('email') }}" type="text" name="email" id="email">
            </div>
            <div class="goup-form">
                    @error('password')
                        <div>{{ $message }}</div>
                    @enderror
                <input placeholder="Digite a sua senha" value="{{ old('password') }}" type="password" name="password" id="pass">
            </div>
            <div class="flex">
                <p>
                    <a href="{{route('password.request')}}">esqueci a senha</a>
                     - 
                    <a href="{{route('register')}}">cadastre-se</a>
                </p>
            </div>
            <button>Fazer Login</button>
        </form>
    </div>
    
@endsection