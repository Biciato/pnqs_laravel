/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('buefy/dist/buefy.css')
window.Vue = require('vue');
const { library } = require('@fortawesome/fontawesome-svg-core');
const { faUserCircle } = require('@fortawesome/free-solid-svg-icons');
const { FontAwesomeIcon } = require('@fortawesome/vue-fontawesome');

library.add(faUserCircle);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(require('buefy'));
Vue.use(require('./filters/index'));
Vue.use(require('vee-validate'));
Vue.use(require('./validators/index'));
Vue.use(require('vue-the-mask'));

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.component('maintenance', require('./components/Maintenance.vue').default);
Vue.component('login', require('./components/Auth/Login.vue').default);
Vue.component('signup', require('./components/Auth/Signup.vue').default);
Vue.component('lost-password', require('./components/Auth/LostPassword.vue').default);
Vue.component('remember-password', require('./components/Auth/RememberPassword.vue').default);
Vue.component('not-found', require('./components/NotFound.vue').default);
Vue.component('pnqs-header', require('./components/Header/Header.vue').default);
Vue.component('candidaturas', require('./components/Candidatura/Index.vue').default);
Vue.component('new-candidatura', require('./components/Candidatura/New.vue').default);
Vue.component('common-data', require('./components/Candidatura/New/CommonData.vue').default);
Vue.component('contact-modal', require('./components/Candidatura/New/ContactModal.vue').default);
Vue.component('place-modal', require('./components/Candidatura/New/PlaceModal.vue').default);
Vue.component('praticas-modal', require('./components/Candidatura/New/PraticasModal.vue').default);
Vue.component('candidatura', require('./components/Candidatura/View.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
