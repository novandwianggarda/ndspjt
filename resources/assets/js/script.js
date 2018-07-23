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

// why not using axios? because it doesnt support synchronous
function diffTwoDates(start, end, period) {
    var difference = 0;
    if (start !== '' && end !== '') {
        $.ajax({
            async: false,
            url: '/ajax/diff-two-dates?start=' + start + '&end=' +end + '&period=' + period, success: function(response){ difference = response.difference; }
        });
    }
    return difference;
}
