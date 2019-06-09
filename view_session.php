<?php
  session_start(); // if you plan to use sessions make it the first thing in the file. best practice
  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';
?>