<?php
session_start();



/*
fce
*/
include './fce.php';



/*
vars
*/
$ress = 'GIZMO';



/*
titulkovana
*/
if (isset($_POST['url'])) {

  $addr = explode('/', $_POST['url']);

  switch($addr[1]) {

    default: case 'hello':
      $ress .= ' — '.lang('AHOJ', 'HELLO');
    break;

    case 'projects':
      if ($addr[2]) {
        $ress .= ' — XY';
      } else {
        $ress .= ' — '.lang('PROJEKTY', 'PROJECTS');
      }
    break;

    case 'about':
      $ress .= ' — '.lang('O NÁS', 'ABOUT');
    break;

    case 'contact':
      $ress .= ' — '.lang('KONTAKT', 'CONTACT');
    break;

  }


}



/*
result
*/
echo $ress;
