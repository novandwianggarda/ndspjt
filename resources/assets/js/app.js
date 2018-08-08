/** IMPORT */
window.Vue = require('vue');
import money from 'v-money';

/** VUE COMPONENTS */
Vue.component('row-box', require('./components/row_box.vue'));
Vue.component('accordion', require('./components/accordion.vue'));
Vue.component('frgroup', require('./components/form_group.vue'));
Vue.component('indate', require('./components/input_date.vue'));

Vue.component('lease-types', require('./components/forms/lease_types.vue'));
Vue.component('lease-certificates', require('./components/forms/lease_certificates.vue'));
Vue.component('lease-payment-terms', require('./components/forms/lease_payment_terms.vue'));
Vue.component('certificate-types', require('./components/forms/certificate_types.vue'));

Vue.use(money, {
    decimal: ',',
    thousands: '.',
    prefix: 'Rp ',
    suffix: '',
    precision: 0,
    masked: false
});

// global vm for watcher
window.watcher = new Vue();
