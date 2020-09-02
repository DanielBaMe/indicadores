
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


import routes from './router/routes'

const app = new Vue({
  el:'#app'
});
