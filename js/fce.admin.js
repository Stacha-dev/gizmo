/*
admin fce, for lady gaga exclusive
*/

import { page } from "./router";



/*
ulozit aktualitu
*/
$(document).on('submit', '#aktualitaForm', function(e){

    $.post('/php/admin/news.php', {id: id, text: text, from: dateFrom, to: dateTo}, function(res){

        try {

            var obj = JSON.parse(res);

            if (obj.state == 'success') {
                page('/admin/news/e/')
            }
        
        } catch (e) {

            console.log(res, e);
            error('chyba');

        }

    });

    e.preventDefault();

});