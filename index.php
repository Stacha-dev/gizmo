<?php

  //hh
  if (isset($_GET['g']) ||
      $_SERVER['REMOTE_ADDR'] == '89.102.173.82' ||
      $_SERVER['REMOTE_ADDR'] == '89.103.146.187' ||
      $_SERVER['REMOTE_ADDR'] == '89.176.25.153' ||
      $_SERVER['REMOTE_ADDR'] == '195.113.72.125' ||
      $_SERVER['REMOTE_ADDR'] == '193.9.112.244') {
    include './php/ini.php';
    include './php/layout.php';
  } else {
    include './php/default.php';
  }
