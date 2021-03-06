$(document).ready(function (){

    // autoload datepicker
    // $('.datepicker').each(function() {
    //     $(this).datepicker({
    //         'setDate': 'today',
    //         'autoclose': true,
    //         'format': 'dd MM yyyy',
    //         'language': 'en'
    //     });
    // });

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

// ex: 190191 = 190200
function roundHundred(x) {
    return Math.round(x / 100) * 100;
}

// generate UUID
function uuidv4() {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}
