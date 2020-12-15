/*
* TERMS OF USE grabber.js
* Open source under the BSD License.
* Copyright 2020 Oliver Stasa. All rights reserved.
*
* plati pro divy co maji class .grabber
* pak jde ten div chytit a posunutim mysi scrollovat
*/
$(function(){

  // constants
  var grab = false,
      cur = {"x": 0, "y": 0},
      moved = {"x": 0, "y": 0},
      timestamp = 0;
  // smoothing nastavuje silu dojezdu setrvacnosti pohybu
  const smoothing = 2;
  // global val pro smoothing
  window.dir = {"x": 0, "y": 0};
  window.speed = {"x": 0, "y": 0};

  // pohyb mysi
  const move = function(e) {

    if (grab) {

      var from = $(this).offset();
      $(this).trigger('wheel');

      // presun na pozici dle posunuti
      $(this).scrollLeft(cur.x-e.pageX+from.left);
      $(this).scrollTop(cur.y-e.pageY+from.top);

          // smoothing
          var now = Date.now(),
              curr = {"x": e.pageX,
                      "y": e.pageY};

          var dt = now-timestamp;
          var dist = {"x": Math.abs(curr.x-moved.x),
                      "y": Math.abs(curr.y-moved.y)};
          window.speed = {"x": dist.x/dt*$(window).width()/100*smoothing/1.5, // Math.round(dist.x/dt)*...
                          "y": dist.y/dt*$(window).height()/100*smoothing/1.5};


          window.dir = {"x": 1, "y": 1};
          if (moved.x <= curr.x) {
            window.dir.x = -1;
          }
          if (moved.y <= curr.y) {
            window.dir.y = -1;
          }

          moved = curr;
          timestamp = now;

    }

  };

  // ukonceni grabu
  const out = function() {

    grab = false;

      // animovat dojezd pokud je mys pustena behem pohybu
      if (window.speed.x > 1 || window.speed.y > 1) {

            // soucasna pozice scrollu
        var grabpos = {"x": $('.grabbed').scrollLeft(),
                       "y": $('.grabbed').scrollTop()},
            // delka animace dojezdu
            dojezd = (window.speed.x+ window.speed.y)*smoothing*5; // 1000ms optimal
        // animace dojezdu
        $('.grabbed').animate({scrollTop: grabpos.y+window.dir.y*window.speed.y, scrollLeft: grabpos.x+window.dir.x*window.speed.x}, dojezd, 'easeOutExpo');
        // reset speed
        window.speed = {"x": 0, "y": 0};

      }

      // odstrani grabbed rucku
      $('.grabbed').removeClass('grabbed');

      // vypnout event listenery
      $(document).off('mousemove', '.grabbed', move);
      $(document).off('mouseup blur', out);

  };

  // zacatek grabu
  $(document).on('mousedown', '.grabber', function(e) {

    // zastavi animovani, pokud se deje
    $(this).stop();

    // pozice divu ve strance
    var posCord = $(this).offset(),
        target = $(e.target);

    if (!target.hasClass('model')) {

    // pozice
    cur.x = (e.pageX - posCord.left) + $(this).scrollLeft();
    cur.y = (e.pageY - posCord.top) + $(this).scrollTop();

    // potvrzuje grab
    grab = true;

    // zapne grabbed rucku
    $(this).addClass('grabbed');

      // event listenery
      $(document).on('mousemove', '.grabbed', move);
      $(document).on('mouseup blur', out);

    }

  });

  // pojistka kdybych zacal scrolovat koleckem/touchpadem, zastavi se animace
  $(document).on('wheel', '.grabber', function() {
    $(this).stop();
  });

});
