<?php
session_start();

if ($_POST['login'] == 'gizmo' && $_POST['pass'] == 'r3HPWMStkscqCMRBF83A') {

  $_SESSION['admin'] = true;
  echo 'success';

} else {

  echo 'wrong';

}
