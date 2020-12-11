<?php

function load($class) {
  $file = "../classes/$class.php";
  if(file_exists($file)) {
    require_once($file);
  }
}

spl_autoload_register('load');