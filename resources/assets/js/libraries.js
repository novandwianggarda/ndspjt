/**
 * botstrapping libraries
 */

// Lodash
window._ = require('lodash');

// Popper
// window.Popper = require('popper.js').default;

// JQuery
try {
    window.$ = window.jQuery = require('jquery');
    // require('jquery-slimscroll');
} catch (e) {}

// Axios
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// Moment
// window.moment = require('moment');

// Datepicker
window.datepicker = require('bootstrap-datepicker');

// Localization Datepicker
$.fn.datepicker.dates['id'] = {
    days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
    daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
    daysMin: ["Mg", "Sn", "Sl", "Rb", "Km", "Jm", "St"],
    months: ["Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
    monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"],
    today: "Hari Ini",
    clear: "Hapus",
    format: "dd MM yyyy",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 1
};
