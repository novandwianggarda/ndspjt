/** IMPORT */
import money from 'v-money';

/** VUE COMPONENTS */
Vue.component('lease-types', require('./components/forms/lease_types.vue'));
Vue.component('lease-certificates', require('./components/forms/lease_certificates.vue'));
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
