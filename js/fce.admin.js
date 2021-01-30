/*
admin fce, for lady gaga exclusive
*/

import {page} from './router.js';
import {error} from './main.js';



/*
ulozit aktualitu
*/
$(document).on('submit', '#aktualitaForm', function(e){



    // vars
    var action = 'add',
        id = $('#aktualitaForm').attr('idnews'),
        text = $('input[name="text"]').val(),
        text_en = $('input[name="text_en"]').val(),
        dateFrom = $('input[name="dateFrom"]').val(),
        dateTo = $('input[name="dateTo"]').val();

    
    
    // action to call in news.php
    if (id > 0) {
        action = 'e';
    }



    // make it happen
    $.post('/php/admin/admin.php', {id: id, text: text, text_en: text_en, from: dateFrom, to: dateTo, page: 'news', action: action}, function(res){

        try {

            var obj = JSON.parse(res);

            if (obj.status == 'success') {
                // page('/admin/news');
                console.log('all good');
            } else {
                console.log(obj, res);
                error('error: soft');
            }

            $('#admin .content').html(obj.html);
        
        } catch (e) {

            console.log(e, res);
            error('error: hard');

        }

    });



    // dont submit the form
    e.preventDefault();

});