// Получаем информацию о статусе загрузки
document.addEventListener('readystatechange', function() {
    var statusElement = document.getElementById('status');
    if (document.readyState === 'complete') {
      statusElement.textContent = 'Страница полностью загружена';
    } else {
      statusElement.textContent = 'Страница загружается: ' + document.readyState;
    }
  });
  
  // Выводим сообщение через 5 секунд
  setTimeout(function() {
    var messageElement = document.getElementById('message');
    messageElement.textContent = 'Страница загружена!';
  }, 5000);
  
  // Добавляем новый элемент после второго
  var allElements = document.getElementsByTagName('*');
  var secondElement = allElements[1];
  var newElement = document.createElement('p');
  newElement.id = 'birthplace';
  newElement.textContent = 'Место рождения';
  secondElement.parentNode.insertBefore(newElement, secondElement.nextElementSibling);



  function applyStyles() {
    // 1. Цвет документа установить - #AFEEEE
    document.body.style.backgroundColor = '#AFEEEE';
  
    // 2. Текст должен быть написан шрифтом Verdana размером 14 пикселей цвет - #008000
    var paragraphs = document.getElementsByTagName('p');
    for (var i = 0; i < paragraphs.length; i++) {
      paragraphs[i].style.fontFamily = 'Verdana';
      paragraphs[i].style.fontSize = '14px';
      paragraphs[i].style.color = '#008000';
    }
  
    // 3. Вокруг изображения на странице должна быть рамка красного цвета толщиной 1 пиксель
    var image = document.getElementsByTagName('img')[0];
    image.style.border = '1px solid red';
  }
  

