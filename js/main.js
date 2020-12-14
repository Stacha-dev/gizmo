/*
LOADING LISTA
*/
export function loading(e) {

  switch (e) {

    case 'on':

      // blinder zaslepi klikani na html pred fade-in
      if (!$('#blinder').length) {
        $('body').append($('<div>', {id: 'blinder'}));
      }

      // zapina loading bary
      if (!$('#loading').length && !$('#imgLoading').length) {

        $('body').append($('<div>', {id: 'loading'}));
        $('body').append($('<div>', {id: 'imgLoading'}));

          $('#loading, #imgLoading').fadeIn(100, function(){
            // set interval => pojistka? (dole)
          });
      }

      // timeout nahravani, at netrva dlouho, kdyztak error
      window.timeout = setTimeout(function(){
        loading('off');
        error('request timeout, please reload page');
      }, 60*1000);

    break;


    /*
    vypnuti loadingu
    */
    case 'off':

      // blinder zmizi
      if ($('#blinder').length) {
        $('#blinder').remove();
      }

      // loading zmizi
      $('#loading, #imgLoading').fadeOut(500, function() {
        $('#loading, #imgLoading').remove();
      });

      clearTimeout(window.timeout);

    break;

  }

}



/*
error
*/
export function error(e) {

  alert(e);

}



/*
nastavi dlouhy text v uvedenem scrolovacim divu
*/
export function setScroller(div) {

  // najde zdroj a spocita koef
  var text = div.html(),
      metr = Math.round(200/text.length),
      vysledek = '';

  // namnozi text jak je potreba
  for (var t = 0; t <= metr; t++) {
    vysledek = text+'&emsp;'+vysledek;
  }

  // vrati to do listy
  if (div.html('<div>'+vysledek+'</div><div>'+vysledek+'</div>')) {
    return true;
  }

}



/*
range function
*/
export function range(x, r1, r2) {
    return (x-r1[0])*(r2[1]-r2[0])/(r1[1]-r1[0])+r2[0];
}



/*
kontrolor jestli je stranka horizontalni, vraci true/false
*/
export function isHorizontal(){

  var win = {'w': $(window).width(),
             'h': $(window).height()};

  // pokud je vertikalni obraz
  if (win.w/win.h < 1) {
    // ukaze div s obrazkem at si otoci telefon
    if (!$('#turnHorizontal').length) {
      $('body').append($('<div>', {id: 'turnHorizontal', class: 'fadeout'}).delay(500).queue(function(){$(this).removeClass('fadeout').dequeue();}));
      $('.burger').css({'display': 'none !important'});
    }
    // vrati false
    return false;
  // pokud je horizontalni obraz
  } else {
    // pokud je div s legendou, odstrani ho
    if ($('#turnHorizontal').length) {
      $('#turnHorizontal').remove();
      $('.burger').css({'display': 'block !important'});
    }
    // vrati false
    return true;
  }

}



/*
jestli tj telefon, ukaz mobilni menu
*/
export function isMobile(){
  if ($.browser.mobile) {
    if (!$('html, body').hasClass('mobile')){
      $('html, body').addClass('mobile');
      $('body').append($('<div>', {class: 'burger', html: '☰'}));
      $('body').append($('<div>', {class: 'mobilMenu'}).html('<ul class="center"><li href="/hello">HOME</li><li href="/about">ABOUT</li><li href="/contact">CONTACT</li><li href="/projects">WORK</li><a href="https://www.instagram.com/gizmo.lab/" class="esc" target="_blank">instagram</a></ul>'));
      return true;
    }
  } else {
    $('html, body').removeClass('mobile');
    $('.burger, .mobilMenu').remove();
    return false;
  }
}
