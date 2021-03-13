/**
 * Класс поиска для взаимодействия с поисковой машиной
 * 
 */

class Search {
    data = [{
        name: "Магазин электроники",
        id: 10
    }, {
        name: "Магазин мебели",
        id: 20
    }, {
        name: "Магазин обуви",
        id: 30
    }];



    /**
     * Установка поискового запроса
     * @param {string} word 
     */
    param(word) {
        this.word = word;
    }

    engine() {
        return this.server(this.word);
    }

    /**
     * Получение данных на сервере
     * @param {sting} word 
     * @returns 
     */
    server(word) {
        // this.data.forEach(element => {
        //     console.log(element);
        // });
        console.log('Мы ищем ' + word);
        return this.data;
    }


}