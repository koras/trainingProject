/**
 * шаблоны поиска
 */
class SearchTemplate {
    /**
     * 
     * @param {string} type - тип нашего устроиства 
     */
    constructor(types) {
        /**
         * тип устроиства
         */
        this.type = types;
    }
    getTamplate(name, id) {
            let template = '';
            switch (this.type) {
                case "firefox":
                case "opera":
                case "chrome":
                    {
                        template = this._browser(name, id);
                    }
                    break;
                case "iphone":
                case "android":
                    {
                        template = this._mobile(name, id);
                    }
                    break;
                default:
                    {
                        template = " not found browser";
                    }
            }
            return template;
        }
        /**
         * Брайзер пользователя на компьютере
         * @param {string} name 
         * @param {int} id 
         * @returns 
         */
    _browser(name, id) {
        return `<div class="data-browser">browser<div>${name} </div><div>${id}</div></div>`
    }

    /**
     * Мобильное устроиство
     * @param {string} name 
     * @param {int} id 
     * @returns 
     */
    _mobile(name, id) {
        return `<div class="data-mobile">mobile<div>${name} </div><div>${id}</div></div>`
    }
}