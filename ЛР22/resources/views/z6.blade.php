<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма с Date Picker</title>
</head>
<body>
<form action="{{route('z6-get')}}" method="get">
    @csrf
    <label for="x">X:</label>
    <input type="number" id="x" name="x" required>

    <br><br>

    <button type="submit">Отправить</button>
</form>
</body>
</html>
