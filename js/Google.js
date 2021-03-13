class Google {
    constructor(el) {
            this.el = el;
            // объявляем класс шаблона. Устанавливаем браузер пользователя
            this.template = new SearchTemplate('android');
            // объявляем класс поиска
            this.search = new Search();
        }
        /**
         * форма из поиска
         * @param {string} word 
         */
    form(word) {
            // устанавливаем параметры поиска из формы
            this.search.param(word);
            // получаем результаты поиска

            let result = this.search.engine();
            // обрабатываем реультаты поиска
            this.eachResult(result, this.el);
        }
        /**
         * 
         * @param {array} data 
         */
    eachResult(data, el) {
        el.innerHTML = '';
        for (let i = 0; i < data.length; i++) {
            // получаем готовый шаблон
            let temp = this.template.getTamplate(data[i].name, data[i].id);
            el.insertAdjacentHTML('afterend', temp);
        }
    }

}