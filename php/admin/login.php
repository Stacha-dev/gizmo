<?php
session_start();

if ($_POST['login'] == '5' && $_POST['pass'] == '19') {

  $_SESSION['admin'] = true;
  echo 'logged';

} else {

  echo 'wrong';

}

?>
