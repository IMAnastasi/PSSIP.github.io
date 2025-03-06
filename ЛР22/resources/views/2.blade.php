<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма</title>
</head>
<body>
Email: {{session('email')}}
Телефон: {{session('phone')}}
Идентификатор сессии: {{session('_token')}}
</body>
</html>
