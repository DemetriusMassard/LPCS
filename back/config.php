<?php
/**$fh = fopen('.env','r');
echo $fh . '<br>';
while ($line = fgets($fh)) {
    //echo $line . '<br>';
    $arr = explode('=', $line,2);
    $_ENV[$arr[0]] = $arr[1];
    var_dump($arr);
    echo '<br>';
  }*/
    return array(
'pepper'=> 'pJGPRD32UvqQAIvDUKECKTFlKNgHmqr0',

'server' => "localhost",
'user' => "LPCS",
'pass' => "!q4s/PMXESeTk20x",
'db' => "LPCS");