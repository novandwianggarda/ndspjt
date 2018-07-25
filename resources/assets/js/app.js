/** IMPORT */
import money from 'v-money';

/** SETUP LIBRARIES */
require('./libraries');

/** VUE COMPONENTS */
Vue.component('lease-types', require('./components/forms/lease_types.vue'));
Vue.component('lease-certificates', require('./components/forms/lease_certificates.vue'));
Vue.use(money, {
    decimal: ',',
    thousands: '.',
    prefix: 'Rp ',
    suffix: '',
    precision: 2,
    masked: false
});

// global vm for watcher
window.watcher = new Vue();
