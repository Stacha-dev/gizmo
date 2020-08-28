/*
gizmo magic
*/
import {range} from './main.js';



/*
consts
*/
const cursor = $('.cursor');



/*
cursor movement, navig movement
*/
$(document).on('mousemove', function(e){

  // variables
  var ch = {x: e.pageX,
            y: e.pageY},
      win = {w: $(window).width(),
             h: $(window).height()},
      target = $(e.target),
      otec = target.closest('.pg').attr('id');


  /*
  gizmo mizi/objevuje se podle toho jestli sem nad $contant
  */

  // pozice umeleho kurzoru
  cursor.css({top: ch.y, left: ch.x});

      // nad kterym divem krouzime
      // podle toho pohybuje navigacnim prvkem
      switch (otec) {

        case 'content':
          $('.navigAbout').not('.long').css({'width': range(ch.x, [0, win.w], [25, 0])+'vw', 'opacity': range(ch.x, [win.w/2, 0], [0, 100])/100});
          $('.navigProjects').css({'width': range(ch.x, [0, win.w], [0, 25])+'vw', 'opacity': range(ch.x, [win.w/2, win.w], [0, 100])/100});
          $('.navigContact').not('.long').css({'height': range(ch.y, [0, win.h], [40, 0])+'vh', 'opacity': range(ch.y, [win.h/2, 0], [0, 100])/100});
          // gizmo setup
          $('#cube').css({'transform': 'rotateX('+range(ch.y, [0, win.h/2], [0, -45])+'deg) rotateY('+range(ch.x, [0, win.w], [-90, 0])+'deg) rotateZ(0deg)'});
            //$('#pyramid').css({'transform': 'rotateX('+range(ch.y, [0, win.h/2], [0, -45])+'deg) rotateY('+range(ch.x, [0, win.w], [-90, 0])+'deg) rotateZ(0deg) translate3d(-10vh, -10vh, -10vh)'});
        break;

        case 'about':
          $('.navigAbout').css({'width': range(ch.x, [0, win.w/100*70], [0, 30])+'vw'});
        break;

        case 'contact':
          $('.navigContact').css({'height': range(ch.y, [0, win.h/100*50], [0, 50])+'vh'});
        break;

        case 'projects':
          $('.navigHome').css({'width': range(ch.x, [0, win.w/100*50], [15, 0])+'vw', 'opacity': range(ch.x, [0, win.w/2], [100, 0])/100});
        break;

      }



      /*
      // nad kterym navigem prejizdi
      // aby gizmo menilo efekty
      switch (target.attr('href')) {
        case '/about':
          cursor.removeClass('toAbout toContact toProjects').addClass('toAbout');
        break;
        case '/contact':
          cursor.removeClass('toAbout toContact toProjects').addClass('toContact');
        break;
        case '/projects':
          cursor.removeClass('toAbout toContact toProjects').addClass('toProjects');
        break;
        default:
          cursor.removeClass('toAbout toContact toProjects');
        break;
      }
      // css
      .cursor.toAbout #s2 {border-left-color: transparent !important;}
      .cursor.toAbout #s5 {border-color: transparent !important;}
      .cursor.toAbout #s6 {border-bottom-color: transparent !important;}
      .cursor.toAbout {}
      .cursor.toContact {}
      .cursor.toProjects {}
      */



});
