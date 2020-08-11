require('./bootstrap');

window.Vue = require('vue');

Vue.component('front-page', require('./components/Front.vue').default);
Vue.component('tags', require('./components/Tags.vue').default);
Vue.component('company-form', require('./components/CompanyForm.vue').default);
Vue.component('heading', require('./components/Heading.vue').default);

const app = new Vue({
    el: '#app',
});
