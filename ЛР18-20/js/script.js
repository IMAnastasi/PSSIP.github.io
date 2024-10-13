// Функция для установки Cookie
function setCookie(name, value, days) {
    const d = new Date();
    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = `${name}=${encodeURIComponent(value)};${expires};path=/`;
}

// Функция для получения Cookie
function getCookie(name) {
    const cname = name + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i].trim();
        if (c.indexOf(cname) === 0) {
            return c.substring(cname.length, c.length);
        }
    }
    return "";
}

// Очистка всех Cookie
function clearCookies() {
    document.cookie.split(";").forEach(function(c) {
        document.cookie = c.replace(/^ +/, "")
            .replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
    });
    alert('Все cookie очищены.');
}

// Сохранение данных в Local Storage
function saveToLocalStorage(data) {
    localStorage.setItem('userData', JSON.stringify(data));
}

// Получение данных из Local Storage
function getFromLocalStorage() {
    const userData = localStorage.getItem('userData');
    return userData ? JSON.parse(userData) : null;
}

// Проверка email с использованием регулярных выражений
function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Простое регулярное выражение для email
    return emailPattern.test(email);
}

// Проверка возраста (должно быть не менее 18 лет)
function validateAge(dob) {
    const today = new Date();
    const birthDate = new Date(dob);
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDifference = today.getMonth() - birthDate.getMonth();
    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age >= 18; // Возраст должен быть >= 18
}

// Обработка отправки формы
document.getElementById('userForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // Получение данных из формы
    const fullName = document.getElementById('fullName').value;
    const email = document.getElementById('email').value;
    const dob = document.getElementById('dob').value;
    const birthPlace = document.getElementById('birthPlace').value;
    const hobbies = document.getElementById('hobbies').value;

    // Очистка старых сообщений об ошибках
    document.getElementById('fullNameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('dobError').textContent = '';
    document.getElementById('birthPlaceError').textContent = '';
    document.getElementById('hobbiesError').textContent = '';

    // Валидация
    let isValid = true;

    if (!validateEmail(email)) {
        document.getElementById('emailError').textContent = 'Некорректный email!';
        isValid = false;
    }

    if (!validateAge(dob)) {
        document.getElementById('dobError').textContent = 'Возраст должен быть не менее 18 лет!';
        isValid = false;
    }

    if (!fullName || !email || !dob || !birthPlace || !hobbies) {
        alert('Пожалуйста, заполните все поля.');
        isValid = false;
    }

    if (!isValid) {
        return;
    }

    // Создание объекта с пользовательскими данными
    const userData = {
        fullName,
        email,
        dob,
        birthPlace,
        hobbies
    };

    // Сохранение данных в Cookie на 7 дней
    setCookie('fullName', fullName, 7);
    setCookie('email', email, 7);
    setCookie('dob', dob, 7);
    setCookie('birthPlace', birthPlace, 7);
    setCookie('hobbies', hobbies, 7);

    // Сохранение данных в Local Storage
    saveToLocalStorage(userData);

    // Вывод подтверждения
    document.getElementById('output').innerHTML = `<p>Данные успешно сохранены в Cookie и Local Storage!</p>`;
    document.getElementById('output').style.display = 'block';
});

// Обработка кнопки "Получить данные из Cookie"
document.getElementById('getDataBtn').addEventListener('click', function () {
    const fullName = getCookie('fullName');
    const email = getCookie('email');
    const dob = getCookie('dob');
    const birthPlace = getCookie('birthPlace');
    const hobbies = getCookie('hobbies');

    if (fullName || email || dob || birthPlace || hobbies) {
        document.getElementById('output').innerHTML = `
            <h2>Данные из Cookie:</h2>
            <p>ФИО: ${fullName}</p>
            <p>Email: ${email}</p>
            <p>Дата рождения: ${dob}</p>
            <p>Место рождения: ${birthPlace}</p>
            <p>Увлечения: ${hobbies}</p>
        `;
    } else {
        document.getElementById('output').innerHTML = '<p>Данные в Cookie не найдены.</p>';
    }
    document.getElementById('output').style.display = 'block';
});

// Обработка кнопки "Очистить Cookie"
document.getElementById('clearCookiesBtn').addEventListener('click', function () {
    clearCookies();
    document.getElementById('output').innerHTML = '<p>Cookie очищены.</p>';
    document.getElementById('output').style.display = 'block';
});
