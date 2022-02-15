function createEntity() {
    app.loading = true;
    let data = {
        'entity_key': app.entityKey
    };
    axios
        .post('/createEntity', data)
        .then(response => {
            app.objects.push(response.data)
            app.loading = false;
        })
}

let app = new Vue({
    el: '#app',
    data: {
        entities: [
            {name: 'Не выбрано', key: "not_selected"},
            {name: 'Сделка', key: "leads"},
            {name: 'Контакт', key: "contacts"},
            {name: 'Компания', key: "companies"}
        ],
        objects: [],
        entityKey: 'not_selected',
        loading: false
    }
});
