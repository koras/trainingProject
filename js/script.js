// получаем элемент куда добавлять результаты поиска
let domElement = document.getElementById('search-google');

let word = "Найти новый магазин"
let wordSecond = "Опять ищем магазин";
// Создаём класс поиска
let google = new Google(domElement);

// Вызываем поиск, результаты записываем на страницу
google.form(word);
// вызываем поиск снова, но уже с другими параметрами
google.form(wordSecond);