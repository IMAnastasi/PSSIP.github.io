// Определение класса игры
class GuessingGame {
    constructor() {
        this.randomNumber = this.generateRandomNumber();
        this.attempts = 0;
        this.maxAttempts = 10;
    }

    generateRandomNumber() {
        return Math.floor(Math.random() * 100) + 1;
    }

    checkGuess(userGuess) {
        this.attempts++;
        if (userGuess === this.randomNumber) {
            return "Поздравляем! Вы угадали число!";
        } else if (this.attempts >= this.maxAttempts) {
            return `Игра окончена. Вы не угадали число за ${this.maxAttempts} попыток. Правильный ответ: ${this.randomNumber}`;
        } else if (userGuess > this.randomNumber) {
            return "Слишком большое число!";
        } else {
            return "Слишком маленькое число!";
        }
    }

    getAttemptsLeft() {
        return this.maxAttempts - this.attempts;
    }
}

// Инициализация игры
const game = new GuessingGame();

// Получение элементов DOM
const guessInput = document.getElementById("guessInput");
const submitGuess = document.getElementById("submitGuess");
const feedback = document.getElementById("feedback");
const attempts = document.getElementById("attempts");

// Обработчик нажатия кнопки
submitGuess.addEventListener("click", () => {
    const userGuess = parseInt(guessInput.value);
    const result = game.checkGuess(userGuess);
    feedback.textContent = result;
    attempts.textContent = `Осталось попыток: ${game.getAttemptsLeft()}`;

    // Отключаем ввод и кнопку после завершения игры
    if (result.includes("Поздравляем") || result.includes("Игра окончена")) {
        guessInput.disabled = true;
        submitGuess.disabled = true;
    }
});
