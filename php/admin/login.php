<?php
session_start();

if ($_POST['login'] == 'gizmi' && $_POST['pass'] == '19') {

  $_SESSION['admin'] = true;
  echo 'success';

} else {

  echo 'wrong';

}
