<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма с Date Picker</title>
</head>
<body>
@php
$days = round(\Carbon\Carbon::parse(request()->input('date'))->diffInDays(now()))
@endphp
@if ($days > 0)
    <h1>Прошло {{abs($days)}} дней</h1>
@else
    <h1>Осталось {{$days}} дней</h1>
@endif
</body>
</html>
