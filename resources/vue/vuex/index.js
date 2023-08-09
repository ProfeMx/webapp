import { createStore } from 'vuex'

// Como importar de manera dinpamica los módulos de la app, al igual que hicimos con las rutas

const store = createStore({});

const files = import.meta.globEager('/resources/vue/**/vuex/*.js');

Object.keys(files).forEach(filePath => {

  const moduleDefinition = files[filePath].default;

  const moduleName = filePath.match(/\/vuex\/(.*?)\.js$/)[1];

  store.registerModule(moduleName, moduleDefinition);

});

export default store;