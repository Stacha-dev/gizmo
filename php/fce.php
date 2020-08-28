<?php
/*
FUNKCE! OMG!
WOW
LADY GAGA
*/
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}



/*
prepinac jazyku
*/
function lang($cs, $en) {

  // pokud sou oba jazyky vypsane
  if (!empty($cs) && !empty($en)) {

    switch($_SESSION['lang']) {
      default: case 'en':
        return $en;
      break;
      case 'cs':
        return $cs;
      break;
    }

  // pokud je aspon jeden vyplneny, vraci ho
  } else {

    if (empty($cs)) {
      return $en;
    } else if (empty($en)) {
      return $cs;
    } else {
      lang('NEVYPLNĚNO', 'UNKNOWN');
    }

  }

}
