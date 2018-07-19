/** SETUP LIBRARIES */
require('./libraries');

/** VUE COMPONENTS */
Vue.component('lease-types', require('./components/forms/lease_types.vue'));
Vue.component('lease-certificates', require('./components/forms/lease_certificates.vue'));

// global vm for watcher
window.watcher = new Vue();
