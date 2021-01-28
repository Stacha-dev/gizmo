/*
ou shit router!
lady gaga would aprove
*/
import {loading, error, setScroller} from './main.js';


export function page(url) {



  loading('on');



  // vars
  var file,
      pointers,
      afterLoad = false,
      getPrj = false,
      home = $('#content'),
      content = false,
      delay = 0,
      cursor = $('.cursor'),
      barva = 'default';



  /*
  routovaci funkce / navig funkce
  */
  if (url != null) {
    var path = url.split('/');
  }


  /*
  otitulkovat stranku
  */
  title(url);



  /*
  pokud uz je content, vybere a prepne
  */
  if (home.length) {



      // main router switch
      switch (path[1]) {


        default: case 'hello': // default ==> homepage
          navig('hello', false);
        break;


        case 'projects': // projekty
          var file = '/php/page/projects.php',
              content = $('#projects');
          // pokud jeste neprobehl load
          if (!$('#project').length) {
            getPrj = true;
          }
          // pokud je uveden konkretni projekt
          if (typeof path[2] !== 'undefined') {
              pointers = {'link': path[2], 'full': getPrj};
              //$('#listaProjects > div').removeClass('selected');
              //$('*[href="/projects/'+path[2]+'"]').addClass('selected');
          }
        break;



        case 'about': // o projektu
          var file = '/php/page/about.php',
              content = $('#about');
        break;



        case 'contact': // kontakt na holky
          var file = '/php/page/contact.php',
              content = $('#contact');
        break;


        
        case 'admin': // admin
          var file = '/php/admin/admin.php',
              content = $('#admin');
              pointers = {'page': path[2], 'action': path[3], 'id': path[4]};
        break;


      }



  // pokud neni jeste nahrano nic, zacne nahranim divu a homepage
  } else {

    // nasetuje divy
    // + nasetuje vsechny navigacni prvky
    $('body').append($('<div>', {id: 'content', class: 'home center fadeup pg'})
             .append('<div class="navig navigContact" href="/contact"><div class="button buttonContact">CONTACT</div></div>')
             .append('<div class="navig navigProjects" href="/projects"><div class="button buttonProjects">WORK</div></div>')
             .append('<div class="navig navigAbout" href="/about"><div class="button buttonAbout">ABOUT</div></div>'));
    $('body').append($('<div>', {id: 'contact', class: 'home pg'}));
    $('body').append($('<div>', {id: 'about', class: 'home pg'}));
    $('body').append($('<div>', {id: 'projects', class: 'home pg'}));
    $('body').append($('<div>', {id: 'admin', class: 'home pg'}));
    $('#projects').append('<div class="navig navigHome" href="/hello"></div>');

    // nahodi defaulty
    var file = '/php/page/home.php',
        content = $('#content');

    if (path[1] != 'hello' && typeof path[1] !== 'undefined' && path[1] != '') {
      afterLoad = url;
    }

  }



  /*
  cursor setup
  */
  // defaultni stranka
  if (path[1] != 'hello' && typeof path[1] !== 'undefined' && path[1] != '') {

    if (!cursor.hasClass('dot')) {
      cursor.removeClass('gizmo').delay(500).queue(function(){
        switch(path[1]) {
          case 'about': barva = 'blue'; break;
          case 'contact': barva = 'red'; break;
          case 'projects': barva = 'green'; break;
        }
        cursor.addClass('dot '+barva).dequeue();
      });
    }
  // hlavni stranka
  } else {

    if (!cursor.hasClass('gizmo')) {
      cursor.removeClass('dot red blue green').delay(500).queue(function(){cursor.addClass('gizmo').dequeue();});
    }

  }



  /*
  hlavni load obsahu
  (obsahuje i rekurzi pokud je nastaven afterLoad)
  (pokud je vubec co loadovat => content !== false)
  */
  if (content !== false) {
  setTimeout(function(){



        $.post(file, pointers, function(res){



          // obsah
          try {



            var obj = JSON.parse(res);

            // preload obrazku
            if (typeof obj.imgs !== 'undefined' && obj.imgs.length) {

              try {

                // preload images
                var imgs = obj.imgs,
                    size = imgs.length,
                    loaded = [],
                    itt = 0,
                    newWidth = 0;

                // for each image preload
                $.each(imgs, function(i) {

                  // url to image
                  var url = imgs[i];

                  // vytvori preload container
                  (function(url, loaded) {

                      // vytvori image a narve ho url
                      var img = new Image();
                      img.src = url;

                      // on image loaded oznac ho jako loadnuty
                      img.onload = function() {

                        // zapsat jako vyreseno
                        loaded.resolve();
                        itt++;
                        // loading lista s obrazkama
                        newWidth = itt/size*100;
                        $('#imgLoading').css({width: newWidth+'vw'});

                      };

                  })(url, loaded[i] = $.Deferred());

                });

                // az sou vsechny obrazky nacteny
                $.when.apply($, loaded).done(function() {

                    // nastavi pozice
                    switch (path[1]) {

                      default: case 'hello': // default ==> homepage
                        navig('hello', false);
                      break;

                      case 'projects': // projekty
                        navig('projects', false);
                      break;

                      case 'about': // o projektu
                        navig('about', false);
                      break;

                      case 'contact': // kontakt na holky
                        navig('contact', false);
                      break;

                      case 'admin': // kontakt na holky
                        navig('admin', false);
                      break;

                    }



                    // pokud startuje stranka s projektama
                    /*
                    if ($('#content').length && path[1] == 'projects' && typeof path[2] !== 'undefined') {

                      content.addClass('escape');
                      setTimeout(function(){
                        var obsah = '<div class="content">'+obj.html+'</div>';
                        content.find('.content').remove();
                        content.append(obsah);
                        content.removeClass('escape');
                      }, 1000);

                    // vsechny ostatni piprady = normalni
                    } else {
                    */

                      content.find('.content').remove();
                      var obsah = obj.html;
                      if (!afterLoad) {
                        obsah = '<div class="content">'+obsah+'</div>';
                      }
                      content.append(obsah).addClass('loaded').removeClass('fadeup fadeout');

                    //}



                    // pokud se ma jeste neco stat potom
                    if (afterLoad !== false) {
                      page(afterLoad);
                    }

                    // pote co se vsechno loadne, kontrola jestli je loadnuty homepage base
                    if ($('#logo').hasClass('fadeup')) {

                        // delay pro fadein elementu
                        setTimeout(function(){

                          // logo
                          $('#logo').removeClass('fadeup').delay(250).queue(function(){

                              // udela aby byl dobre text v bezicich listach a postupne je zobrazi
                              var lista = $('#lista'),
                                  aktuality = $('#aktuality');

                              if (setScroller(lista)) {
                                lista.removeClass('hidden').dequeue().delay(250).queue(function(){

                                    if (setScroller(aktuality)) {
                                      aktuality.removeClass('hidden').dequeue();
                                    }

                                });
                              }

                          });

                        }, 500);

                    }

                // konec akce po nahrani obrazku
                });

              // error
              } catch (e) {

                console.log(e);
                error('preload error');

              }

            // pokud nejsou obr na preload, proste zobrazi stranku
            } else {

              console.log('nic na preload');
              error('nic na preload');

            }



          // error
          } catch (e) {

            console.log(res, e);
            error('content error');

          }



        // konec $.post
        });



  // konec timeoutu
  }, delay);


// neni potreba nic nahravat (content == false)
}


// tak a home content je nahrany
// konec funkce page
}



