$(document).ready(function (){

    // autoload datepicker
    $('.datepicker').each(function() {
        $(this).datepicker({
            'setDate': 'today',
            'autoclose': true,
            'format': 'dd MM yyyy',
            'language': 'en'
        });
    });

});

function toCorrectDate(el) {
    // return $('el').datepicker('getDate').toLocaleDateString('id-ID');
}
