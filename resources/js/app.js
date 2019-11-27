require('./bootstrap');

window.Vue = require('vue');

Vue.component('users-component', require('./components/UsersComponent').default);
Vue.component('blogs-component', require('./components/BlogsComponent').default);
Vue.component('news-component', require('./components/NewsComponent').default);
Vue.component('paginator', require('./components/Paginator.vue').default);

const app = new Vue({
    el: '#vue',
});
