<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMOCRM</title>
    <link rel="stylesheet" href="css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11/dist/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
</head>
<body>
<div id="app">
    <select v-model="entityKey">
        <option v-for="obj in entities" v-bind:value="obj.key">{{obj.name}}</option>
    </select>
    <button v-if="loading" :disabled="true" class="load-btn">
        .
    </button>
    <button v-else v-on:click="createEntity" :disabled="entityKey=='not_selected'" class="create-btn">
        Создать
    </button>
    <table>
        <tr>
            <th>ID</th>
            <th>Сущность</th>
        </tr>
        <tr v-for="obj in objects">
            <td>{{obj.id}}</td>
            <td>{{obj.entity_type}}</td>
        </tr>
    </table>
</div>
<script src="js/app.js">
</script>
</body>
</html>