/*
parametry
*/
export function navig(url, param) {

  // vsecky stranky
  var stranky = $('#content, #contact, #about, #projects, #admin');

  // resetne long navigaci + resetne hrefy
  $('.navig').removeClass('long');
  $('.navigAbout').attr('href', '/about');
  $('.navigContact').attr('href', '/contact');

  // schova "next project" => musim to pak vyresit lip ale ted neni cas
  $('#nextProject').hide();

  // kam se to ma navignout
  switch (url) {

    case 'hello':
      stranky.removeClass('projects about contact admin').addClass('home');
    break;

    case 'projects':
      stranky.removeClass('home about contact admin').addClass('projects');
      $('#logo').removeClass('red green blue').addClass('green');
      // zobrazi odkaz na dalsi projekt
      $('#nextProject').show();
      // zobrazi popisek projektu
      setTimeout(function(){
        $('#projectReading').addClass('on');
      }, 500);
    break;

    case 'about':
      stranky.removeClass('projects home contact admin').addClass('about');
      $('.navigAbout').addClass('long').attr('href', '/hello');
      $('#logo').removeClass('red green blue').addClass('blue');
    break;

    case 'contact':
      stranky.removeClass('projects about home admin').addClass('contact');
      $('.navigContact').addClass('long').attr('href', '/hello');
      $('#logo').removeClass('red green blue').addClass('red');
    break;
    
    case 'admin':
      stranky.removeClass('projects about home contact').addClass('admin');
      $('.navigContact').addClass('long').attr('href', '/hello');
      $('#logo').removeClass('red green blue').addClass('red');
    break;

  }

  // konec loadingu
  loading('off');

}



/*
udela url v adrese a titulek
*/
export function title(url) {

    var newUrl = location.protocol+'//'+location.host+''+url;

    // otitulkovat!
    $.post('/php/title.php', {url: url}, function(title) {
        document.title = title;
        window.history.pushState("object or string", title, newUrl);
    });


}
