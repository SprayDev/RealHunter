/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('hunter-footer', require('./components/partials/footer.vue').default);
Vue.component('hunter-header', require('./components/partials/header.vue').default);
Vue.component('hunter-slider', require('./components/partials/slider.vue').default);
Vue.component('hunter-text-block', require('./components/partials/textBlock.vue').default);
Vue.component('hunter-perm-modal', require('./components/partials/hunter-perm-modal.vue').default);
Vue.component('hunter-tour-modal', require('./components/partials/hunter-tour-modal.vue').default);
Vue.component('hunter-page-tour', require('./components/pages/tour.vue').default);
Vue.component('hunter-page-blog', require('./components/pages/blog.vue').default);
Vue.component('hunter-page-post', require('./components/pages/post.vue').default);

import VueSplide from '@splidejs/vue-splide';
Vue.use( VueSplide );

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
