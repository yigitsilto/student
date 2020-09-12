/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import ExampleComponent from "./components/ExampleComponent";
import Home from "./components/Home";
import Panel from "./components/Panel";
import StudentPage from "./components/StudentPage";
import Profile from "./components/Profile";


import App from "./components/App";
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('app-component', require('./components/App.vue').default);
Vue.component('home-component', require('./components/Home.vue').default);
Vue.component('panel-component', require('./components/Panel.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


// vue route bilgileri
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/tpanel',
            name: 'panel',
            component: Panel
        },
        {
            path: '/student',
            name:"student",
            component: StudentPage
        },
        {
            path: '/profile',
            name:"profile",
            component: Profile
        }

    ],
});

const app = new Vue({
    el: '#app',
    components: { Home },
    router,

});
