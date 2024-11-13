<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Изменить</title>
</head>
<body>
<h1>Изменение записи</h1>
<form method="post" action="{{route('update', $ekz->id)}}">
    @csrf
    <label for="pred_id">Предмет</label>
    <select name="pred_id" id="pred_id">
        @foreach($preds as $pred)
            <option value="{{$pred->id}}">{{$pred->name}}</option>
        @endforeach
    </select>
    @error('pred_id')
    Ошибка: {{$message}}
    @enderror
    <br><br>

    <label for="stud_id">По студенту</label>
    <select name="stud_id" id="stud_id">
        @foreach($studs as $stud)
            <option value="{{$stud->id}}">{{$stud->name}}</option>
        @endforeach
    </select>
    @error('stud_id')
    Ошибка: {{$message}}
    @enderror
    <br><br>

    <label for="score">Оценка</label><input type="number" name="score" id="score" value="{{$ekz->score}}">
    @error('score')
    Ошибка: {{$message}}
    @enderror

    <input type="submit" value="Изменить">
</form>
</body>
</html>
