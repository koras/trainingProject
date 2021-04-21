data = [{
    name: "Магазин электроники",
    id: 10,
    url: "http://shop-electro.com",
}, {
    name: "Магазин мебели",
    id: 20,
    url: "http://shop.com",
}, {
    name: "Магазин обуви",
    id: 30,
    url: "http://shose.com"
}, {
    name: "1 Магазин обуви",
    id: 110,
    url: "http://shose6.com"
}, {
    name: "2 Магазин обуви",
    id: 305,
    url: "http://shose5.com"
}, {
    name: "3 Магазин обуви",
    id: 304,
    url: "http://shose4.com"
}, {
    name: "4 Магазин обуви",
    id: 303,
    url: "http://shos3e.com"
}, {
    name: "5 Магазин обуви",
    id: 302,
    url: "http://shose2.com"
}, {
    name: "6 Магазин обуви",
    id: 301,
    url: "http://shose1.com"
}];



/**
 * Класс поиска для взаимодействия с поисковой машиной
 * 
 */

class Search {
    /**
     * Установка поискового запроса
     * @param {string} word 
     */
    param(word) {
        this.word = word;
    }

    engine() {
        this.resultSearch = this.server(this.word);

        // сколько элементов мы нашли
        console.log('сколько элементов мы нашли');
        return this.resultSearch;
    }

    /**
     * Получение данных на сервере
     * @param {sting} word 
     * @returns 
     */
    server(word) {
        let result = [];
        // перебор элементов массива
        data.forEach(element => {
            // сравниваем и проверяем соответсвие
            if (element.name.match(`${word}`)) {
                // добавляем элемент 
                result.push(element);
            }

            console.log(element.name.match(`${word}`));
        });
        //  console.log(result);
        //  console.log('Мы ищем ' + word);
        return result;
    }


}