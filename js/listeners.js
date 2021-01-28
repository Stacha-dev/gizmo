/*
preload obrazku
*/
import {page} from './router.js';
import {isHorizontal, isMobile, error} from './main.js';



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

  if (isHorizontal()) {
    if (isMobile()) {
      var url = window.location.pathname;
      page(url);
    }
  }

});



/*
click na a:href
*/
$(document).on('click touch', '*[href]:not(.esc)', function(e) {

      // loadne obsah podle hrefu
      var url = $(this).attr('href');
      page(url);

      e.preventDefault();

});



/*
akce kurzoru
*/
$(document).on('mouseenter', '*[href], .act', function(){
    $('.cursor').addClass('hover');
});
$(document).on('mouseleave', '*[href], .act', function(){
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
$(document).on('mouseenter', '.navigNextProject', function(){
    if (!$('.nextProject').hasClass('on')) {
      $('.nextProject').addClass('on');
    }
});
$(document).on('mouseleave', '.navig', function(){
    $('.buttonContact, .buttonProjects, .buttonAbout, .nextProject').removeClass('on');
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



/*
project info
*/
$(document).on('touch click', '.info, .close', function(){
  $('#projectReading').toggleClass('on');
});



/*
on blur disable music / on focus enable
*/
$(window).on('blur', function(){

  $('video').prop('muted', true);
  $('video').each(function(){
    $(this)[0].pause();
  });

});
$(window).on('focus', function(){
  $('video').prop('muted', false);
  $(document).trigger('scroll');
});



/*
on scroll pause/play videos
*/
$(document).on('wheel', function(){

  $('#project video').each(function(){

    var video = $(this),
        videoW = video.width(),
        fromLeft = video.offset().left,
        scrollPrj = $('#project').scrollLeft(),
        winW = $(window).width();

    if (fromLeft > videoW/2*(-1) &&
        fromLeft+videoW*1.5 < scrollPrj+winW) {
      $(this)[0].play();
      console.log('play');
    } else {
      $(this)[0].pause();
      console.log('pause');
    }

  });

});



/*
admin login
*/
$(document).on('submit', '#loginForm', function(e){
//$('#loginForm').submit(function(e){

  var login = $('input[name="login"]').val(),
      pass = $('input[name="pass"]').val();

  $.post('/php/admin/login.php', {login: login, pass: pass}, function(res){

    if (res == 'success') {
      page('/admin');
    } else {
      error('you what');
    }

  });

  e.preventDefault();

});



/*
admin logout
*/
$(document).on('click touch', '.logout', function(){

  $.get('/php/admin/logout.php', function(res){

    if (res == 'success') {
      page('/admin');
    }

  });

});
