<?php
$fh = fopen('.env','r');
//echo $fh . '<br>';
while ($line = fgets($fh)) {
  $line = trim($line);
  //echo $line . '<br>';
  $arr = explode('=', $line,2);
  $_ENV[$arr[0]] = $arr[1];
  var_dump($arr);
  echo '<br>';
}
