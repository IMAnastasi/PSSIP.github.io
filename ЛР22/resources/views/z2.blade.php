<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма с Date Picker</title>
</head>
<body>
<h1>Выберите дату</h1>
<form action="{{route('z2-get')}}" method="get">
    @csrf
    <label for="date">Дата:</label>
    <input type="date" id="date" name="date" required>

    <br><br>

    <button type="submit">Отправить</button>
</form>
@yield('content')
</body>
</html>
