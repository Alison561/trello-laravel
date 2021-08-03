@extends('templates.index')

@section('title', 'forgot-password')

@section('conteudo')

    <div class="flex-center">
        <form id="form" class="flex-center-col" action="{{ route('password.email') }}" method="post">
            @csrf
            <h1>Recuperação de Senha</h1>
            <div class="goup-form">
                    @error('email')
                        <div>{{ $message }}</div>
                    @enderror
                <input placeholder="Digite o seu email"  value="{{ old('email') }}" type="text" name="email" id="email">
            </div>
            <button>Solicitar</button>
        </form>
    </div>
    
@endsection