// Строковые переменные
const s1 = "Я люблю Беларусь";
const s2 = "Я учусь в Политехническом колледже";

// Вывод длины строки s1
document.write(`Длина строки s1: ${s1.length}<br>`);

// Выделение n-го символа в строке s1 и определение его ASCII-кода
const n = 2;
const nthChar = s1.charAt(n - 1);
const asciiCode = nthChar.charCodeAt(0);
document.write(`${n}-й символ в строке s1: '${nthChar}', ASCII-код: ${asciiCode}<br>`);

// Замена всех букв "у" на "а" в строке s2
const modifiedS2 = s2.replace(/у/g, "а");
document.write(`Модифицированная строка s2: ${modifiedS2}<br>`);
