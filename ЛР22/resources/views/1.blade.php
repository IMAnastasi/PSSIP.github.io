<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма</title>
</head>
<body>
<h1>Выберите дату</h1>
<form action="{{route('zadanie')}}" method="post">
    @csrf
    <label >First Name:</label>
    <input type="text"  name="first_name" required>
    <label >Last Name:</label>
    <input type="text" name="last_name" required>
    <label >Email"</label>
    <input type="email" name="email" required>
    <label >Phone"</label>
    <input type="number" name="phone">
    <br><br>

    <button type="submit">Отправить</button>
</form>
</body>
</html>
