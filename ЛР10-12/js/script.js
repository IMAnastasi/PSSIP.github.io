function calculateF(t) {
  try {
    // Вычисляем значение f
    const underSqrt = 7 + t;
    if (underSqrt < 0) {
      throw new Error("Корень из отрицательного");
    }
    const denominator = 8 - Math.abs(t);
    if (denominator === 0) {
      throw new Error("Ошибка деления на 0");
    }
    const f = (-t + Math.sqrt(underSqrt)) / denominator;
    return f;
  } catch (error) {
    alert(error.message);
    return null;
  }
}
