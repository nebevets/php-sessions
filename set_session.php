<?php
  session_start();
  $_SESSION['name'] = 'chris p. bacon';
  $_SESSION['user_id'] = 3;
  echo "<h1>session set</h1>";
?>