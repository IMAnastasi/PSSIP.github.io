<?php
mb_internal_encoding('UTF-8');
$s1 = 'Я люблю Беларусь';
$s2 = 'Я учусь в Политехническом колледже';
$secondChar = mb_substr($s1, 1, 1);
dump('Второй символ в строке s1 ' . $secondChar);
$asciiCode = ord($secondChar);
dump('Его ASCII ' . $asciiCode);
dump('Длина строки s1 ' . mb_strlen($s1));
dd(str_replace('ю', '№', $s1));
