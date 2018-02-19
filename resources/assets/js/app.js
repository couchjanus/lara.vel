require('./bootstrap');
window.Vue = require('vue');

import Router from 'vue-router';
import App from './App.vue';
import Post from './components/Post.vue';

Vue.component('pagination', require('./components/PaginationComponent.vue'));

Vue.use(Router);

const router = new Router({
    routes: [
      {
        path: '/post/:id',
        name:'post',
        component: Post,
        props: true,
      },
    ]
   });
   
new Vue({
    el: '#blog',
    render: h => h(App),
    router
})
