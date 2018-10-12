/** IMPORT */
window.Vue = require('vue');
import money from 'v-money';

// global vm for watcher
window.vueEvent = new Vue();
window.vueShared = {};

/** VUE COMPONENTS */
Vue.component('row-box', require('./components/row_box.vue'));
Vue.component('accordion', require('./components/accordion.vue'));
Vue.component('frgroup', require('./components/form_group.vue'));
Vue.component('indate', require('./components/input_date.vue'));

Vue.component('property-types', require('./components/forms/property_types.vue'));
Vue.component('lease-certificates', require('./components/forms/lease_certificates.vue'));
Vue.component('lease-properties', require('./components/forms/lease_properties.vue'));
Vue.component('lease-payment-terms', require('./components/forms/lease_payment_terms.vue'));
Vue.component('lease-payment-history', require('./components/forms/lease_payment_history.vue'));
Vue.component('lease-payment-invoices', require('./components/forms/lease_payment_invoices.vue'));
Vue.component('certificate-types', require('./components/forms/certificate_types.vue'));
Vue.component('taxes-certificates', require('./components/forms/taxes_certificates.vue'));

Vue.use(money, {
    decimal: ',',
    thousands: '.',
    prefix: 'Rp ',
    suffix: '',
    precision: 0,
    masked: false
});

