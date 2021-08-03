<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://use.fontawesome.com/9da921de6c.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <h1><a href="{{route('app.index')}}">MyProject</a></h1>
            <div class="user">
                <p>{{$user->name}}</p>
                <img src="{{asset('img/user.png')}}" alt="{{$user->name}}">
                <a class="a" href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>
        </nav>
    </header>
    @yield('conteudo')
</body>
</html>