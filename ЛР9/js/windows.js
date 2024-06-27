window.alert("Привет, мир!"); //Использование alert()

//Использование confirm()
let result = window.confirm("Вы уверены?");
if (result) {
  console.log("Вы согласились.");
} else {
  console.log("Вы отказались.");
}

//Использование prompt()
let name = window.prompt("Введите ваше имя:");
if (name) {
  console.log("Привет, " + name + "!");
} else {
  console.log("Вы не ввели имя.");
}

//Комбинированный пример
let age = window.prompt("Сколько вам лет?");
if (age) {
  let isAdult = window.confirm("Вы совершеннолетний?");
  if (isAdult) {
    alert("Вы можете посещать этот сайт.");
  } else {
    alert("Вы не можете посещать этот сайт.");
  }
} else {
  alert("Вы не ввели возраст.");
}


