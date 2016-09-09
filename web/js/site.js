;'use strict';
$(function() {
    jQuery.datetimepicker.setLocale('ru');
    $('#datetimepicker').datetimepicker({
        format: 'Y-m-d H:i'
    });
});