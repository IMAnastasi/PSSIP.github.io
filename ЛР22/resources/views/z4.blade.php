<?php
$data = [];
for ($i = 0; $i < 7; $i++) {
    $data[] = rand(-10, 10);
}
dump('Исходный массив ', $data);
$multiply = 1;
$data = \Illuminate\Support\Arr::map($data, function ($item) use (&$multiply) {
    if ($item < 0) {
        $multiply *= $item;
        $item = 10;
    }

    return $item;
});
dump('Произведение отрицательных чисел', $multiply);
dd('Измененный массив', $data);
