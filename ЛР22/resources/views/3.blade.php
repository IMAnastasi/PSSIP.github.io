<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма</title>
</head>
<body>
<h1>Выберите дату</h1>
<form action="{{route('store')}}" method="post">
    @csrf
    <label>Имя:</label>
    <input type="text"  name="name" required>
    <br>
    <label>Фамилия:</label>
    <input type="text" name="surname" required>
    <br>
    <label>Отчество:</label>
    <input type="text" name="patronymic" required>
    <br>
    <label>Пол:</label>
    <select name="sex">
        <option value="Мужской">Мужской</option>
        <option value="Женский">Женские</option>
    </select>
    <br>
    <label for="date">Дата рождения:</label>
    <input type="date" id="date" name="birthday" required>
    <br>
    <label>Специальность:</label>
    <input type="text" name="speciality">
    <br><br>
    <button type="submit">Отправить</button>
</form>
</body>
</html>
