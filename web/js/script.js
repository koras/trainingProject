// получаем элемент куда добавлять результаты поиска
let domElement = document.getElementById('search-google');
// находим нашу кнопку
let searchButton = document.getElementById('searchButton');
// получаем input нашей формы
let inputGoogle = document.getElementById('formGoogle');

// в каком элементе будем считать сколько нашли
let conutGoogle = document.getElementById('search-google-count');



//console.log(inputGoogle.value);


let word = "Найти новый магазин"
let wordSecond = "Опять ищем магазин";
let wordSecond2 = "Опять ищем магазин другой";
// Создаём класс поиска
let google = new Google(domElement);

// Вызываем поиск, результаты записываем на страницу
///google.form(word);
// google.form(wordSecond);
// google.form(wordSecond2);

// вешаем слушатель на кнопку
// searchButton.addEventListener('click', function() {
//     //console.log('нажали на кнопку');
// })
let clickSearch = function() {
    let getInput = inputGoogle.value;
    let text = '';

    google.form(getInput);
    let countElement = google.getLength();
    console.log(countElement);


    if (countElement === 0) {
        text = `мы ничего не нашли`;
    } else {
        text = `Мы нашли ${countElement} элемент(а/ов). Мы искали "${getInput}" `;
    }
    conutGoogle.innerText = text;
}


searchButton.addEventListener('click', clickSearch);