<?php

  error_reporting(-1);
  ini_set('display_errors','On');

  require_once "../bd/controller.php";

  $controller = new controller();

  $controller->handler();

?>



