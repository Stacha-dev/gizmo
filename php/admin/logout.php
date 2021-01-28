<?php
session_start();

unset($_SESSION['admin']);

if (!isset($_SESSION['admin'])) {
  echo 'success';
} else {
  echo 'error';
}

?>
