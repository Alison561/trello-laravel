@extends('templates.index')

@section('title', 'reset-password')

@section('conteudo')

    <div class="flex-center">
        <form id="form" class="flex-center-col" action="{{ route('password.update') }}" method="post">
            @csrf
            <h1>Recuperação de senha</h1>
            <div class="goup-form">
                <input type="hidden" value="{{$token}}" name="token">
            </div>
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
                <input placeholder="Digite uma nova senha" value="{{ old('password') }}" type="password" name="password" id="pass">
            </div>
            <div class="goup-form">
                    @error('password_confirmation')
                        <div>{{ $message }}</div>
                    @enderror
                <input placeholder="Confirme a senha"  value="{{ old('password_confirmation') }}" type="password" name="password_confirmation" id="pass">
            </div>
            <button>recuperar</button>
        </form>
    </div>
    
@endsection