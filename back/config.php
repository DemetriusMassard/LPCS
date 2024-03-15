<?php
$file = $_SERVER['DOCUMENT_ROOT']. "/lpcs/back/.env";
$env = file($file);
foreach($env as $line) {
  $line = trim($line);
  $arr = explode('=', $line,2);
  $_ENV[$arr[0]] = $arr[1];
}