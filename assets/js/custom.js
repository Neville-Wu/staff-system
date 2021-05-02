/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

$(function () {
    $('#start_time').change(function () {
        let time = new Date($(this).val());
        time.setMinutes(time.getMinutes() + 240);
        let string = time.toLocaleString('en-AU', {
            day: 'numeric',
            month: 'numeric',
            year: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            hour12: false
        });
        string = string.split(', ');
        string[0] = string[0].split('/').reverse().join('-');
        string = string.join('T');
        $('#end_time').val(string);
    })
});
