/*
preload obrazku
*/
import {page} from './router.js';
import {isHorizontal, isMobile} from './main.js';



/*
on load document
*/
$(document).ready(function() {

      // loadne obsah podle adresy
      var url = window.location.pathname;
      page(url);

      isHorizontal();
      isMobile();

});



/*
on resize
*/
$(window).on('resize', function(){

  isHorizontal();

});



/*
click na a:href
*/
$(document).on('click touch', 'a:not(.esc), .navig, li[href]', function(e) {

      // loadne obsah podle hrefu
      var url = $(this).attr('href');
      page(url);

      e.preventDefault();

});



/*
akce kurzoru
*/
$(document).on('mouseenter', 'a.esc, .navig', function(){

    $('.cursor').addClass('hover');

});
$(document).on('mouseleave', 'a.esc, .navig', function(){

    $('.cursor').removeClass('hover');

});



/*
akce kurzoru: napisy menu
*/
$(document).on('mouseenter', '.navigAbout:not(.long)', function(){
    if (!$('.buttonAbout').hasClass('on')) {
      $('.buttonContact, .buttonProjects').removeClass('on');
      $('.buttonAbout').addClass('on');
    }
});
$(document).on('mouseenter', '.navigContact:not(.long)', function(){
    if (!$('.buttonContact').hasClass('on')) {
      $('.buttonAbout, .buttonProjects').removeClass('on');
      $('.buttonContact').addClass('on');
    }
});
$(document).on('mouseenter', '.navigProjects:not(.long)', function(){
    if (!$('.buttonProjects').hasClass('on')) {
      $('.buttonContact, .buttonAbout').removeClass('on');
      $('.buttonProjects').addClass('on');
    }
});
$(document).on('mouseleave', '.navig', function(){
    $('.buttonContact, .buttonProjects, .buttonAbout').removeClass('on');
});



/*
mobil menu
*/
$(document).on('touch click', '.burger', function(){
  $('.mobilMenu').slideToggle(500, 'easeOutQuart');
});
$(document).on('touch click', '.mobilMenu', function(){
  $(this).slideToggle(500, 'easeOutQuart');
});
