<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
</head>
<body>
<h1>Экзамены</h1>

@if(Auth::check())
    Вы авторизированы как {{ Auth::user()->name}}
    <form method="POST" action="{{route('logout')}}">
        @csrf
        <input type="submit" value="Выйти">
    </form>
@else
    <a href="/login">Вход</a> | <a href="/register">Регистрация</a>
@endif

@auth()
<a href="{{route('create')}}">Добавить запись</a>
@endauth

<br><br>

<form method="get" action="{{route('main')}}">
    <input type="submit" value="Вывести всё">
</form>

<form method="get" action="{{route('ekzpred')}}">
<label for="pred">По предмету</label>
<select name="pred" id="pred">
    @foreach($preds as $pred)
        <option value="{{$pred->id}}">{{$pred->name}}</option>
    @endforeach
</select>
    <input type="submit" value="Вывести">
</form>

<br><br>

<form method="get" action="{{route('ekzstud')}}">
<label for="stud">По студенту</label>
<select name="stud" id="stud">
    @foreach($studs as $stud)
        <option value="{{$stud->id}}">{{$stud->name}}</option>
    @endforeach
</select>
<input type="submit" value="Вывести">
</form>

<br><br>
@foreach($ekzs as $ekz)
    <p>{{$ekz->stud->name}} {{$ekz->pred->name}} {{$ekz->score}}</p>
    @auth()
    <a href="{{route('edit', $ekz->id)}}">Изменить запись</a>
    <form method="post" action="{{route('delete', $ekz->id)}}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Удалить">
    </form>
    @endauth
@endforeach
</body>
</html>
