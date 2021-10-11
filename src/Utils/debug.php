<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

function dump($var)
{
  echo '
  </br>
  <div 
    style="
      width: fit-content;
      left: 0;
      right: 0;
      margin: auto;
      background-color: lightgray;
      padding: 5px 10px;
      border: 1px dashed black;
      margin-top: 1px;
    "
  >
  <pre>';
  print_r($var);
  echo '</pre>
  </div>
  </br>';
}
