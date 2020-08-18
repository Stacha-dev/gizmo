<?php

  //hh
  if (/* $_SERVER['REMOTE_ADDR'] == '89.102.173.82' */ isset($_GET['g'])) {
    include './php/layout.php';
  } else {
    include './php/default.php';
  }
