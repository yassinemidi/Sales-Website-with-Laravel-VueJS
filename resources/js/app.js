/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('category-dropdown', require('./components/CategoryDropdown.vue').default);
Vue.component('adress-dropdown', require('./components/Adressdropdown.vue').default);

Vue.component('image-edit-profile', require('./components/imagepreview/editUserAvatar.vue').default);
Vue.component('image-0', require('./components/imagepreview/image_0.vue').default);
Vue.component('image-1', require('./components/imagepreview/image_1.vue').default);
Vue.component('image-2', require('./components/imagepreview/image_2.vue').default);

Vue.component('message', require('./components/Message.vue').default);
Vue.component('conversation', require('./components/Conversation.vue').default);
Vue.component('phonenumber', require('./components/showPhoneNumber.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 


const app = new Vue({
    el: '#app',
});
